<?php
namespace Itb;

class DvdRepository extends DatabaseTableRepository
{
    public function __construct()
    {
        parent::__construct('CV', 'cvss');
    }

    public function searchByTitleOrCategory($searchText)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        // wrap wildcard '%' around the serach text for the SQL query
        $searchText = '%' . $searchText . '%';

        $statement = $connection->prepare('SELECT * from cvs WHERE id = id');
        $statement->bindParam(':id', $id, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Itb\\CV');
        $statement->execute();

        $cvs = $statement->fetchAll();

        return $cvs;
    }




}