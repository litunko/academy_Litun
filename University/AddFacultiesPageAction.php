<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 29.10.2014
 * Time: 15:59
 */
require_once("Connection.php");
if (isset($_POST["add"])) {
    $name = $_POST["name"];
    $date = $_POST["date"];
    $adress = $_POST["adress"];
    $teacher_id = $_POST["teacher_id"];
    if (empty($name) || empty($date) || empty($adress) || empty($teacher_id)) {
        header("Location: AddFacultiesPage.php");
    } else {
        $query = "INSERT INTO faculties(`name`,`adress`,`year`,`teacher_id`) VALUES('" . $name
            . "','" . $adress . "','" . $date
            . "','" . $teacher_id
            . "')";
        mysql_query($query);
        header("Location: FacultiesPage.php");

    }
}
if(isset($_POST["back"])){
    header("Location: FacultiesPage.php");
}
?>