<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductHasProductAttributes
 *
 * @ORM\Table(name="product_has_product_attributes", indexes={@ORM\Index(name="fk_product_has_product_attributes_product1_idx", columns={"product_id"}), @ORM\Index(name="fk_product_has_product_attributes_product_attributes1_idx", columns={"product_attributes_id"})})
 * @ORM\Entity
 */
class ProductHasProductAttributes
{
    /**
     * @var int
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $productId;

    /**
     * @var \ProductAttributes
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="ProductAttributes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_attributes_id", referencedColumnName="id")
     * })
     */
    private $productAttributes;

    public function getProductId(): ?int
    {
        return $this->productId;
    }

    public function getProductAttributes(): ?ProductAttributes
    {
        return $this->productAttributes;
    }

    public function setProductAttributes(?ProductAttributes $productAttributes): self
    {
        $this->productAttributes = $productAttributes;

        return $this;
    }


}
