<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 30.10.2014
 * Time: 1:06
 */
require_once("Connection.php");
session_start();
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
        $query = "INSERT INTO teachers(`first_name`,`second_name`,`date`,`post_id`,`degree_id`,`topic`,`faculty_id`) VALUES('" . $f_name
            . "','" . $s_name . "','" . $date
            . "','" . $post_id . "','" . $degree_id . "','" . $topic . "','" . $faculty_id
            . "')";
        mysql_query($query);
        if (isset($_SESSION["course_id"])) { //If we went from FacultiesPage.php by "Courses" and then went from CoursesPage.php by "Teachers"
            $course_id = $_SESSION["course_id"];
            $query = "SELECT MAX(id) AS max_id FROM teachers";
            $rs = mysql_query($query);
            while ($row = mysql_fetch_array($rs))
                $max_id = $row["max_id"];
            $query2 = "INSERT INTO courses_teachers (`course_id`,`teacher_id`) VALUES('" . $course_id . "','" . $max_id . "')";
            mysql_query($query2);
        }
        header("Location: TeachersPage.php");

    }
}
if (isset($_POST["back"])) {
    header("Location: TeachersPage.php");
}
?>