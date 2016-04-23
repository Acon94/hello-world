<?php
/**
 * thisis the student class us  to represent a student
 */
namespace Itb\Model;

/**
 * Class Student
 * @package Itb\Model
 */
class Student
{
    /**
     * the objects unique ID
     * @var int
     */
    private $id;

    /**
	 * students first name
     * @var string $first
     */

   private $first;

   /**
	* students surname
    * @var string $surname
    */
    private $surname;

       /**
		* students surname
	    * @var string $surname
	    */
    private $age;


    /**
	 * student status
     * @var string
     */
    private $status;

      /**
	   * stuident gpa
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

	/**
	 * set first name of student
	 * @param $first
	 */

   public function setFirst($first)
	    {
		        $this->first = $first;
    	}

	/**
	 * set surname of student
	 * @param $surname
	 */
    public function setSurname($surname)
	    {
		        $this->surname = $surname;
    	}

	/**
	 * set age of student
	 * @param $age
	 */
    public function setAge($age)
	    {
		        $this->age = $age;
    	}

	/**
	 * set gpa of student
	 * @param $gpa
	 */
    public function setGpa($gpa)
	    {
		        $this->gpa = $gpa;
    	}

	/**
	 * set status of student
	 * @param $status
	 */
    public function setStatus($status)
		{
		        $this->status = $status;
    	}

	/**
	 *
	 * set id of student
	 * @param $id
	 */
    public function setId($id)
		{
		        $this->id = $id;
    	}




}