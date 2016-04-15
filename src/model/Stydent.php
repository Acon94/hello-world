<?php
namespace Itb\Model;
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
<th> first </th>
<th> category </th>
<th> price </th>
<th> vote average </th>
<th> num votes </th>
<th> stars </th>
 *
 */
class Stydent
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



    public function getStatus()
    {
        return $this->status;
    }




}