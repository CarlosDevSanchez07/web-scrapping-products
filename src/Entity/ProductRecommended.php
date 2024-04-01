<?php

namespace App\Entity;

use App\Entity\Mixin\GetSetTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * ProductRecommended
 *
 * @ORM\Table(name="product_recommended", indexes={@ORM\Index(name="fk_product_has_product_product2_idx", columns={"recommended"}), @ORM\Index(name="fk_product_has_product_product1_idx", columns={"product"})})
 * @ORM\Entity
 */
class ProductRecommended
{
    use GetSetTrait;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="priority", type="integer", nullable=false)
     */
    private $priority = '0';

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product", referencedColumnName="id")
     * })
     */
    private $product;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="recommended", referencedColumnName="id")
     * })
     */
    private $recommended;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return ProductRecommended
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set product
     *
     * @param \App\Entity\Product $product
     *
     * @return ProductRecommended
     */
    public function setProduct(\App\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \App\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set recommended
     *
     * @param \App\Entity\Product $recommended
     *
     * @return ProductRecommended
     */
    public function setRecommended(\App\Entity\Product $recommended = null)
    {
        $this->recommended = $recommended;

        return $this;
    }

    /**
     * Get recommended
     *
     * @return \App\Entity\Product
     */
    public function getRecommended()
    {
        return $this->recommended;
    }
}
