<?php
/**
 *
 * This is used when creating a new job
 *
 */
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
class JobApp
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
    * address
    * @var string
    */

	private $address;

    /**
    *
    * gender
    * @var string
    */

	private $gender;

   /**
   *
   * experience
   * @var string
   */

	private $experience;

	/**
	 * position of the job
	 * @var string
	 */

	private $position;

	/**
	*
	* image
	* @var string
	*/

	private $image;


    /**
	 * return id of the jon
     * @return int
     */
    public function getId()
    	{
    	    return $this->id;
    	}

    /**
	 * get first name
    *	@return string
    */

    public function getFirst()
		{
	        return $this->first;
    	}

    /**
	 * get surname
	*	@return string
	*/

	public function getSurname()
		{
		    return $this->surname;
    	}

    /**
	 * get age
	*	@return string
	*/

	public function getAge()
		{
	        return $this->age;
	    }
	/**
	 * get address
	*	@return string
	*/

	public function getAddress()
	    {
	        return $this->address;
	    }

	/**
	 *
	 * get gender
	*	@return string
	*/

	public function getGender()
	    {
	        return $this->gender;
	    }

	/**
	 * get experience
	*	@return string
	*/
	public function getExperience()

		{
		    return $this->experience;
	    }
	/**
	 * get position
	 *	@return string
	 */
		public function getPosition()

			{
			    return $this->position;
		    }


	/**
	*   get image
	*	@return string
	*/

	public function getImage()
		{
		    return $this->image;
	    }

	/**
	 * set id of job
	 * @param $id
	 */
	public function setId($id)
	    {
	        $this->id = $id;
    	}

	/**
	 * set first of applicant
	 * @param $first
	 */
	public function setFirst($first)
	    {
	        $this->first = $first;
    	}

	/**
	 * set surname of applicant
	 * @param $surname
	 */
    public function setSurname($surname)
	    {
	        $this->surname = $surname;
    	}

	/**
	 * ste Age of applciant
	 * @param $age
	 */
    public function setAge($age)
	    {
	        $this->age = $age;
    	}

	/**
	 *
	 * set address of applicant
	 * @param $address
	 */
    public function setAddress($address)
	    {
	        $this->address = $address;
    	}

	/**
	 * set gender of applicant
	 * @param $gender
	 */
    public function setGender($gender)
	    {
	        $this->gender = $gender;
    	}

	/**
	 * set experience
	 * @param $experience
	 */
    public function setExperience($experience)
	    {
	        $this->experience = $experience;
    	}

	/**
	 * se t position
	 * @param $position
	 */
   	public function setPosition($position)
	    {
	        $this->position = $position;
    	}

	/**
	 * set image
	 * @param $image
	 */
    public function setImage($image)
		{
	        $this->image = $image;
   		}

}