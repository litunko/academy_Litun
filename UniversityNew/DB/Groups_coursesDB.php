<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 05.11.2014
 * Time: 19:59
 */
require_once("ConnectionDB.php");
class Groups_coursesDB
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

    public function insert(Groups_courses $g_c)
    {
        $query = "INSERT INTO groups_courses(`course_id`,`group_id`) VALUES('" . $g_c->getCourseId()
            . "','" . $g_c->getGroupId()
            . "')";
        mysql_query($query);
    }

    public function delete($id)
    {
        $query = "delete from groups_courses where id=" . $id;
        mysql_query($query);
    }

} 