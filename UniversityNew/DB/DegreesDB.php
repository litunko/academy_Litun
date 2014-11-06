<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 06.11.2014
 * Time: 2:14
 */
require_once("ConnectionDB.php");

class DegreesDB
{
    private $like;

    /**
     * @return mixed
     */
    public function getLike()
    {
        return $this->like;
    }

    /**
     * @param mixed $like
     */
    public function setLike($like)
    {
        $this->like = $like;
    }

    function __construct()
    {
        $like = "";
        $conn = new ConnectionDB();
        $conn->createConnection();
    }

    function __destruct()
    {
        $conn = new ConnectionDB();
        $conn->closeConnection();
    }

    public function insert(Degrees $d)
    {
        $query = "INSERT INTO degrees(`name`, `faculty_id`) VALUES('" . $d->getName()

            . "','" . $d->getFacultyId() . "')";
        mysql_query($query);
    }

    public function delete($id)
    {
        $query = "delete from degrees where id=" . $id;
        mysql_query($query);
    }

    public function getAll()
    {
        $query = "SELECT * FROM degrees" . $this->like;
        return mysql_query($query);
    }

    public function getAllWhereFacultyId($facId)
    {
        $query = "SELECT * FROM degrees WHERE " . $facId . $this->like;
        return mysql_query($query);
    }

} 