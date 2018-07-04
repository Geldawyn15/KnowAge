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
    const PAGE = 0;
    const QUIZ = 1;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Formation", inversedBy="pages")
     *
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
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Quiz\Question", mappedBy="question")
     *
     */
    private $questions;


    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

    public function __construct(Formation $formation = null)
    {
        $this->formation = $formation;
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
     * Set formation
     *
     * @param $formation
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

    /**
     * @return mixed
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * @param mixed $questions
     */
    public function setQuestions($questions)
    {
        $this->questions = $questions;
    }
}

