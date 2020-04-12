<?php
/**
 * Created by PhpStorm.
 * User: minas
 * Date: 5/6/19
 * Time: 3:30 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


abstract class BaseEntity
{
    const localeArray = ["am","ru","en"];


    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $titleArm;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $titleRus;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $titleEng;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleArm(): ?string
    {
        return $this->titleArm;
    }

    public function setTitleArm(?string $titleArm): self
    {
        $this->titleArm = $titleArm;

        return $this;
    }

    public function getTitleRus(): ?string
    {
        return $this->titleRus;
    }

    public function setTitleRus(?string $titleRus): self
    {
        $this->titleRus = $titleRus;

        return $this;
    }

    public function getTitleEng(): ?string
    {
        return $this->titleEng;
    }

    public function setTitleEng(string $titleEng): self
    {
        $this->titleEng = $titleEng;

        return $this;
    }

    public function __toString()
    {
        return (string)$this->getTitleEng();
    }
}
