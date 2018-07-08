<?php

namespace AppBundle\Entity\Quiz;

use AppBundle\Entity\FormationPage;
use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="quiz_question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Quiz\QuestionRepository")
 */
class Question
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
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Quiz\Response", mappedBy="question", cascade={"persist"})
     */
    private $responses;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FormationPage", inversedBy="questions")
     */
    private $formationPage;

    public function __construct(FormationPage $formationPage)
    {
        $this->formationPage = $formationPage;
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
     * Set responses
     *
     * @param  $responses
     *
     * @return Question
     */
    public function setResponses($responses)
    {
        foreach ($responses as $response) {
            $response->setQuestion($this);
        }

        $this->responses = $responses;

        return $this;
    }

    /**
     * Get responses
     *
     * @return int
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getFormationPage()
    {
        return $this->formationPage;
    }

    /**
     * @param mixed $formationPage
     */
    public function setFormationPage($formationPage)
    {
        $this->formationPage = $formationPage;
    }
}

