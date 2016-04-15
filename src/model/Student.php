<?php
namespace Itb\Model;


class Student
{
    /**
     * the objects unique ID
     * @var int
     */
    private $id;

    /**
     * @var string $first
     */

   private $first;

   /**
	     * @var string $surname
	     */
    private $surname;


    /**
     * @var string
     */
    private $status;

      /**
         * @var string
         */
    private $gpa;


    /**
     * returns id of student
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
	* returns first name of student
	* @return string
    */

    public function getFirst()
    	{
    	    return $this->first;
    	}

    /**
	* returns id of student
	* @return string
    */

    public function getSurname()
	    {
	        return $this->surname;
    	}

    /**
	* 	returns id of student
	* 	@return string
    */

    public function getAge()
   	    {
    	    return $this->age;
  	    }
    /**
	* returns gpa of student
	* @return string
    */
    public function getGpa()
        {
            return $this->gpa;
   		}

   	/**
	* returns employment status of student
	* @return string
    */

    public function getStatus()
    {
        return $this->status;
    }



   public function setFirst($first)
	    {
		        $this->first = $first;
    	}

    public function setSurname($surname)
	    {
		        $this->surname = $surname;
    	}
    public function setAge($age)
	    {
		        $this->age = $age;
    	}
    public function setGpa($gpa)
	    {
		        $this->gpa = $gpa;
    	}
    public function setStatus($status)
		{
		        $this->status = $status;
    	}
    public function setId($id)
		{
		        $this->id = $id;
    	}




}