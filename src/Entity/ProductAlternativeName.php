<?php

namespace App\Entity;

use App\Entity\Mixin\GetSetTrait;
use App\Entity\Mixin\TimestampableTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * ProductAlternativeName
 *
 * @ORM\Table(name="product_alternative_name", indexes={@ORM\Index(name="fk_product_alternative_name_product1_idx", columns={"product"})})
 * @ORM\Entity
 */
class ProductAlternativeName
{
    use GetSetTrait;

    use TimestampableTrait;

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
     * @ORM\Column(name="provider_product_id", type="string", length=255, nullable=true)
     */
    private $providerProductId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product", referencedColumnName="id")
     * })
     */
    private $product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProviderProductId(): ?string
    {
        return $this->providerProductId;
    }

    public function setProviderProductId(?string $providerProductId): self
    {
        $this->providerProductId = $providerProductId;

        return $this;
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

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }


}
