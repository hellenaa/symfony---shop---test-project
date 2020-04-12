<?php
/**
 * Created by PhpStorm.
 * User: minas
 * Date: 5/29/19
 * Time: 1:48 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class ProductType
 * @package AppBundle\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductTypeRepository")
 * @ORM\Table(name="product_type")
 */
class ProductType extends BaseEntity
{

}
