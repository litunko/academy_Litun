<?php
require_once("ConnectionDB.php");

/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 28.10.2014
 * Time: 20:42
 */
class CoursesDB
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
        $this->like = "";
        $conn = new ConnectionDB();
        $conn->createConnection();
    }

    function __destruct()
    {
        $conn = new ConnectionDB();
        $conn->closeConnection();
    }

    public function insert(Courses $courses)
    {
        $query = "INSERT INTO courses(`name`,`semester`,`final_control`,`faculty_id`) VALUES('" . $courses->getName()
            . "','" . $courses->getSemester() . "','" . $courses->getFinalControl()
            . "','" . $courses->getFacultyId()
            . "')";
        mysql_query($query);
    }

    public function update(Courses $courses)
    {
        $query = "UPDATE 'Courses' SET name = '" . $courses->getName() . "',semester = '" . $courses->getSemester() .
            "',final_control = '" . $courses->getFinalControl() . "',id = '" . $courses->getFacultyId() .
            "' WHERE id='" . $courses->getId() . "';";
        mysql_query($query);
    }

    public function delete($id)
    {
        $query = "delete from courses where id=" . $id;
        mysql_query($query);
    }

    public function getAll()
    {
        $query = "SELECT c.id, c.name AS name_course,f.name AS name_faculty, c.semester, c.final_control
                        FROM courses AS c INNER JOIN faculties AS f ON c.faculty_id = f.id" . $this->like;
        return mysql_query($query);
    }

    public function getAllFromFaculties($faculty_id)
    {
        $query = "SELECT c.id, c.name AS name_course,f.name AS name_faculty, c.semester, c.final_control
                            FROM courses AS c
                            INNER JOIN faculties AS f ON c.faculty_id = f.id
                            WHERE c.faculty_id=" . $faculty_id . $this->like;
        return mysql_query($query);
    }

    public function getAllFromTeachers($faculty_id, $teacher_id)
    {
        $query = "SELECT c.id, c.name AS name_course,f.name AS name_faculty, c.semester, c.final_control
                            FROM courses AS c
                            INNER JOIN faculties AS f ON c.faculty_id = f.id
                            INNER JOIN courses_teachers AS c_t ON c_t.course_id = c.id
                            INNER JOIN teachers AS t ON c_t.teacher_id = t.id
                            WHERE t.id=" . $teacher_id . " AND c.faculty_id =" . $faculty_id . "" . $this->like;
        return mysql_query($query);
    }

    public function getAllFromGroups($group_id)
    {
        $query = "SELECT c.id, c.name AS name_course, f.name AS name_faculty, c.semester, c.final_control
                            FROM courses AS c
                            INNER JOIN faculties AS f ON c.faculty_id = f.id
                            INNER JOIN groups_courses AS g_c ON g_c.course_id = c.id
                            INNER JOIN groups AS g ON g_c.group_id = g.id
                            WHERE g_c.group_id=" . $group_id . "" . $this->like;
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
}

?>