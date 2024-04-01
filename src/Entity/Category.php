<?php

namespace App\Entity;

use App\Entity\Mixin\GetSetTrait;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity
 */
class Category
{
    use GetSetTrait;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var bool
     *
     * @ORM\Column(name="disabled", type="boolean", nullable=false)
     */
    private $disabled = false;

    /**
     * @var int
     *
     * @ORM\Column(name="priority", type="integer", nullable=false)
     */
    private $priority = '0';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ProductAttributesType", inversedBy="category")
     * @ORM\JoinTable(name="category_has_product_attributes_type",
     *   joinColumns={
     *     @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="product_attributes_type_id", referencedColumnName="id")
     *   }
     * )
     */
    private $productAttributesType;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productAttributesType = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        if ($image != null) {
            $this->image = $image;
        }

        return $this;
    }

    public function getDisabled(): ?bool
    {
        return $this->disabled;
    }

    public function setDisabled(bool $disabled): self
    {
        $this->disabled = $disabled;

        return $this;
    }

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return Collection|ProductAttributesType[]
     */
    public function getProductAttributesType(): Collection
    {
        return $this->productAttributesType;
    }

    public function addProductAttributesType(ProductAttributesType $productAttributesType): self
    {
        if (!$this->productAttributesType->contains($productAttributesType)) {
            $this->productAttributesType[] = $productAttributesType;
        }

        return $this;
    }

    public function removeProductAttributesType(ProductAttributesType $productAttributesType): self
    {
        if ($this->productAttributesType->contains($productAttributesType)) {
            $this->productAttributesType->removeElement($productAttributesType);
        }

        return $this;
    }

    public function removeImage()
    {
        $this->image = null;

        return $this;
    }

    public function __toString()
    {
        return $this->name; //or anything else
    }
}
