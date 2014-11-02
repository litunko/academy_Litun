<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 29.10.2014
 * Time: 17:45
 */
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Teachers</title>
</head>
<body>
<?php
require_once("Connection.php");
if (isset($_SESSION["search_text"])) {
    $like_word = "'%" . $_SESSION["search_text"] . "%'";
    $query_likeWHERE = " WHERE (t.first_name like " . $like_word ." OR t.second_name like ".$like_word . ")";
    $query_likeNoWHERE = " AND (t.first_name like " . $like_word ." OR t.second_name like ".$like_word . ")";
} else {
    $query_likeWHERE = "";
    $query_likeNoWHERE = "";
}

if (isset($_SESSION["faculty_id"])) {
    $faculty_id = $_SESSION["faculty_id"];
    if (isset($_SESSION["course_id"])) {
        $course_id = $_SESSION["course_id"];
        $_SESSION["pathBack"] = "CoursesPage.php";
        $query = "SELECT t.id, t.first_name, t.second_name, t.date, t.topic,
                            p.name AS name_post, d.name AS name_degree, f.name AS name_faculty
                            FROM teachers As t
                            INNER JOIN posts As p ON t.post_id = p.id
                            INNER JOIN degrees AS d ON t.degree_id = d.id
                            INNER JOIN faculties As f ON t.faculty_id = f.id
                            INNER JOIN courses_teachers AS c_t ON t.id = c_t.teacher_id
                            INNER JOIN courses As c ON c_t.course_id = c.id
                            WHERE c.id=" . $course_id . " AND f.id =" . $faculty_id .$query_likeNoWHERE;
    } else {
        $id = $_SESSION["faculty_id"];
        $_SESSION["pathBack"] = "FacultiesPage.php";
        $query = "SELECT t.id, t.first_name, t.second_name, t.date, t.topic,
                        p.name AS name_post, d.name AS name_degree, f.name AS name_faculty
                        FROM teachers As t
                        INNER JOIN posts As p ON t.post_id = p.id
                        INNER JOIN faculties As f ON t.faculty_id = f.id
                        INNER JOIN degrees AS d ON t.degree_id = d.id
                        WHERE t.faculty_id = " . $faculty_id . $query_likeNoWHERE;
    }
} else {
    $query = "SELECT t.id, t.first_name, t.second_name, t.date, t.topic,
                        p.name AS name_post, d.name AS name_degree, f.name AS name_faculty
                        FROM teachers As t
                        INNER JOIN posts As p ON t.post_id = p.id
                        INNER JOIN faculties As f ON t.faculty_id = f.id
                        INNER JOIN degrees AS d ON t.degree_id = d.id".$query_likeWHERE;
    $id = -1;
}
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
        <form action="TeachersPageAction.php" method="post">

            <table>
                <tr>
                    <td></td>
                    <td><input type="text" name="search_text" <?php
                        if (isset($_SESSION["search_text"])) echo "value = \"".$_SESSION["search_text"]. "\"";
                        ?>></td>
                    <td><input type="submit" name="search" value="Search"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>№</td>
                    <td>Second name</td>
                    <td>First name</td>
                    <td>Date</td>
                    <td>Faculty</td>
                    <td>Post</td>
                    <td>Degree</td>
                    <td>Topic</td>
                    <?php
                    if ($id != -1)
                        if (!isset($_SESSION["course_id"])) {
                            ?>
                            <td>Courses</td>
                        <?php } ?>
                    <td>Delete</td>
                </tr>
                <?php
                $rs = mysql_query($query);
                $i = 1;
                while ($row = mysql_fetch_array($rs)) {
                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . $row["second_name"] . "</td>";
                    echo "<td>" . $row["first_name"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["name_faculty"] . "</td>";
                    echo "<td>" . $row["name_post"] . "</td>";
                    echo "<td>" . $row["name_degree"] . "</td>";
                    echo "<td>" . $row["topic"] . "</td>";
                    $teacher = "course" . $row["id"];
                    $delete = "delete" . $row["id"];
                    if ($id != -1)
                        if (!isset($_SESSION["course_id"]))
                            echo("<td><input type=\"submit\" name = \"" . $teacher . "\"  value = \"Courses\"></td>");
                    echo("<td><input type=\"submit\" name = \"" . $delete . "\"  value = \"Delete\"></td>");
                    echo "</tr>";
                    $i = $i + 1;
                }
                ?>
            </table>
            <br>
            <input type="submit" name="add" value="Add teacher">
            <?php
            if ($id != -1) {
                ?>
                <input type="submit" name="back" value="Back">
            <?php } ?>
        </form>
    </div>
    <div id="footer">
        <?php include("footer.php"); ?>
    </div>
</body>
</html>

