<?php
require_once("ConnectionDB.php");

/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 29.10.2014
 * Time: 11:22
 */
class TeachersDB
{
    private $like;

    /**
     * @return string
     */
    public function getLike()
    {
        return $this->like;
    }

    /**
     * @param string $like
     */
    public function setLike($like)
    {
        $this->like = $like;
    }

    function __construct()
    {
        $this->like = "";
        $conn = new ConnectionDB();
        $conn->createConnection();
    }

    function __destruct()
    {
        $conn = new ConnectionDB();
        $conn->closeConnection();
    }

    public function insert(Teachers $teachers)
    {
        $query = "INSERT INTO teachers(`first_name`,`second_name`,`date`,`post_id`,`degree_id`,`topic`,`faculty_id`) VALUES('" . $teachers->getFirstName()
            . "','" . $teachers->getSecondName() . "','" . $teachers->getDate()
            . "','" . $teachers->getPostId() . "','" . $teachers->getDegreeId() . "','" . $teachers->getTopic() . "','" . $teachers->getFacultyId()
            . "')";
        mysql_query($query);
    }

    public function delete($id)
    {
        $query = "delete from teachers where id=" . $id;
        mysql_query($query);
    }

    public function getMaxId()
    {
        $query = "SELECT MAX(id) AS max_id FROM teachers";
        $rs = mysql_query($query);
        while ($row = mysql_fetch_array($rs))
            $max_id = $row["max_id"];
        return $max_id;
    }

    public function getAllFromCourses($course_id)
    {
        $query = "SELECT t.id, t.first_name, t.second_name, t.date, t.topic,
                            p.name AS name_post, d.name AS name_degree, f.name AS name_faculty
                            FROM teachers As t
                            INNER JOIN posts As p ON t.post_id = p.id
                            INNER JOIN degrees AS d ON t.degree_id = d.id
                            INNER JOIN faculties As f ON t.faculty_id = f.id
                            INNER JOIN courses_teachers AS c_t ON t.id = c_t.teacher_id
                            INNER JOIN courses As c ON c_t.course_id = c.id
                            WHERE c.id=" . $course_id . " AND f.id =" . $this->like;
        return mysql_query($query);
    }

    public function getALLFromFaculties($faculty_id)
    {
        $query = "SELECT t.id, t.first_name, t.second_name, t.date, t.topic,
                        p.name AS name_post, d.name AS name_degree, f.name AS name_faculty
                        FROM teachers As t
                        INNER JOIN posts As p ON t.post_id = p.id
                        INNER JOIN faculties As f ON t.faculty_id = f.id
                        INNER JOIN degrees AS d ON t.degree_id = d.id
                        WHERE t.faculty_id = " . $faculty_id . $this->like;
        return mysql_query($query);

    }

    public function getAllFromTeachers()
    {
        $query = "SELECT t.id, t.first_name, t.second_name, t.date, t.topic,
                        p.name AS name_post, d.name AS name_degree, f.name AS name_faculty
                        FROM teachers As t
                        INNER JOIN posts As p ON t.post_id = p.id
                        INNER JOIN faculties As f ON t.faculty_id = f.id
                        INNER JOIN degrees AS d ON t.degree_id = d.id" . $this->like;
        return mysql_query($query);

    }

}

?>