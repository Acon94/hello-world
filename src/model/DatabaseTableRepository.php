<?php
/**
 * DAtabase table class
 */
namespace Itb\Model;

/**
 * Class DatabaseTableRepository
 * @package Itb\Model
 */
class DatabaseTableRepository
{
    /**
     * name of the class
     * @var string
     */
    private $className;
    /**
     * name of the table
     * @var string
     */
    private $tableName;

    /**
     * DatabaseTableRepository constructor.
     * @param $className
     * @param $tableName
     */
    public function __construct($className, $tableName)
    {
        $this->className = __NAMESPACE__ . '\\' . $className;
        $this->tableName = $tableName;
    }

    /**
     * get all items from db
     * @return array
     */
    public function getAll()
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = 'SELECT * from ' . $this->tableName;
//          die($sql);

        $statement = $connection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->execute();

        $objects = $statement->fetchAll();
/*
        $numObjects = count($objects);
        die('num objects = ' . $numObjects);
*/
        return $objects;
    }

    /**
     * get cv by id
     * @param $id
     * @return array
     */
      public function getCV($id)
	    {
	        $db = new DatabaseManager();
	        $connection = $db->getDbh();

	        $sql = 'SELECT * from ' . $this->tableName . ' WHERE id =: 2' ;
	//          die($sql);

	        $statement = $connection->prepare($sql);
	        $statement->bindParam(':id', $id, \PDO::PARAM_INT);
	        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
	        $statement->execute();

	        $objects = $statement->fetchAll();
	/*
	        $numObjects = count($objects);
	        die('num objects = ' . $numObjects);
	*/
	        return $objects;
    }

    /**
     * get one item by id
     * @param $id
     * @return mixed|null
     */
    public function getOneById($id)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $statement = $connection->prepare('SELECT * from ' . $this->tableName . ' WHERE id=:id');
        $statement->bindParam(':id', $id, \PDO::PARAM_INT);
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->execute();

        if ($object = $statement->fetch()) {
            return $object;
        } else {
            return null;
        }
    }

    /**
     * used to get all the private messages associated with a user
     * @param $id
     * @return array
     */
    public function getAllPrivate($id)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = 'select DISTINCT privatemessags.* from privatemessags  JOIN users t2 on privatemessags.reciver  = :id';
//          die($sql);

        $statement = $connection->prepare($sql);
        $statement->bindParam(':id', $id, \PDO::PARAM_INT);
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->execute();

        $objects = $statement->fetchAll();
/*
        $numObjects = count($objects);
        die('num objects = ' . $numObjects);
*/
        return $objects;
    }


    /**
     * delete record for given ID - return true/false depending on delete success
     * @param $id
     *
     * @return bool
     */

    public function delete($id)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $statement = $connection->prepare('DELETE from ' . $this->tableName . ' WHERE id=:id');
        $statement->bindParam(':id', $id, \PDO::PARAM_INT);
        $queryWasSuccessful = $statement->execute();
        return $queryWasSuccessful;
    }

    /**
     * search by coloumn
     * @param $columnName
     * @param $searchText
     * @return array
     */

    public function searchByColumn($columnName, $searchText)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        // wrap wildcard '%' around the serach text for the SQL query
        $searchText = '%' . $searchText . '%';

        $statement = $connection->prepare('SELECT * ' . $this->tableName . ' students WHERE ' . $columnName . ' LIKE :searchText');
        $statement->bindParam(':searchText', $searchText, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->execute();

        $objects = $statement->fetchAll();

        return $objects;
    }


    /**
     * create a new entry
     * @param $object
     * @return int|string
     *
     */
    public function create($object)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $objectAsArrayForSqlInsert = DatatbaseUtility::objectToArrayLessId($object);
        $fields = array_keys($objectAsArrayForSqlInsert);
        $insertFieldList = DatatbaseUtility::fieldListToInsertString($fields);
        $valuesFieldList = DatatbaseUtility::fieldListToValuesString($fields);

//        $statement = $connection->prepare('INSERT into '. $this->tableName . ' (text, user,position,expires ) value (:text, :user, :position,:expires)');
        $statement = $connection->prepare('INSERT into '. $this->tableName . ' ' . $insertFieldList . $valuesFieldList);
        $statement->execute($objectAsArrayForSqlInsert);

        $queryWasSuccessful = ($statement->rowCount() > 0);
        if($queryWasSuccessful) {
            return $connection->lastInsertId();
        } else {
            return -1;
        }
    }


    /**
     * update a existing entry
     * @param $object
     * @param $id
     * @return bool
     */

    public function update($object, $id)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $objectAsArrayForSqlInsert = DatatbaseUtility::objectToArrayLessId($object);
        $fields = array_keys($objectAsArrayForSqlInsert);
        $updateFieldList = DatatbaseUtility::fieldListToUpdateString($fields);

        $sql = 'UPDATE '. $this->tableName . ' SET ' . $updateFieldList  . ' WHERE id=:id';
        $statement = $connection->prepare($sql);

        // add 'id' to parameters array
        $objectAsArrayForSqlInsert['id'] = $id;

        $queryWasSuccessful = $statement->execute($objectAsArrayForSqlInsert);

        return $queryWasSuccessful;
    }

}