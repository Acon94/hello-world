<?php
/**
 * this is the job repo file
 */
namespace Itb\Model;

/**
 * Class DvdRepository
 * @package Itb\Model
 */

class DvdRepository extends DatabaseTableRepository
{
    /**
     * DvdRepository constructor.
     */
    public function __construct()
    {
        parent::__construct('Dvd', 'jobs');
    }

    /**
     * search fo specific
     * @param $searchText
     * @return mixed
     */
    public function searchByTitleOrCategory($searchText)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        // wrap wildcard '%' around the serach text for the SQL query
        $searchText = '%' . $searchText . '%';

        $statement = $connection->prepare('SELECT * from jobs WHERE (first LIKE :searchText) or (surname LIKE :searchText)');
        $statement->bindParam(':searchText', $searchText, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Itb\\Job');
        $statement->execute();

        $jobss = $statement->fetchAll();

        return $jobs;
    }




}