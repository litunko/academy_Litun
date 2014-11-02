<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 01.11.2014
 * Time: 21:46
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
    <title>Add group</title>
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
        <form action="AddGroupPageAction.php" method="post">

            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Number students</td>
                    <td><input type="text" name="number"></td>
                </tr>
                <tr>
                    <td>First name leader</td>
                    <td><input type="text" name="leader1"></td>
                </tr>
                <tr>
                    <td>Second name leader</td>
                    <td><input type="text" name="leader2"></td>
                </tr>
            </table>
            <br>
            <input type="submit" name="add" value="Add group">
            <input type="submit" name="back" value="Back">
        </form>
    </div>

    <div id="footer">
        <?php include("footer.php"); ?>
    </div>
</body>
</html>

//всі Алл будуть якщо ід = -1 . створити на аддгроуп список курсів для ід = -1 і т.д.