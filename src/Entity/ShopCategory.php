<?php

namespace App\Entity;

use App\Entity\Mixin\GetSetTrait;
use App\Entity\Mixin\TimestampableTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * ShopCategory
 *
 * @ORM\Table(name="shop_category", indexes={@ORM\Index(name="fk_shop_has_category_shop1_idx", columns={"shop"}), @ORM\Index(name="fk_shop_has_category_category1_idx", columns={"category"})})
 * @ORM\Entity
 */
class ShopCategory
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
     * @var string|null
     *
     * @ORM\Column(name="shop_category_id", type="string", length=255, nullable=true)
     */
    private $shopCategoryId;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @var \Shop
     *
     * @ORM\ManyToOne(targetEntity="Shop")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="shop", referencedColumnName="id")
     * })
     */
    private $shop;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShopCategoryId(): ?string
    {
        return $this->shopCategoryId;
    }

    public function setShopCategoryId(?string $shopCategoryId): self
    {
        $this->shopCategoryId = $shopCategoryId;

        return $this;
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

    public function getShop(): ?Shop
    {
        return $this->shop;
    }

    public function setShop(?Shop $shop): self
    {
        $this->shop = $shop;

        return $this;
    }


}
