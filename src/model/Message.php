<?php
/**
 * message class
 */
namespace Itb\Model;

/**
 * Class Message
 * @package Itb\Model
 *
 */

class Message
{


    /**
     * the object's unique ID
     * @var int
     */
    private $id;

    /**
     * this is text
     * @var string $text
     */
    private $text;

    /**
     * name of person who posted the text
     * @var string $user
     */
    private $user;

    /**
     * PHP timestamp of when text created
     * @var \DateTime
     */
    private $timestamp;




    /**
     * get id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * set the text of the message
     * @param $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * set the user
     * @param $user
     */

    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * get text
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * get user
     * @return string
     */

    public function getUser()
    {
        return $this->user;
    }

    /**
     * set the timestamp
     * @param $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * get the timestamp as a PHP \DateTime object
     * @return \DateTime
     */
    public function getTimestamp()
    {
        $dateTimeObject = new \DateTime();
        $dateTimeObject->setTimestamp($this->timestamp);

        return $dateTimeObject;
    }

}