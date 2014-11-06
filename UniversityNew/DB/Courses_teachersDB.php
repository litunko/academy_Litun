<?php
require_once("ConnectionDB.php");
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 05.11.2014
 * Time: 19:40
 */
class Courses_teachersDB{
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

    public function insert(Courses_teachers $c_t)
    {
        $query = "INSERT INTO courses_teachers(`course_id`,`teacher_id`) VALUES('" . $c_t->getCourseId()
            . "','" . $c_t->getTeacherId()
            . "')";
        mysql_query($query);
    }

    public function delete($id)
    {
        $query = "delete from courses_teachers where id=" . $id;
        mysql_query($query);
    }

}