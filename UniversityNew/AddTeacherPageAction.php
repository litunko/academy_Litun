<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 30.10.2014
 * Time: 1:06
 */
session_start();
require_once("DB/CoursesDB.php");
require_once("DB/TeachersDB.php");
require_once("DB/Courses_teachersDB.php");
require_once("tables/Courses.php");
require_once("tables/Courses_teachers.php");
require_once("tables/Teachers.php");
if (isset($_POST["add"])) {
    $topic = $_POST["topic"];
    $date = $_POST["date"];
    $f_name = $_POST["f_name"];
    $s_name = $_POST["s_name"];
    $post_id = $_POST["post_id"];
    $degree_id = $_POST["degree_id"];
    if (isset($_SESSION["faculty_id"]))
        $faculty_id = $_SESSION["faculty_id"];
    else
        $faculty_id = $_POST["faculty_id"];

    if (empty($topic) || empty($date) || empty($f_name) || empty($s_name)
        || empty($post_id) || empty($degree_id) || empty($faculty_id)
    ) {
        header("Location: AddTeacherPage.php");
    } else {
        $db = new TeachersDB();
        $bean = new  Teachers();
        $bean->setTopic($topic);
        $bean->setDate($date);
        $bean->setFirstName($f_name);
        $bean->setSecondName($s_name);
        $bean->setPostId($post_id);
        $bean->setDegreeId($degree_id);
        $bean->setFacultyId($faculty_id);
        $db->insert($bean);
        if (isset($_SESSION["course_id"])) { //If we went from FacultiesPage.php by "Courses" and then went from CoursesPage.php by "Teachers"
            $course_id = $_SESSION["course_id"];
            $c_tDB = new Courses_teachersDB();
            $c_t = new Courses_teachers();
            $c_t->setCourseId($course_id);
            $c_t->setTeacherId($db->getMaxId());
            $c_tDB->insert($c_t);
        }
        header("Location: TeachersPage.php");

    }
}
if (isset($_POST["back"])) {
    header("Location: TeachersPage.php");
}
?>