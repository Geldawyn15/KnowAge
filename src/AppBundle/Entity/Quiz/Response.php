<?php

namespace AppBundle\Entity\Quiz;

use Doctrine\ORM\Mapping as ORM;

/**
 * Response
 *
 * @ORM\Table(name="quiz_response")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Quiz\ResponseRepository")
 */
class Response
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
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var bool
     *
     * @ORM\Column(name="isValid", type="boolean")
     */
    private $isValid;


    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Quiz\Question", inversedBy="responses")
     *
     */
    private $question;



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
     * Set isValid
     *
     * @param boolean $isValid
     *
     * @return Response
     */
    public function setIsValid($isValid)
    {
        $this->isValid = $isValid;

        return $this;
    }

    /**
     * Get isValid
     *
     * @return bool
     */
    public function getIsValid()
    {
        return $this->isValid;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
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
}

