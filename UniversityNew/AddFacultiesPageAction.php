<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 29.10.2014
 * Time: 15:59
 */
require_once("DB/FacultiesDB.php");
require_once("tables/Faculties.php");
if (isset($_POST["add"])) {
    $name = $_POST["name"];
    $date = $_POST["date"];
    $adress = $_POST["adress"];
    $teacher_id = $_POST["teacher_id"];
    if (empty($name) || empty($date) || empty($adress) || empty($teacher_id)) {
        header("Location: AddFacultiesPage.php");
    } else {
        $db = new FacultiesDB();
        $bean = new Faculties();
        $bean->setAdress($adress);
        $bean->setName($name);
        $bean->getTeacherId($teacher_id);
        $bean->setYear($date);
        $db->insert($bean);
        header("Location: FacultiesPage.php");

    }
}
if(isset($_POST["back"])){
    header("Location: FacultiesPage.php");
}
?>