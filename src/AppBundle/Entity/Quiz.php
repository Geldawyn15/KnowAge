<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quiz
 *
 * @ORM\Table(name="quiz")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuizRepository")
 */
class Quiz
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
     * @ORM\Column(name="question1", type="string", length=255)
     */
    private $question1;

    /**
     * @var string
     *
     * @ORM\Column(name="question2", type="string", length=255)
     */
    private $question2;

    /**
     * @var string
     *
     * @ORM\Column(name="question3", type="string", length=255)
     */
    private $question3;

    /**
     * @var string
     *
     * @ORM\Column(name="question4", type="string", length=255)
     */
    private $question4;

    /**
     * @var string
     *
     * @ORM\Column(name="question5", type="string", length=255)
     */
    private $question5;

    /**
     * @var string
     *
     * @ORM\Column(name="answer1", type="string", length=255)
     */
    private $answer1;

    /**
     * @var string
     *
     * @ORM\Column(name="answer2", type="string", length=255)
     */
    private $answer2;

    /**
     * @var string
     *
     * @ORM\Column(name="answer3", type="string", length=255)
     */
    private $answer3;

    /**
     * @var string
     *
     * @ORM\Column(name="answer4", type="string", length=255)
     */
    private $answer4;

    /**
     * @var string
     *
     * @ORM\Column(name="answer5", type="string", length=255)
     */
    private $answer5;

    /**
     * @var array
     *
     * @ORM\Column(name="response", type="array")
     */
    private $response;


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
     * Set question1
     *
     * @param string $question1
     *
     * @return Quiz
     */
    public function setQuestion1($question1)
    {
        $this->question1 = $question1;

        return $this;
    }

    /**
     * Get question1
     *
     * @return string
     */
    public function getQuestion1()
    {
        return $this->question1;
    }

    /**
     * Set question2
     *
     * @param string $question2
     *
     * @return Quiz
     */
    public function setQuestion2($question2)
    {
        $this->question2 = $question2;

        return $this;
    }

    /**
     * Get question2
     *
     * @return string
     */
    public function getQuestion2()
    {
        return $this->question2;
    }

    /**
     * Set question3
     *
     * @param string $question3
     *
     * @return Quiz
     */
    public function setQuestion3($question3)
    {
        $this->question3 = $question3;

        return $this;
    }

    /**
     * Get question3
     *
     * @return string
     */
    public function getQuestion3()
    {
        return $this->question3;
    }

    /**
     * Set question4
     *
     * @param string $question4
     *
     * @return Quiz
     */
    public function setQuestion4($question4)
    {
        $this->question4 = $question4;

        return $this;
    }

    /**
     * Get question4
     *
     * @return string
     */
    public function getQuestion4()
    {
        return $this->question4;
    }

    /**
     * Set question5
     *
     * @param string $question5
     *
     * @return Quiz
     */
    public function setQuestion5($question5)
    {
        $this->question5 = $question5;

        return $this;
    }

    /**
     * Get question5
     *
     * @return string
     */
    public function getQuestion5()
    {
        return $this->question5;
    }

    /**
     * Set answer1
     *
     * @param string $answer1
     *
     * @return Quiz
     */
    public function setAnswer1($answer1)
    {
        $this->answer1 = $answer1;

        return $this;
    }

    /**
     * Get answer1
     *
     * @return string
     */
    public function getAnswer1()
    {
        return $this->answer1;
    }

    /**
     * Set answer2
     *
     * @param string $answer2
     *
     * @return Quiz
     */
    public function setAnswer2($answer2)
    {
        $this->answer2 = $answer2;

        return $this;
    }

    /**
     * Get answer2
     *
     * @return string
     */
    public function getAnswer2()
    {
        return $this->answer2;
    }

    /**
     * Set answer3
     *
     * @param string $answer3
     *
     * @return Quiz
     */
    public function setAnswer3($answer3)
    {
        $this->answer3 = $answer3;

        return $this;
    }

    /**
     * Get answer3
     *
     * @return string
     */
    public function getAnswer3()
    {
        return $this->answer3;
    }

    /**
     * Set answer4
     *
     * @param string $answer4
     *
     * @return Quiz
     */
    public function setAnswer4($answer4)
    {
        $this->answer4 = $answer4;

        return $this;
    }

    /**
     * Get answer4
     *
     * @return string
     */
    public function getAnswer4()
    {
        return $this->answer4;
    }

    /**
     * Set answer5
     *
     * @param string $answer5
     *
     * @return Quiz
     */
    public function setAnswer5($answer5)
    {
        $this->answer5 = $answer5;

        return $this;
    }

    /**
     * Get answer5
     *
     * @return string
     */
    public function getAnswer5()
    {
        return $this->answer5;
    }

    /**
     * Set response
     *
     * @param array $response
     *
     * @return Quiz
     */
    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * Get response
     *
     * @return array
     */
    public function getResponse()
    {
        return $this->response;
    }
}

