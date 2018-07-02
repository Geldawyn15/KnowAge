<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormationPage
 *
 * @ORM\Table(name="formation_page")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FormationPageRepository")
 */
class FormationPage
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *@ORM\ManyToOne(targetEntity="AppBundle\Entity\Formation")
     * @ORM\Column(name="formation", type="integer")
     */
    private $formation;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var int
     *
     * @ORM\Column(name="ordering", type="integer")
     */
    private $ordering;


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
     * Set formation
     *
     * @param integer $formation
     *
     * @return FormationPage
     */
    public function setFormation($formation)
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * Get formation
     *
     * @return int
     */
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return FormationPage
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set ordering
     *
     * @param integer $ordering
     *
     * @return FormationPage
     */
    public function setOrdering($ordering)
    {
        $this->ordering = $ordering;

        return $this;
    }

    /**
     * Get ordering
     *
     * @return int
     */
    public function getOrdering()
    {
        return $this->ordering;
    }
}

