<?php
/**
 * Created by PhpStorm.
 * User: minas
 * Date: 5/20/19
 * Time: 2:39 PM
 */

namespace AppBundle\Entity;

use Application\Sonata\MediaBundle\Entity\Gallery;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Product
 * @package AppBundle\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductsRepository")
 * @ORM\Table(name="products")
 */
class Product extends BaseEntity
{
    const INDEX_COUNT = 4;


    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

    /**
     * @ORM\ManyToOne(targetEntity="ProductType")
     * @ORM\JoinColumn(name="product_type_id", referencedColumnName="id")
     */
    protected $type;

    /**
     * @ORM\ManyToOne(targetEntity="Store", inversedBy="products")
     * @ORM\JoinColumn(name="store_id", referencedColumnName="id")
     */
    protected $store;

    /**
     * @ORM\ManyToOne(targetEntity="ProfessionalOrieantion")
     * @ORM\JoinColumn(name="orientation_id", referencedColumnName="id")
     */
    protected $orientation;

    /**
     * @ORM\Column(type="string", name="sku", nullable=true)
     */
    protected $sku;

    /**
     * @ORM\Column(type="decimal", name="price")
     */
    protected $price = 0;

    /**
     * @ORM\Column(type="integer", name="quantity")
     */
    protected $quantity = 0;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Gallery", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="gallery_id", referencedColumnName="id")
     */
    protected $gallery;

    /**
     * @var bool
     * @ORM\Column(type="boolean", name="new")
     */
    protected $new = false;

    /**
     * @var bool
     * @ORM\Column(type="boolean", name="sale")
     */
    protected $sale = false;

    /**
     * @ORM\ManyToOne(targetEntity="Pack", inversedBy="products", cascade={"persist","remove"})
     * @ORM\JoinColumn(name="pack_id", referencedColumnName="id")
     */
    protected $pack;


    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(?string $sku): self
    {
        $this->sku = $sku;

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

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

    public function getType(): ?ProductType
    {
        return $this->type;
    }

    public function setType(?ProductType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getStore(): ?Store
    {
        return $this->store;
    }

    public function setStore(?Store $store): self
    {
        $this->store = $store;

        return $this;
    }

    public function getGallery(): ?Gallery
    {
        return $this->gallery;
    }

    public function setGallery(?Gallery $gallery): self
    {
        $this->gallery = $gallery;

        return $this;
    }


    public function getOrientation(): ?ProfessionalOrieantion
    {
        return $this->orientation;
    }

    public function setOrientation(?ProfessionalOrieantion $orientation): self
    {
        $this->orientation = $orientation;

        return $this;
    }

    public function getNew(): ?bool
    {
        return $this->new;
    }

    public function setNew(bool $new): self
    {
        $this->new = $new;

        return $this;
    }

    public function getSale(): ?bool
    {
        return $this->sale;
    }

    public function setSale(bool $sale): self
    {
        $this->sale = $sale;

        return $this;
    }

    public function getPack(): ?Pack
    {
        return $this->pack;
    }

    public function setPack(?Pack $pack): self
    {
        $this->pack = $pack;

        return $this;
    }
}
