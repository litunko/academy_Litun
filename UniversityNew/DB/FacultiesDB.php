<?php
require_once("ConnectionDB.php");
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 28.10.2014
 * Time: 23:00
 */
class FacultiesDB
{
    var $like;

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

    public function insert(Faculties $faculties)
    {
        $query = "INSERT INTO faculties(`name`,`adress`,`year`,`teacher_id`) VALUES('" . $faculties->getName()
            . "','" . $faculties->getAdress() . "','" . $faculties->getYear()
            . "','" . $faculties->getTeacherId()
            . "')";
        mysql_query($query);
    }

    public function delete($id)
    {
        $query = "delete from faculties where id=" . $id;
        mysql_query($query);
    }

    public function getAll()
    {
        $query = "SELECT * FROM faculties" . $this->like;
        return  mysql_query($query);
    }
}

?>