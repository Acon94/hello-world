<?php
/**
 * job creation nclass
 */
namespace Itb\Model;
/**
 * used when making a new job
 * Class JobCreation
 * @package Itb\Model
 */
class JobCreation
{
    /**
     * the object's unique ID
     * @var int
     */
    private $id;

    /**
     * position of the job
     * @var string $text
     */
    private $position;

    /**
     * name of person who posted the text
     * @var string $location
     */
    private $location;
     /**
	     * name of person who posted the text
	     * @var string $location
	     */
    private $user;

    /**
     * when the job expires
     * string
     */
    private $expires;

    /**
     * created variable
     * @var
     */
    private $created;

    /**
     * get the job id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * get when the job was created
     * @return mixed
     */
	public function getCreated()
	{
	        return $this->created;
    }

    /**
     * set the job location
     * @param $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * set the position
     * @param $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
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
     * set when the job requires
     * @param $expires
     */
    public function setExpires($expires)
	{
			        $this->expires = $expires;
    }

    /**
     * set when the job was created
     * @param $created
     */

	public function setCreated($created)
	{
				        $this->created = $created;
    }

    /**
     * get the job location
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * get the job position
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * get when the job expires
     * @return mixed
     */
    public function getExpires()
    {
	        return $this->expires;
    }

    /**
     * get the user of the job
     * @return string
     */
    public function getuser()
    {
		        return $this->user;
    }



}