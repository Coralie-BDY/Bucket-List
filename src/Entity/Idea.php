<?php

namespace App\Entity;

use App\Repository\IdeaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=IdeaRepository::class)
 */
class Idea
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="please provide your idea!")
     * @Assert\Length( min="2", max="255", minMessage="it must be more longer", maxMessage="it must be less longer")
     * @ORM\Column (type="string", length=255)
     */
    private $title;

    /**
     * @Assert\NotBlank (message="Please provide the description!")
     * @Assert\Length (min="2", max="1000", minMessage="it's a description!", maxMessage="it must be resume")
     * @ORM\Column (type="text")
     */
    private $description;

    /**
     * @Assert\NotBlank (message="Please provide your username")
     * @Assert\Length (min="2", max="50", minMessage="your username must me at least {{ limit }} long", maxMessage="Not to long than {{ limit }}")
     * @ORM\Column (type="string", length=50)
     */
    private $author;

    /**
     * @Assert\Type(type="boolean", message="not valid")
     * @ORM\Column (type="boolean")
     */
    private $isPublished;

    /**
     * @Assert\DateTime(message="not valid")
     * @Assert\LessThanOrEqual("now")
     * @ORM\Column (type="datetime")
     */
    private $dateCreated;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="ideas")
     */
    private $category;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }

    /**
     * @param mixed $isPublished
     */
    public function setIsPublished($isPublished): void
    {
        $this->isPublished = $isPublished;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param mixed $dateCreated
     */
    public function setDateCreated($dateCreated): void
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }



}

