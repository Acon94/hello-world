<?php
namespace Itb\Model;

/**
 * Created in Textpad
 * By:Andrew Connolly B00069517
 *
 *
 *
 * represent CV objects for use in voting system
 *
 *
 *
 */
class CV
{
    /**
     * the objects unique ID
     * @var int
     */
    private $id;

    /**
    *
    * cv owner firstname
    * @var string
    */

	private $first;

	/**
    *
    * location of jobs
    * @var string
    */

	private $surname;

	/**
	*
	* date of jobs
	* @var string
	*/

	private $age;

    /**
    *
    * date of jobs
    * @var string
    */

	private $address;

    /**
    *
    * date of jobs
    * @var string
    */

	private $gender;

   /**
   *
   * date of jobs
   * @var string
   */

	private $experience;

	/**
	*
	* date of jobs
	* @var string
	*/

	private $image;


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

    public function getFirst()
		{
	        return $this->first;
    	}

    /**
	*	@return string
	*/

	public function getSurname()
		{
		    return $this->surname;
    	}

    /**
	*	@return string
	*/

	public function getAge()
		{
	        return $this->age;
	    }
	/**
	*	@return string
	*/

	public function getAddress()
	    {
	        return $this->address;
	    }

	/**
	*	@return string
	*/

	public function getGender()
	    {
	        return $this->gender;
	    }

	/**
	*	@return string
	*/
	public function getExperience()

		{
		    return $this->experience;
	    }

	/**
	*	@return string
	*/

	public function getImage()
		{
		    return $this->image;
	    }

	public function setId($id)
	    {
	        $this->id = $id;
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
    public function setAddress($address)
	    {
	        $this->address = $address;
    	}
    public function setGender($gender)
	    {
	        $this->gender = $gender;
    	}
    public function setExperience($experience)
	    {
	        $this->experience = $experience;
    	}
    public function setImage($image)
		{
	        $this->image = $image;
   		}

}