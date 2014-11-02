<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 01.11.2014
 * Time: 14:50
 */
session_start();
require_once("Connection.php");
if (isset($_POST["back"])) {
    $pathBack = $_SESSION["pathBack"];
    unset($_SESSION["pathBack"]);
    unset($_SESSION["course_id"]);
    header("Location: " . $pathBack);
}

if (isset($_POST["search"])) {
    if (isset($_POST["search_text"]))
        $_SESSION["search_text"] = $_POST["search_text"];
    header("Location: GroupsPage.php");
}
if(isset($_POST["add"])){
    unset($_SESSION["search_text"]);
    header("Location: AddGroupPage.php");
}
$query = "SELECT * FROM groups";
$rs = mysql_query($query);
while ($row = mysql_fetch_array($rs)) {
    if (isset($_POST["course" . $row["id"]])) {
        unset($_SESSION["search_text"]);
        session_start();
        $_SESSION["group_id"] = $row["id"];
        header("Location: CoursesPage.php");
    }
    if (isset($_POST["delete" . $row["id"]])) {
        unset($_SESSION["search_text"]);
        $query = "delete from groups where id=" . $row["id"];
        mysql_query($query);
        header("Location: GroupsPage.php");
    }
}
?>