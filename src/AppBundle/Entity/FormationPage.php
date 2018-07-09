<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Quiz\Question;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * FormationPage
 *
 * @ORM\Table(name="formation_page")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FormationPageRepository")
 */
class FormationPage
{
    const TYPE_PAGE = 0;
    const TYPE_QUIZ = 1;

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
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    private $content;

    /**
     * @var int
     *
     * @ORM\Column(name="ordering", type="integer")
     */
    private $ordering;


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Quiz\Question", mappedBy="formationPage", cascade={"all"})
     */
    private $questions;


    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

    public function __construct(Formation $formation = null, $type = null)
    {
        $this->formation = $formation;
        $this->type = $type;
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
        $questions = array_filter($questions, function (Question $question) {
            return $question->getContent();
        });

        $this->questions = new ArrayCollection($questions);
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}

