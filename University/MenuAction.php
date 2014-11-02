<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 01.11.2014
 * Time: 9:27
 */
session_start();
unset($_SESSION["faculty_id"]);
unset($_SESSION["course_id"]);
unset($_SESSION["teacher_id"]);
unset($_SESSION["group_id"]);
unset($_SESSION["pathBack"]);
unset($_SESSION["search_text"]);
if (isset($_POST["faculties"])) {
    header("Location: FacultiesPage.php");
}
if (isset($_POST["courses"])) {
    header("Location: CoursesPage.php");
}
if (isset($_POST["teachers"])) {
    header("Location: TeachersPage.php");
}
if (isset($_POST["groups"])) {
    header("Location: GroupsPage.php");
}
?>
