<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 01.11.2014
 * Time: 21:46
 */
session_start();

require_once("DB/CoursesDB.php");
require_once("DB/GroupsDB.php");
require_once("DB/Groups_coursesDB.php");
require_once("tables/Courses.php");
require_once("tables/Groups_courses.php");
require_once("tables/Groups.php");
if (isset($_POST["add"])) {
    $name = $_POST["name"];
    $number = $_POST["number"];
    $leader1 = $_POST["leader1"];
    $leader2 = $_POST["leader2"];
    if (isset($_SESSION["course_id"]))
        $course_id = $_SESSION["course_id"];

    if (empty($name) || empty($number) || empty($leader1) || empty($leader2) || empty($course_id)) {
        header("Location: AddGroupPage.php");
    } else {
        $db = new GroupsDB();
        $bean = new Groups();
        $bean->setName($name);
        $bean->setNameLeader($leader1 . $leader2);
        $bean->setNumberStudents($number);
        $db->insert($bean);
        if (isset($_SESSION["course_id"])) { //If we went from FacultiesPage.php by "Teachers" and then went from TeachersPage.php by "Courses"
            $course_id = $_SESSION["course_id"];
            $g_c = new Groups_courses();
            $g_cDB = new Groups_coursesDB();
            $g_c->setGroupId($db->getMaxId());
            $g_cDB->insert($g_c);
        }
        header("Location: GroupsPage.php");

    }
}
if (isset($_POST["back"])) {
    header("Location: GroupsPage.php");
}
?>