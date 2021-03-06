<?php
namespace Itb\Model;

class JobCreation
{
    /**
     * the object's unique ID
     * @var int
     */
    private $id;

    /**
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
     * string
     */
    private $expires;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }


    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function setUser($user)
		    {
		        $this->user = $user;
    }

    public function setExpires($expires)
		    {
			        $this->expires = $expires;
    }


    public function getLocation()
    {
        return $this->location;
    }

    public function getPosition()
    {
        return $this->position;
    }
    public function getExpires()
	    {
	        return $this->expires;
    }
    public function getuser()
		    {
		        return $this->user;
    }



}