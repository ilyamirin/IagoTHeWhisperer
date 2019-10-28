<?php

namespace App\Object;

class Profile
{
    /** @var int */
    private $answer1;

    /** @var int */
    private $answer2;

    /** @var int */
    private $answer3;

    /** @var int */
    private $answer4;

    /** @var int */
    private $answer5;

    /**
     * @param int|null $answer1
     * @param int|null $answer2
     * @param int|null $answer3
     */
    public function __construct(?int $answer1 = null, ?int $answer2 = null, ?int $answer3 = null)
    {
        $this->answer1 = $answer1;
        $this->answer2 = $answer2;
        $this->answer3 = $answer3;
    }

    /**
     * @return int|null
     */
    public function getAnswer1(): ?int
    {
        return $this->answer1;
    }

    /**
     * @param int $answer1
     * @return Profile
     */
    public function setAnswer1(?int $answer1): Profile
    {
        $this->answer1 = $answer1;
        return $this;
    }

    /**
     * @param int|null $answer2
     * @return Profile
     */
    public function setAnswer2(?int $answer2): Profile
    {
        $this->answer2 = $answer2;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAnswer2(): ?int
    {
        return $this->answer2;
    }

    /**
     * @param int|null $answer3
     * @return Profile
     */
    public function setAnswer3(?int $answer3): Profile
    {
        $this->answer3 = $answer3;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAnswer3(): ?int
    {
        return $this->answer3;
    }

    /**
     * @param int|null $answer4
     * @return Profile
     */
    public function setAnswer4(?int $answer4): Profile
    {
        $this->answer4 = $answer4;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAnswer4(): ?int
    {
        return $this->answer4;
    }

    /**
     * @param int|null $answer5
     * @return Profile
     */
    public function setAnswer5(?int $answer5): Profile
    {
        $this->answer5 = $answer5;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAnswer5(): ?int
    {
        return $this->answer4;
    }
}
