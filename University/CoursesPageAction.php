<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 29.10.2014
 * Time: 19:14
 */
session_start();
require_once("Connection.php");

if (isset($_POST['back'])) {
    $pathBack = $_SESSION["pathBack"];
    unset($_SESSION["pathBack"]);
    header("Location: " . $pathBack);
}

if (isset($_POST["search"])) {
    if (isset($_POST["search_text"]))
        $_SESSION["search_text"] = $_POST["search_text"];
    header("Location: CoursesPage.php");
}

    if (isset($_POST["add"])) {
        unset($_SESSION["search_text"]);
        header("Location: AddCoursePage.php");
    }
    $query = "SELECT * FROM courses";
    $rs = mysql_query($query);
    while ($row = mysql_fetch_array($rs)) {
        if (isset($_POST["course" . $row["id"]])) {
            unset($_SESSION["search_text"]);
            $_SESSION["course_id"] = $row["id"];
            header("Location: TeachersPage.php");
        }
        if (isset($_POST["delete" . $row["id"]])) {
            unset($_SESSION["search_text"]);
            $query = "delete from courses where id=" . $row["id"];
            mysql_query($query);
            header("Location: CoursesPage.php");
        }
        if (isset($_POST["group" . $row["id"]])) {
            unset($_SESSION["search_text"]);
            $_SESSION["course_id"] = $row["id"];
            header("Location: GroupsPage.php");
        }
    }
    ?>