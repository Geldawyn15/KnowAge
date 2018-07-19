<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;



/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FormationRepository")
 */
class Formation
{

    const PICTURE_WIDTH = 1111;
    const PICTURE_HEIGHT = 716;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=45, nullable=false)
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=false)
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Category")
     */
    private $category;

    /**
     * @ORM\Column(name="picture", type="string",nullable=false)
    */
    private $picture;


    /**
     * @var FormationPage[]
     * @ORM\OneToMany(targetEntity="FormationPage", mappedBy="formation", cascade={"all"})
     * @ORM\OrderBy({"ordering" = "ASC"})
     */
    private $pages;

    public function __construct()
    {
        $this->pages = new ArrayCollection();
    }


    public function addPage(FormationPage $formationPage)
    {
        $formationPage->setFormation($this);

        if (!$formationPage->getOrdering()) {
            if ($lastPage = $this->pages->last()) {
                $formationPage->setOrdering($lastPage->getOrdering() + 1);
            } else {
                $formationPage->setOrdering(0);
            }
        }

        $this->pages[] = $formationPage;

    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Formation
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Formation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Formation
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {

        return $this->createdAt;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Formation
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
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
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return string | UploadedFile
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
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
    public function setCategory($category)
    {
        $this->category = $category;
    }



    /**
     * Get description
     *
     * @return string
     */
    public function shortText($lenght)
    {
        return $shortText = substr($this->getDescription(), 0, $lenght);
    }

    /**
     * @return mixed
     */
    public function getPages()
    {
        return $this->pages;
    }

    public function pageExist($ordering)
    {
        if ($this->getPage($ordering)) {
            return true;
        }
        return false;

    }

    /**
     * @param mixed $pages
     */
    public function setPages($pages)
    {
        $this->pages = $pages;
    }

    public function getPage($ordering)
    {
        foreach ($this->pages as $page) {
            if ($page->getOrdering() == $ordering) {
                return $page;
            }
        }

        return null;
    }
}

