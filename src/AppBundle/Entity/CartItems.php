<?php
/**
 * Created by PhpStorm.
 * User: minas
 * Date: 7/9/19
 * Time: 12:46 PM
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class CartItems
 * @package AppBundle\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CartItemsRepository")
 * @ORM\Table(name="cart_items")
 */
class CartItems
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Cart", inversedBy="cartItems")
     * @ORM\JoinColumn(name="cart_id", referencedColumnName="id")
     */
    protected $cart;

    /**
     * @ORM\ManyToOne(targetEntity="Pack")
     * @ORM\JoinColumn(name="pack_id", referencedColumnName="id")
     */
    protected $pack;

    /**
     * Many cart items have Many accessories.
     * @ORM\ManyToMany(targetEntity="Product")
     * @ORM\JoinTable(name="cartItems_accessories",
     *      joinColumns={@ORM\JoinColumn(name="cartItem_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")}
     *      )
     */
    protected $accessories;

    public function __construct()
    {
        $this->accessories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCart(): ?Cart
    {
        return $this->cart;
    }

    public function setCart(?Cart $cart): self
    {
        $this->cart = $cart;

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

    /**
     * @return Collection|Product[]
     */
    public function getAccessories(): Collection
    {
        return $this->accessories;
    }

    public function addAccessory(Product $accessory): self
    {
        if (!$this->accessories->contains($accessory)) {
            $this->accessories[] = $accessory;
        }

        return $this;
    }

    public function removeAccessory(Product $accessory): self
    {
        if ($this->accessories->contains($accessory)) {
            $this->accessories->removeElement($accessory);
        }

        return $this;
    }
}
