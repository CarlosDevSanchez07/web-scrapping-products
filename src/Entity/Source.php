<?php

namespace App\Entity;

use App\Scraper\SourceInterface;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Category;

/**
 * Source
 *
 * @ORM\Table(name="source", indexes={@ORM\Index(name="fk_source_category1_idx", columns={"category"})})
 * @ORM\Entity(repositoryClass="App\Repository\SourceRepository")
 */
class Source implements SourceInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var ?Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @ORM\Column(type="string")
     */
    private string $url;

    /**
     * @ORM\Column(type="string")
     */
    private string $name;

    /**
     * @ORM\Column(type="string")
     */
    private string $wrapperSelector;

    /**
     * @ORM\Column(type="string")
     */
    private string $titleSelector;

    /**
     * @ORM\Column(type="string")
     */
    private string $descSelector;

    /**
     * @ORM\Column(type="string")
     */
    private string $linkSelector;

    /**
     * @ORM\Column(type="string")
     */
    private string $priceSelector;

    /**
     * @ORM\Column(type="string")
     */
    private string $imageSelector;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $isInfinityScroll;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private ?string $paginationNextSelector = null;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private ?string $paginateComplement = null;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getWrapperSelector(): string
    {
        return $this->wrapperSelector;
    }

    public function setWrapperSelector(string $wrapperSelector): void
    {
        $this->wrapperSelector = $wrapperSelector;
    }

    public function getTitleSelector(): string
    {
        return $this->titleSelector;
    }

    public function setTitleSelector(string $titleSelector): void
    {
        $this->titleSelector = $titleSelector;
    }

    public function getDescSelector(): string
    {
        return $this->descSelector;
    }

    public function setDescSelector(string $descSelector): void
    {
        $this->descSelector = $descSelector;
    }

    public function getLinkSelector(): string
    {
        return $this->linkSelector;
    }

    public function setLinkSelector(string $linkSelector): void
    {
        $this->linkSelector = $linkSelector;
    }

    public function getPriceSelector(): string
    {
        return $this->priceSelector;
    }

    public function setPriceSelector(string $priceSelector): void
    {
        $this->priceSelector = $priceSelector;
    }

    public function getImageSelector(): string
    {
        return $this->imageSelector;
    }

    public function setImageSelector(string $imageSelector): void
    {
        $this->imageSelector = $imageSelector;
    }

    public function getIsInfinityScroll(): bool
    {
        return $this->isInfinityScroll;
    }

    public function setIsInfinityScroll(bool $isInfinityScroll): void
    {
        $this->isInfinityScroll = $isInfinityScroll;
    }

    public function getPaginationNextSelector(): ?string
    {
        return $this->paginationNextSelector;
    }

    public function setPaginationNextSelector(string $paginationNextSelector): void
    {
        $this->paginationNextSelector = $paginationNextSelector;
    }

    public function getPaginateComplement(): ?string
    {
        return $this->paginateComplement;
    }

    public function setPaginateComplement(string $paginateComplement): void
    {
        $this->paginateComplement = $paginateComplement;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
