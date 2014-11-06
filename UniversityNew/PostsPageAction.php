<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 06.11.2014
 * Time: 3:57
 */
session_start();
require_once("DB/PostsDB.php");
$pstDB = new PostsDB();
if (isset($_POST["search"])) {
    if (isset($_POST["search_text"]))
        $_SESSION["search_text"] = $_POST["search_text"];
    header("Location: PostsPage.php");
}
if (isset($_POST["back"])) {
    unset($_SESSION["search_text"]);
    unset($_SESSION["pathBack"]);
    unset($_SESSION["faculty_id"]);
    header("Location: FacultiesPage.php");
}
if (isset($_POST["add"])) {
    unset($_SESSION["search_text"]);
    header("Location: AddPostsPage.php");
}


$rs = $pstDB->getAll();
while ($row = mysql_fetch_array($rs)) {
    if (isset($_POST["delete" . $row["id"]])) {
        unset($_SESSION["search_text"]);
        $pstDB->delete($row["id"]);
        header("Location: DPostsPage.php");
    }
}