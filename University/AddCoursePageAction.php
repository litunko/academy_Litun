<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 29.10.2014
 * Time: 22:28
 */
require_once("Connection.php");
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
        $query = "INSERT INTO courses(`name`,`semester`,`final_control`,`faculty_id`) VALUES('" . $name
            . "','" . $semester . "','" . $final_control
            . "','" . $faculty_id
            . "')";
        mysql_query($query);
        if (isset($_SESSION["teacher_id"])) { //If we went from FacultiesPage.php by "Teachers" and then went from TeachersPage.php by "Courses"
            $teacher_id = $_SESSION["teacher_id"];
            $query = "SELECT MAX(id) AS max_id FROM courses";
            $rs = mysql_query($query);
            while ($row = mysql_fetch_array($rs))
                $max_id = $row["max_id"];
            $query2 = "INSERT INTO courses_teachers (`course_id`,`teacher_id`) VALUES('" . $max_id . "','" . $teacher_id . "')";
            mysql_query($query2);
        }
        if(isset($_SESSION["group_id"])){
            $group_id = $_SESSION["group_id"];
            $query = "SELECT MAX(id) AS max_id FROM courses";
            $rs = mysql_query($query);
            while ($row = mysql_fetch_array($rs))
                $max_id = $row["max_id"];
            $query2 = "INSERT INTO groups_courses (`course_id`,`group_id`) VALUES('" . $max_id . "','" . $group_id . "')";
            mysql_query($query2);
        }
        header("Location: CoursesPage.php");

    }
}
if (isset($_POST["back"])) {
    header("Location: CoursesPage.php");
}
?>