<?php
namespace Itb;


class student
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function getFirst()
    {
        return $this->first;
    }
     public function getSurname()
	    {
	        return $this->surname;
    }

      public function getAge()
    	    {
    	        return $this->age;
    }
    public function getGpa()
        {
            return $this->gpa;
    }

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




}