<?php

namespace App\Entity;

use App\Entity\User;
use AppBundle\Entity\Event;
use Doctrine\ORM\Mapping as ORM;
// use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\Constraints as AcmeAssert;
use Symfony\Component\Validator\Constraints as Assert;

/** 
 * @ORM\Entity(repositoryClass="App\Repository\GuestRepository")
 * @AcmeAssert\Combined
 */
class Guest
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var string $image
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     */
    private $defimage;

    /**
     * @ORM\Column(type="integer",  options={"default" : 0})
     */
    private $status;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="guests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $createdBy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    

    /**
     * getId
     *
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * getImage
     *
     * @return void
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * setImage
     *
     * @param  mixed $image
     *
     * @return void
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * getImage
     *
     * @return void
     */
    public function getDefimage()
    {
        return $this->image;
    }

    /**
     * setImage
     *
     * @param  mixed $image
     *
     * @return void
     */
    public function setDefimage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * getStatus
     *
     * @return int
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * setStatus
     *
     * @param  mixed $status
     *
     * @return self
     */
    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * getCreatedBy
     *
     * @return User
     */
    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    /**
     * setCreatedBy
     *
     * @param  mixed $createdBy
     *
     * @return self
     */
    public function setCreatedBy(?User $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * getDescription
     *
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * setDescription
     *
     * @param  mixed $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
