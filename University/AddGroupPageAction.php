<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 01.11.2014
 * Time: 21:46
 */
require_once("Connection.php");
session_start();
if (isset($_POST["add"])) {
    $name = $_POST["name"];
    $number = $_POST["number"];
    $leader1 = $_POST["leader1"];
    $leader2 = $_POST["leader2"];
    if (isset($_SESSION["course_id"]))
        $course_id = $_SESSION["course_id"];

    if (empty($name) || empty($number) || empty($leader1) || empty($leader2) || empty($course_id)) {
        header("Location: AddGroupPage.php");
    } else {
        $query = "INSERT INTO groups(`name`,`number_students`,`name_leader`) VALUES('" . $name
            . "','" . $number . "','" . $leader1 . " " . $leader2
            . "')";
        mysql_query($query);
        if (isset($_SESSION["course_id"])) { //If we went from FacultiesPage.php by "Teachers" and then went from TeachersPage.php by "Courses"
            $teacher_id = $_SESSION["course_id"];
            $query = "SELECT MAX(id) AS max_id FROM groups";
            $rs = mysql_query($query);
            while ($row = mysql_fetch_array($rs))
                $max_id = $row["max_id"];
            $query2 = "INSERT INTO groups_courses (`group_id`,`course_id`) VALUES('" . $max_id . "','" . $teacher_id . "')";
            mysql_query($query2);
        }
        header("Location: GroupsPage.php");

    }
}
if (isset($_POST["back"])) {
    header("Location: GroupsPage.php");
}
?>