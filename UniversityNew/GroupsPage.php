<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 01.11.2014
 * Time: 14:42
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Groups</title>
</head>
<body>
<?php
require_once("DB/GroupsDB.php");
$grpDB = new GroupsDB();
if (isset($_SESSION["search_text"])) {
    $like_word = "'%" . $_SESSION["search_text"] . "%'";
    $query_likeWHERE = " WHERE name like " . $like_word;
    $query_likeNoWHERE = " AND g.name like " . $like_word;
} else {
    $query_likeWHERE = "";
    $query_likeNoWHERE = "";
}

if (isset($_SESSION["course_id"])) {
    $course_id = $_SESSION["course_id"];
    $_SESSION["pathBack"] = "CoursesPage.php";
} else $id = -1;
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
        <form action="GroupsPageAction.php" method="post">

            <table>
                <tr>
                    <td></td>
                    <td><input type="text" name="search_text" <?php
                        if (isset($_SESSION["search_text"])) echo "value = \"" . $_SESSION["search_text"] . "\"";
                        ?>></td>
                    <td><input type="submit" name="search" value="Search"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>№</td>
                    <td>Name</td>
                    <td>Number students</td>
                    <td>Group leader</td>
                    <td>Courses</td>
                    <td>Delete</td>
                </tr>
                <?php
                if (isset($_SESSION["course_id"])) {
                    $grpDB->setLike($query_likeNoWHERE);
                    $rs = $grpDB->getAllFromCourse($_SESSION["course_id"]);
                } else {
                    $grpDB->setLike($query_likeWHERE);
                    $rs = $grpDB->getAll();
                }
                $i = 1;
                while ($row = mysql_fetch_array($rs)) {
                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["number_students"] . "</td>";
                    echo "<td>" . $row["name_leader"] . "</td>";
                    $teacher = "course" . $row["id"];
                    $delete = "delete" . $row["id"];
                    echo("<td><input type=\"submit\" name = \"" . $teacher . "\"  value = \"Courses\"></td>");
                    echo("<td><input type=\"submit\" name = \"" . $delete . "\"  value = \"Delete\"></td>");
                    echo "</tr>";
                    $i = $i + 1;
                }
                ?>
            </table>
            <br>
            <input type="submit" name="add" value="Add group">
            <?php
            if ($id != -1) {
                ?>
                <input type="submit" name="back" value="Back">
            <?php
            }
            ?>
        </form>
    </div>
    <div id="footer">
        <?php include("footer.php"); ?>
    </div>
</body>
</html>
