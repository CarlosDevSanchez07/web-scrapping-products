<?php

namespace App\Controller;

use App\Entity\Source;
use App\Scraper\Scraper;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

class HomeController extends ServiceEntityRepository
{
    private Scraper $scraper;
    private RouterInterface $router;

    public function __construct(RouterInterface $router, ManagerRegistry $registry, Scraper $scraper)
    {
        parent::__construct($registry, Source::class);
        $this->scraper = $scraper;
        $this->router = $router;
    }

    /**
     * @Route("/fetch/{id}", name="fetch")
     */
    public function fetch(Source $source): Response
    {
        $posts = $this->scraper->scrap($source);

        return $posts;
    }

    /**
     * @Route("/scrapper-all", name="scrapper-all")
     */
    public function all(EntityManagerInterface $entityManager)
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQueryBuilder()
            ->select('s.id, s.name, s.url, ca.name categoria, s.titleSelector, s.wrapperSelector, s.descSelector, s.linkSelector, s.priceSelector, s.imageSelector')
            ->from(Source::class, 's')
            ->join('s.category', 'ca')
            ->getQuery();

        return new JsonResponse($query->getResult());
    }

    /**
     * @Route("/", name="index")
     */
    public function index(): RedirectResponse
    {
        return new RedirectResponse($this->router->generate('admin'));
    }
}
