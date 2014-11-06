<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 29.10.2014
 * Time: 22:28
 */
require_once("DB/CoursesDB.php");
require_once("DB/GroupsDB.php");
require_once("DB/Courses_teachersDB.php");
require_once("DB/Groups_coursesDB.php");
require_once("tables/Courses.php");
require_once("tables/Courses_teachers.php");
require_once("tables/Groups_courses.php");
require_once("tables/Groups.php");
session_start();
if (isset($_POST["add"])) {
    $name = $_POST["name"];
    $semester = $_POST["semester"];
    $final_control = $_POST["final_control"];
    if (isset($_SESSION["faculty_id"]))
        $faculty_id = $_SESSION["faculty_id"];
    else
        $faculty_id = $_POST["faculty_id"];
    if (empty($name) || empty($semester) || empty($final_control) || empty($faculty_id)) {
        header("Location: AddCoursePage.php");
    } else {
        $db = new CoursesDB();
        $bean = new Courses();
        $bean->setName($name);
        $bean->setFacultyId($faculty_id);
        $bean->setFinalControl($final_control);
        $bean->setSemester($semester);
        $db->insert($bean);
        if (isset($_SESSION["teacher_id"])) { //If we went from FacultiesPage.php by "Teachers" and then went from TeachersPage.php by "Courses"
            $teacher_id = $_SESSION["teacher_id"];
            $c_tDB = new Courses_teachersDB();
            $c_t = new Courses_teachers();
            $c_t->setCourseId($db->getMaxId());
            $c_t->setTeacherId($teacher_id);
            $c_tDB->insert($c_t);
        }
        if (isset($_SESSION["group_id"])) {
            $group_id = $_SESSION["group_id"];
            $grpDB = new GroupDB();
            $g_c = new Groups_courses();
            $g_c->setCourseId($grpDB->getMaxId());
            $g_c->setGroupId($group_id);
            $g_cDB = new Groups_coursesDB();
            $g_cDB->insert($g_c);
        }
        header("Location: CoursesPage.php");

    }
}
if (isset($_POST["back"])) {
    header("Location: CoursesPage.php");
}
?>