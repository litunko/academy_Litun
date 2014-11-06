<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 29.10.2014
 * Time: 14:37
 */
session_start();
require_once("DB/FacultiesDB.php");
$fclDB = new FacultiesDB();
if (isset($_POST["search"])) {
    if (isset($_POST["search_text"]))
        $_SESSION["search_text"] = $_POST["search_text"];
    header("Location: FacultiesPage.php");
}
if (isset($_POST["add"])) {
    unset($_SESSION["search_text"]);
    header("Location: AddFacultiesPage.php");
}


$rs = $fclDB->getAll();
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
    if (isset($_POST["post" . $row["id"]])) {
        unset($_SESSION["search_text"]);
        $_SESSION["faculty_id"] = $row["id"];
        header("Location: PostsPage.php");
    }
    if (isset($_POST["degree" . $row["id"]])) {
        unset($_SESSION["search_text"]);
        $_SESSION["faculty_id"] = $row["id"];
        header("Location: DegreesPage.php");
    }
    if (isset($_POST["delete" . $row["id"]])) {
        unset($_SESSION["search_text"]);
        $fclDB->delete($row["id"]);
        header("Location: FacultiesPage.php");
    }
}
?>