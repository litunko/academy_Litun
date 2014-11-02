<?php
/**
* Created by PhpStorm.
* User: Litun
* Date: 29.10.2014
* Time: 20:01
*/
require_once("Connection.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Add course</title>
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
        <form action="AddCoursePageAction.php" method="post">

            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td><input type="text" name="semester"></td>
                </tr>
                <tr>
                    <td>Final control</td>
                    <td>
                        <select name="final_control">
                            <option value="exam">examination</option>
                            <option value="test">test</option>
                        </select></td>
                </tr>
                <?php
                if (!isset($_SESSION["faculty_id"])) {
                    ?>
                    <tr>
                        <td>Faculty</td>
                        <td>
                            <select name="faculty_id">
                                <?php
                                $query = "SELECT * FROM faculties";
                                $rs = mysql_query($query);
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
            </table>
            <br>
            <input type="submit" name="add" value="Add course">
            <input type="submit" name="back" value="Back">
        </form>
    </div>

    <div id="footer">
        <?php include("footer.php"); ?>
    </div>
</body>
</html>
