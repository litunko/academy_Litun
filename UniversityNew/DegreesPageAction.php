<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 06.11.2014
 * Time: 3:09
 */
session_start();
require_once("DB/DegreesDB.php");
$dgrDB = new DegreesDB();
if (isset($_POST["search"])) {
    if (isset($_POST["search_text"]))
        $_SESSION["search_text"] = $_POST["search_text"];
    header("Location: DegreesPage.php");
}
if (isset($_POST["back"])) {
    unset($_SESSION["search_text"]);
    unset($_SESSION["pathBack"]);
    unset($_SESSION["faculty_id"]);
    header("Location: FacultiesPage.php");
}
if (isset($_POST["add"])) {
    unset($_SESSION["search_text"]);
    header("Location: AddDegreesPage.php");
}


$rs = $dgrDB->getAll();
while ($row = mysql_fetch_array($rs)) {
    if (isset($_POST["delete" . $row["id"]])) {
        unset($_SESSION["search_text"]);
        $dgrDB->delete($row["id"]);
        header("Location: DegreesPage.php");
    }
}