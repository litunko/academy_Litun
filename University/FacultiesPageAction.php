<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 29.10.2014
 * Time: 14:37
 */
session_start();
require_once("Connection.php");
if (isset($_POST["search"])) {
    if (isset($_POST["search_text"]))
        $_SESSION["search_text"] = $_POST["search_text"];
        header("Location: FacultiesPage.php");
}
if (isset($_POST["add"])) {
    unset($_SESSION["search_text"]);
    header("Location: AddFacultiesPage.php");
}
$query = "SELECT * FROM faculties";
$rs = mysql_query($query);
while ($row = mysql_fetch_array($rs)) {
    if (isset($_POST["teacher" . $row["id"]])) {
        unset($_SESSION["search_text"]);
        $_SESSION["faculty_id"] = $row["id"];
        header("Location: TeachersPage.php");
    }
    if (isset($_POST["course" . $row["id"]])) {
        unset($_SESSION["search_text"]);
        $_SESSION["faculty_id"] = $row["id"];
        header("Location: CoursesPage.php");
    }
    if (isset($_POST["delete" . $row["id"]])) {
        unset($_SESSION["search_text"]);
        $query = "delete from faculties where id=" . $row["id"];
        mysql_query($query);
        header("Location: FacultiesPage.php");
    }
}
?>