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
     * TODO ptit soucis de nommage => isRightResponse ?
     * @ORM\Column(name="isValid", type="boolean")
     */
    private $isValid;


    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Quiz\Question", inversedBy="responses",cascade={"all"})
     *
     */
    private $question;

    /**
     * @var bool
     * checké ou non dans les réponses
     */
    private $checked = false;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function getIsValid()
    {
        return $this->isValid;
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

    public function check()
    {
        $this->checked = true;
    }

    public function isChecked()
    {
        return $this->checked;
    }

    /**
     * @return bool true si la réponse (checked) est cohérente avec isValid de l'entité
     */
    public function isValid()
    {
        return $this->isValid && $this->checked || !$this->isValid && !$this->checked;
    }
}

