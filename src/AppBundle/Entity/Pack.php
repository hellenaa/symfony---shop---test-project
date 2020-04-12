<?php
/**
 * Created by PhpStorm.
 * User: minas
 * Date: 6/12/19
 * Time: 1:02 PM
 */

namespace AppBundle\Entity;

use Application\Sonata\MediaBundle\Entity\Gallery;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Pack
 * @package AppBundle\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PackRepository")
 * @ORM\Table(name="packs")
 */
class Pack extends BaseEntity
{
    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="packs")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

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
     * @ORM\OneToMany(targetEntity="Product", mappedBy="pack", cascade={"persist","remove"})
     */
    protected $products;

    /**
     * @ORM\Column(type="integer", name="discount")
     */
    protected $discount = 0;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

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

    public function getGallery(): ?Gallery
    {
        return $this->gallery;
    }

    public function setGallery(?Gallery $gallery): self
    {
        $this->gallery = $gallery;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setPack($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            // set the owning side to null (unless already changed)
            if ($product->getPack() === $this) {
                $product->setPack(null);
            }
        }

        return $this;
    }

    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    public function setDiscount(int $discount): self
    {
        $this->discount = $discount;

        return $this;
    }
}
