<?php
/**
 * User class used for checing for an login account
 *
 */
namespace Itb\Model;
use Mattsmithdev\PdoCrud\DatabaseTable;




/**
* class Uer this is the user class
*/
class User extends DatabaseTable
{
    /**
     *
     */
    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;

    /**
     * id of the user
     * @var int
     */
    private $id;
    /**
     * username of the user
     * @var string
     */
    private $username;
    /**
     * password of the user
     * @var string
     */
    private $password;

    /**
     * int to represnt the users role
     * @var int
     */
    private $role;

    /**
     * get id function
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * set urse id
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * username get function
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * set username
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * get the password
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * get role
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * set the role of th user
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
     * check role
     * @param $username
     * @return mixed
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
     * gets id odf the user
     * @param $username
     * @return mixed
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
