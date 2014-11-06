<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 06.11.2014
 * Time: 4:00
 */
session_start();
require_once("DB/PostsDB.php");
require_once("tables/Posts.php");
if (isset($_POST["add"])) {
    $name = $_POST["name"];
    $faculty_id = $_SESSION["faculty_id"];

    if (empty($name)) {
        header("Location: AddPostsPage.php");
    } else {
        $db = new PostsDB();
        $bean = new Posts();
        $bean->setName($name);
        $bean->setFacultyId($faculty_id);
        $db->insert($bean);
        header("Location: PostsPage.php");


    }
}
if (isset($_POST["back"])) {
    header("Location: PostsPage.php");
}