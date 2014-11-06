<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 30.10.2014
 * Time: 1:06
 */
require_once("DB/FacultiesDB.php");
require_once("DB/DegreesDB.php");
require_once("DB/PostsDB.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Add teacher</title>
</head>
<body>

<div id="container">

    <div id="header">
        <?php include("header.php"); ?>
    </div>

    <div id="menu">
        <?php include("menu.php"); ?>
    </div>

    <div id="content">
        <form action="AddTeacherPageAction.php" method="post">

            <table>
                <tr>
                    <td>First name</td>
                    <td><input type="text" name="f_name"></td>
                </tr>
                <tr>
                    <td>Second name</td>
                    <td><input type="text" name="s_name"></td>
                </tr>
                <tr>
                    <td>Date birthday</td>
                    <td><input type="date" name="date"></td>
                </tr>
                <?php
                if (!isset($_SESSION["faculty_id"])) {
                    ?>
                    <tr>
                        <td>Faculty</td>
                        <td>
                            <select name="faculty_id">
                                <?php
                                $db = new FacultiesDB();
                                $db->getAll();
                                while ($row = mysql_fetch_array($rs)) {
                                    echo("<option value = \"" . $row["id"] . "\">" . $row["name"] . "</option>");
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td>Post</td>
                    <td>
                        <select name="post_id">
                            <?php
                            $db = new PostsDB();
                            $db->getAll();
                            while ($row = mysql_fetch_array($rs)) {
                                echo("<option value = \"" . $row["id"] . "\">" . $row["name"] . "</option>");
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Degree</td>
                    <td>
                        <select name="degree_id">
                            <?php
                            $db = new DegreesDB();
                            $db->getAll();
                            while ($row = mysql_fetch_array($rs)) {
                                echo("<option value = \"" . $row["id"] . "\">" . $row["name"] . "</option>");
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Research topic</td>
                    <td><input type="input" name="topic"></td>
                </tr>
            </table>
            <br>
            <input type="submit" name="add" value="Add teacher">
            <input type="submit" name="back" value="Back">
        </form>
    </div>

    <div id="footer">
        <?php include("footer.php"); ?>
    </div>
</body>
</html>