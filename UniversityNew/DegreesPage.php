<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 06.11.2014
 * Time: 3:03
 */
session_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Degrees</title>
</head>
<body>
<?php
require_once("DB/DegreesDB.php");
$dgrDB = new DegreesDB();
if (isset($_SESSION["search_text"])) {
    $like_word = "'%" . $_SESSION["search_text"] . "%'";
    $query_likeNoWHERE = " AND name like " . $like_word;
} else
    $query_like = "";
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
        $i = 1;
        ?>
        <form action="DegreesPageAction.php" method="post">

            <table>
                <tr>
                    <td></td>
                    <td><input type="text" name="search_text" <?php
                        if (isset($_SESSION["search_text"])) echo "value = \"" . $_SESSION["search_text"] . "\"";
                        ?>></td>
                    <td><input type="submit" name="search" value="Search"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>№</td>
                    <td>Name degree</td>
                    <td>Delete</td>
                </tr>
                <?php
                $dgrDB->setLike($query_likeNoWHERE);
                $f_id = $_SESSION["faculty_id"];
                $rs = $dgrDB->getAllWhereFacultyId($f_id);
                $i = 1;
                while ($row = mysql_fetch_array($rs)) {
                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    $delete = "delete" . $row["id"];
                    echo("<td><input type=\"submit\" name = \"" . $delete . "\" value = \"Delete\"></td>");
                    echo "</tr>";
                    $i = $i + 1;
                }

                ?>
            </table>
            <br>
            <input type="submit" name="add" value="Add degree">
            <input type="submit" name="back" value="Back">
        </form>
    </div>

    <div id="footer">
        <?php include("footer.php"); ?>
    </div>
</body>
</html>
