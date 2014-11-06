<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 06.11.2014
 * Time: 3:28
 */
session_start();
require_once("DB/DegreesDB.php");
require_once("tables/Degrees.php");
if (isset($_POST["add"])) {
    $name = $_POST["name"];
    $faculty_id = $_SESSION["faculty_id"];

    if (empty($name)) {
        header("Location: AddDegreesPage.php");
    } else {
        $db = new DegreesDB();
        $bean = new Degrees();
        $bean->setName($name);
        $bean->setFacultyId($faculty_id);
        $db->insert($bean);
        header("Location: DegreesPage.php");


    }
}
if(isset($_POST["back"])){
    header("Location: DegreesPage.php");
}