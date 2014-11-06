<?php

/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 05.11.2014
 * Time: 18:01
 */
require_once("ConnectionDB.php");
class GroupsDB
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

    public function insert(Groups $grp)
    {
        $query = "INSERT INTO groups(`name`,`number_students`,`name_leader`) VALUES('" . $grp->getName()
            . "','" . $grp->getNumberStudents() . "','" . $grp->getNameLeader()
            . "')";
        mysql_query($query);
    }

    public function delete($id)
    {
        $query = "delete from groups where id=" . $id;
        mysql_query($query);
    }


    public function getAllFromCourse($course_id)
    {
        $query = "SELECT g.id, g.name, g.number_students, g.name_leader FROM groups AS g
                    INNER JOIN groups_courses AS g_c ON g_c.group_id = g.id
                    INNER JOIN courses AS c ON g_c.course_id = c.id
                    WHERE c.id=" . $course_id . $this->like;
        return mysql_query($query);
    }

    public function getMaxId()
    {
        $query = "SELECT MAX(id) AS max_id FROM courses";
        $rs = mysql_query($query);
        while ($row = mysql_fetch_array($rs))
            $max_id = $row["max_id"];
        return $max_id;
    }

    public function getAll()
    {
        $query = "SELECT * FROM groups".$this->like;
        return mysql_query($query);
    }

}