<?php

namespace Itb\Model;
use Mattsmithdev\PdoCrud\DatabaseTable;




/*
*	use Itb\Model\DatabaseTable;
*	use Itb\Model\DatabaseManager;
*/
class User extends DatabaseTable
{
    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;

    private $id;
    private $username;
    private $password;
    private $role;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * hash the password before storing ...
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->password = $hashedPassword;
    }
    /**
    *
    * function to gt the role
    *
    */
    public static function checkRole($username)
    {
			$db = new DatabaseManager();
			        $connection = $db->getDbh();

			        $sql = 'SELECT role FROM users WHERE username=:username';
			        $statement = $connection->prepare($sql);
			         $statement->bindParam(':username', $username, \PDO::PARAM_STR);

       		 $statement->execute();
	    	 $role= $statement->fetch();





    		return $role;

    }
      /**
	    *
	    * function to get the id
	    *
	    */
	    public static function retrieveID($username)
	    {
				$db = new DatabaseManager();
				        $connection = $db->getDbh();

				        $sql = 'SELECT id FROM users WHERE username=:username';
				        $statement = $connection->prepare($sql);
				         $statement->bindParam(':username', $username, \PDO::PARAM_STR);

	       		 $statement->execute();
		    	 $id= $statement->fetch();





	    		return $id;

    }

    /**
     * return success (or not) of attempting to find matching username/password in the repo
     * @param $username
     * @param $password
     *
     * @return bool
     */
    public static function canFindMatchingUsernameAndPassword($username, $password)
    {
        $user = User::getOneByUsername($username);

        // if no record has this username, return FALSE
        if(null == $user){
            return false;
        }

        // hashed correct password
        $hashedStoredPassword = $user->getPassword();

        // return whether or not hash of input password matches stored hash
        return password_verify($password, $hashedStoredPassword);
    }

    /**
     * if record exists with $username, return User object for that record
     * otherwise return 'null'
     *
     * @param $username
     *
     * @return mixed|null
     */
    public static function getOneByUsername($username)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = 'SELECT * FROM users WHERE username=:username';
        $statement = $connection->prepare($sql);
        $statement->bindParam(':username', $username, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetch()) {
            return $object;
        } else {
            return null;
        }
    }




}