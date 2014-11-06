<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 01.11.2014
 * Time: 11:52
 */
session_start();
require_once("DB/TeachersDB.php");

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
$tchDB = new TeachersDB();
$tchDB->getAllFromTeachers();

while ($row = mysql_fetch_array($rs)) {
    if (isset($_POST["course" . $row["id"]])) {
        unset($_SESSION["search_text"]);
        $_SESSION["teacher_id"] = $row["id"];
        header("Location: CoursesPage.php");
    }
    if (isset($_POST["delete" . $row["id"]])) {
        unset($_SESSION["search_text"]);
        $tchDB->delete($row["id"]);
        header("Location: TeachersPage.php");
    }
}
?>
