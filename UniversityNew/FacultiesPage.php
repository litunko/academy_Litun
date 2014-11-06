<?php
session_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Faculties</title>
</head>
<body>
<?php
require_once("DB/FacultiesDB.php");
$facDB = new FacultiesDB();
unset($_SESSION["faculty_id"]);
unset($_SESSION["course_id"]);
unset($_SESSION["teacher_id"]);
if (isset($_SESSION["search_text"])) {
    $like_word = "'%" . $_SESSION["search_text"] . "%'";
    $query_like = " WHERE name like " . $like_word;
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
        <form action="FacultiesPageAction.php" method="post">

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
                    <td>Name faculty</td>
                    <td>Courses</td>
                    <td>Teachers</td>
                    <td>Posts</td>
                    <td>Degrees</td>
                    <td>Delete</td>
                </tr>
                <?php
                $facDB->setLike($query_like);
                $rs = $facDB->getAll();
                $i = 1;
                while ($row = mysql_fetch_array($rs)) {
                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    $course = "course" . $row["id"];
                    $teacher = "teacher" . $row["id"];
                    $delete = "delete" . $row["id"];
                    $post = "post".$row["id"];
                    $degree = "degree".$row["id"];
                    echo("<td><input type=\"submit\" name = \"" . $course . "\" value = \"Courses\"></td>");
                    echo("<td><input type=\"submit\" name = \"" . $teacher . "\"  value = \"Teachers\"></td>");
                    echo("<td><input type=\"submit\" name = \"" . $post . "\"  value = \"Posts\"></td>");
                    echo("<td><input type=\"submit\" name = \"" . $degree . "\"  value = \"Degrees\"></td>");
                    echo("<td><input type=\"submit\" name = \"" . $delete . "\"  value = \"Delete\"></td>");
                    echo "</tr>";
                    $i = $i + 1;
                }

                ?>
            </table>
            <br>
            <input type="submit" name="add" value="Add faculty">
        </form>
    </div>

    <div id="footer">
        <?php include("footer.php"); ?>
    </div>
</body>
</html>
