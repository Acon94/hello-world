<?php
namespace Itb;

/**
 * Created by PhpStorm.
 * User: matt
 * Date: 26/01/2016
 * Time: 10:44
 *
 * represent DVD objects for use in voting system
 *
 *
<th> ID </th>

 *
 */
class Job
{
    /**
     * the objects unique ID
     * @var int
     */
    private $id;

    /**
    *
    * positions of job
    * @var string
    */

	private $position;
	 /**
	    *
	    * location of jobs
	    * @var string
	    */

		private $location;


		 /**
		    *
		    * date of jobs
		    * @var string
		    */

		private $expires;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
    *	@return string
    */
    public function getPosition()
	    {
	        return $this->position;
    }
     /**
	    *	@return string
	    */
	    public function getLocation()
		    {
		        return $this->location;
    }

    /**
		    *	@return string
		    */
		    public function getexpires()
			    {
			        return $this->expires;
	    }




}