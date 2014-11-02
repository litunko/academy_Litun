<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; utf-8"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Університет</title>
</head>
<body>
<?php
require_once("Connection.php");
?>
<div id="container">

    <div id="header">
        <?php include("header.php"); ?>
    </div>

    <div id="menu">
        <?php include("menu.php"); ?>
    </div>

    <div id="content">
        <?php
        $query = "SELECT * FROM faculties;";
        $rs = mysql_query($query);
        $i = 1;
        while ($row = mysql_fetch_array($rs)) {
            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo("<td><input type=\"submit\" name = \"courses\" value = \"Курси\"></td>");
            echo("<td><input type=\"submit\" name = \"teachers\"  value = \"Викладачі\"></td>");
            echo "</tr>";
        }
        ?>
    </div>

    <div id="footer">
        <?php include("footer.php"); ?>
    </div>
</body>
</html>