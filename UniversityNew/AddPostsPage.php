<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 06.11.2014
 * Time: 4:00
 */
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Add degree</title>
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
        <form action="AddPostsPageAction.php" method="post">
            New post <br>
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name"></td>
                </tr>

            </table>
            <br>
            <input type="submit" name="add" value="Add post">
            <input type="submit" name="back" value="Back">
        </form>
    </div>

    <div id="footer">
        <?php include("footer.php"); ?>
    </div>
</body>
</html>