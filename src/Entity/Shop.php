<?php

namespace App\Entity;

use App\Entity\Mixin\GetSetTrait;
use App\Entity\Mixin\TimestampableTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Shop
 *
 * @ORM\Table(name="shop")
 * @ORM\Entity(repositoryClass="App\Repository\ShopRepository")
 */
class Shop
{
    use TimestampableTrait;

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
     * @ORM\Column(name="image", type="text", length=65535, nullable=true)
     */
    private $image;

    /**
     * @var string|null
     *
     * @ORM\Column(name="thumbnail", type="text", length=65535, nullable=true)
     */
    private $thumbnail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string|null
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="web", type="string", length=255, nullable=true)
     */
    private $web;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=15, nullable=true)
     */
    private $phone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="priority", type="integer", nullable=false)
     */
    private $priority = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="disabled", type="boolean", nullable=true)
     */
    private $disabled = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var int|null
     *
     * @ORM\Column(name="porcentaje_ventas_mensuales_fisica", type="integer", nullable=true)
     */
    private $porcentajeVentasMensualesFisica;

    /**
     * @var int|null
     *
     * @ORM\Column(name="porcentaje_ventas_mensuales_virtual", type="integer", nullable=true)
     */
    private $porcentajeVentasMensualesVirtual;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="last_invoice_date", type="datetime", nullable=true)
     */
    private $lastInvoiceDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comission_click", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $comissionClick;

    /**
     * @var string|null
     *
     * @ORM\Column(name="zip", type="string", length=15, nullable=true)
     */
    private $zip;

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

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        if($image != null) {
            $this->image = $image;
        }

        return $this;
    }

    /**
     * Remove image
     *
     * @param string $image
     *
     * @return Category
     */
    public function removeImage() {
        $this->image = null;

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?string $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getWeb(): ?string
    {
        return $this->web;
    }

    public function setWeb(?string $web): self
    {
        $this->web = $web;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

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

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    public function getDisabled(): ?bool
    {
        return $this->disabled;
    }

    public function setDisabled(?bool $disabled): self
    {
        $this->disabled = $disabled;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPorcentajeVentasMensualesFisica(): ?int
    {
        return $this->porcentajeVentasMensualesFisica;
    }

    public function setPorcentajeVentasMensualesFisica(?int $porcentajeVentasMensualesFisica): self
    {
        $this->porcentajeVentasMensualesFisica = $porcentajeVentasMensualesFisica;

        return $this;
    }

    public function getPorcentajeVentasMensualesVirtual(): ?int
    {
        return $this->porcentajeVentasMensualesVirtual;
    }

    public function setPorcentajeVentasMensualesVirtual(?int $porcentajeVentasMensualesVirtual): self
    {
        $this->porcentajeVentasMensualesVirtual = $porcentajeVentasMensualesVirtual;

        return $this;
    }

    public function getLastInvoiceDate(): ?\DateTimeInterface
    {
        return $this->lastInvoiceDate;
    }

    public function setLastInvoiceDate(?\DateTimeInterface $lastInvoiceDate): self
    {
        $this->lastInvoiceDate = $lastInvoiceDate;

        return $this;
    }

    public function getComissionClick()
    {
        return $this->comissionClick;
    }

    public function setComissionClick($comissionClick): self
    {
        $this->comissionClick = $comissionClick;

        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(?string $zip): self
    {
        $this->zip = $zip;

        return $this;
    }


}
