<?php
require_once("Connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Add faculty</title>
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
        <form action="AddFacultiesPageAction.php" method="post">

            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Adress</td>
                    <td><input type="text" name="adress"></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td><input type="date" name="date"></td>
                </tr>
                <tr>
                    <td>Dean</td>
                    <td>
                        <select name="teacher_id">
                            <?php
                            $query = "SELECT * from teachers";
                            $rs = mysql_query($query);
                            while ($row = mysql_fetch_array($rs)) {
                                echo("<option value = \"" . $row["id"] . "\">" . $row["second_name"] ." ". $row["first_name"] . "</option>");
                            }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
            <br>
            <input type="submit" name="add" value="Add faculty">
            <input type="submit" name="back" value="Back">
        </form>
    </div>

    <div id="footer">
        <?php include("footer.php"); ?>
    </div>
</body>
</html>
