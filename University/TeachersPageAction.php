<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 01.11.2014
 * Time: 11:52
 */
session_start();
require_once("Connection.php");

if (isset($_POST['back'])) {
    $pathBack = $_SESSION["pathBack"];
    unset($_SESSION["pathBack"]);
    unset($_SESSION["course_id"]);
    header("Location: " . $pathBack);
}

if (isset($_POST["search"])) {
    if (isset($_POST["search_text"]))
        $_SESSION["search_text"] = $_POST["search_text"];
    header("Location: TeachersPage.php");
}

if(isset($_POST["add"])){
    unset($_SESSION["search_text"]);
    header("Location: AddTeacherPage.php");
}
$query = "SELECT * FROM teachers";
$rs = mysql_query($query);
while ($row = mysql_fetch_array($rs)) {
    if (isset($_POST["course" . $row["id"]])) {
        unset($_SESSION["search_text"]);
        $_SESSION["teacher_id"] = $row["id"];
        header("Location: CoursesPage.php");
    }
    if (isset($_POST["delete" . $row["id"]])) {
        unset($_SESSION["search_text"]);
        $query = "delete from teachers where id=" . $row["id"];
        mysql_query($query);
        header("Location: TeachersPage.php");
    }
}
?>
