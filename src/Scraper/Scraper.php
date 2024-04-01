<?php

namespace App\Scraper;

use App\Entity\Post;
use App\Scraper\SourceInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Panther\Client;

class Scraper
{
    public static function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public function scrap(SourceInterface $source): Response
    {
        try {
            $collection = [];
            $commandSql = "INSERT INTO product (category, name, description, slug, image, price, link) VALUES ";
            $client = Client::createChromeClient();
            $crawler = $client->request('GET', $source->getUrl());

            if ($source->getIsInfinityScroll()) {
                for ($i = 0; $i < 10; $i++) {
                    $crawler = $client->waitFor($source->getWrapperSelector());
                    $client->executeScript('window.scrollTo(0, document.body.scrollHeight);');
                    sleep(2);
                }
            }

            $max = 0;
            do {

                $crawler->filter($source->getWrapperSelector())->each(function (Crawler $c) use ($source, &$collection, &$commandSql) {
                    if (!$c->filter($source->getLinkSelector())->count()) {
                        return;
                    }

                    $post = new Post();

                    $title = $c->filter($source->getTitleSelector())->attr('title');
                    if (!$title) {
                        $title = $c->filter($source->getTitleSelector())->text();
                    }
                    $post->setTitle($title);

                    $price = $c->filter($source->getPriceSelector())->attr('price');
                    if (!$price) {
                        $price = $c->filter($source->getPriceSelector())->text();
                    }

                    $post->setPrice($price);

                    $link = $c->filter($source->getLinkSelector())->attr('href');
                    $post->setUrl($link);

                    $desk = $c->filter($source->getDescSelector())->text() || "";
                    $post->setDescription($desk);

                    $img = $c->filter($source->getImageSelector())->attr("src");
                    $post->setImage($img);

                    $price = preg_replace('/[$]\d+[\d,.]*\s*/', '', $price);
                    $price = str_replace("€", "", $price);
                    $price = str_replace(" ", "", $price);
                    $price = str_replace(",", ".", $price);

                    $commandSql .= "(" . $source->getCategory()->getId() . ", '" . $title . "', '" . $desk . "', '" . $this->slugify($title) . "', '" . $img . "', " . $price . ", '" . $link . "'),";
                    $collection[] = $post;
                });

                $nextLink = null;
                if ($source->getPaginationNextSelector()) {
                    $hasPagin = $crawler->filter($source->getPaginationNextSelector())->count();

                    if ($hasPagin > 0) {
                        $max++;
                        $complement = "";
                        if ($source->getPaginateComplement()) {
                            $complement = $source->getPaginateComplement();
                        }

                        $nextLink = $complement . $crawler->filter($source->getPaginationNextSelector())->attr("href");
                        $crawler = $client->request('GET', $nextLink);
                    } else {
                        break;
                    }
                }

                if ($max > 10) break;
            } while ($nextLink);

            $client->close();
            $client->quit();

            return new JsonResponse([
                "data" => new ArrayCollection($collection),
                "sql" => $commandSql
            ]);
        } catch (\Exception $ex) {
            $client->close();
            $client->quit();
            throw $ex;
        }
    }
}
