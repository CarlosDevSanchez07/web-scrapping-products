<?php

namespace App\Entity;

use App\Entity\Mixin\GetSetTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * ProductAttributes
 *
 * @ORM\Table(name="product_attributes", indexes={@ORM\Index(name="fk_product_attributes_product_attributes_type1_idx", columns={"product_attributes_type"})})
 * @ORM\Entity
 */
class ProductAttributes
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
     * @var string
     *
     * @ORM\Column(name="excel_name", type="string", length=255, nullable=false)
     */
    private $excelName;

    /**
     * @var int|null
     *
     * @ORM\Column(name="attribute_group", type="integer", nullable=true)
     */
    private $attributeGroup;

    /**
     * @var string
     *
     * @ORM\Column(name="priority", type="string", length=45, nullable=false)
     */
    private $priority = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="hexadecimal", type="string", length=6, nullable=true)
     */
    private $hexadecimal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="text", length=65535, nullable=true)
     */
    private $image;

    /**
     * @var \ProductAttributesType
     *
     * @ORM\ManyToOne(targetEntity="ProductAttributesType", inversedBy="productAttributes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_attributes_type", referencedColumnName="id")
     * })
     */
    private $productAttributesType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Product", mappedBy="productAttributes")
     */
    private $product;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ProductAttributes", inversedBy="attribute")
     * @ORM\JoinTable(name="related_attributes",
     *   joinColumns={
     *     @ORM\JoinColumn(name="attribute", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="related_attribute", referencedColumnName="id")
     *   }
     * )
     */
    private $relatedAttribute;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->product = new \Doctrine\Common\Collections\ArrayCollection();
        $this->relatedAttribute = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productAttributtesType = new ArrayCollection();
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

    public function getExcelName(): ?string
    {
        return $this->excelName;
    }

    public function setExcelName(string $excelName): self
    {
        $this->excelName = $excelName;

        return $this;
    }

    public function getAttributeGroup(): ?int
    {
        return $this->attributeGroup;
    }

    public function setAttributeGroup(?int $attributeGroup): self
    {
        $this->attributeGroup = $attributeGroup;

        return $this;
    }

    public function getPriority(): ?string
    {
        return $this->priority;
    }

    public function setPriority(string $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    public function getHexadecimal(): ?string
    {
        return $this->hexadecimal;
    }

    public function setHexadecimal(?string $hexadecimal): self
    {
        $this->hexadecimal = $hexadecimal;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getProductAttributesType(): ?ProductAttributesType
    {
        return $this->productAttributesType;
    }

    public function setProductAttributesType(?ProductAttributesType $productAttributesType): self
    {
        $this->productAttributesType = $productAttributesType;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product[] = $product;
            $product->addProductAttribute($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->product->contains($product)) {
            $this->product->removeElement($product);
            $product->removeProductAttribute($this);
        }

        return $this;
    }

    /**
     * @return Collection|ProductAttributes[]
     */
    public function getRelatedAttribute(): Collection
    {
        return $this->relatedAttribute;
    }

    public function addRelatedAttribute(ProductAttributes $relatedAttribute): self
    {
        if (!$this->relatedAttribute->contains($relatedAttribute)) {
            $this->relatedAttribute[] = $relatedAttribute;
        }

        return $this;
    }

    public function removeRelatedAttribute(ProductAttributes $relatedAttribute): self
    {
        if ($this->relatedAttribute->contains($relatedAttribute)) {
            $this->relatedAttribute->removeElement($relatedAttribute);
        }

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProductAttributtesType(): Collection
    {
        return $this->productAttributtesType;
    }

    public function addProductAttributtesType(Product $productAttributtesType): self
    {
        if (!$this->productAttributtesType->contains($productAttributtesType)) {
            $this->productAttributtesType[] = $productAttributtesType;
            $productAttributtesType->addProductAttribute($this);
        }

        return $this;
    }

    public function removeProductAttributtesType(Product $productAttributtesType): self
    {
        if ($this->productAttributtesType->contains($productAttributtesType)) {
            $this->productAttributtesType->removeElement($productAttributtesType);
            $productAttributtesType->removeProductAttribute($this);
        }

        return $this;
    }
}
