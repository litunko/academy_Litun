<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Courses</title>
</head>
<body>
<?php
require_once("DB/CoursesDB.php");
$courseDB = new CoursesDB();
if (isset($_SESSION["search_text"])) {
    $like_word = "'%" . $_SESSION["search_text"] . "%'";
    $query_likeWHERE = " WHERE c.name like " . $like_word;
    $query_likeNoWHERE = " AND c.name like " . $like_word;
} else {
    $query_likeWHERE = "";
    $query_likeNoWHERE = "";
}
if (isset($_SESSION["faculty_id"])) {
    $faculty_id = $_SESSION["faculty_id"];
    $_SESSION["pathBack"] = "FacultiesPage.php";
    if (isset($_SESSION["teacher_id"])) {
        $teacher_id = $_SESSION["teacher_id"];
        $_SESSION["pathBack"] = "TeachersPage.php";
    }
} else
    if (isset($_SESSION["group_id"])) {
        $group_id = $_SESSION["group_id"];
        $_SESSION["pathBack"] = "GroupsPage.php";
    } else
        $id = -1;
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
        <form action="CoursesPageAction.php" method="post">
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
                    <td>Name course</td>
                    <td>Semester</td>
                    <td>Final control</td>
                    <td>Faculty</td>
                    <?php if ($id != -1)
                        if (!isset($_SESSION["group_id"]))
                            if (!isset($_SESSION["teacher_id"])) {
                                ?>
                                <td>Teachers</td>
                            <?php } ?>
                    <?php
                    if ($id != -1)
                        if (!isset($_SESSION["group_id"]))
                            if (!isset($_SESSION["teacher_id"])) {
                                ?>
                                <td>Groups</td>
                            <?php
                            }
                    ?>
                    <td>Delete</td>
                </tr>
                <?php
                if ($id == -1) {
                    $courseDB->setLike($query_likeWHERE);
                    $rs = $courseDB->getAll();
                } else {
                    $courseDB->setLike($query_likeNoWHERE);
                    if (isset($_SESSION["faculty_id"])) {
                        $rs = $courseDB->getAllFromFaculties($_SESSION["faculty_id"]);
                        if (isset($_SESSION["teacher_id"]))
                            $rs = $courseDB->getAllFromTeachers($_SESSION["faculty_id"], $_SESSION["teacher_id"]);
                    }

                }
                if (isset($_SESSION["group_id"])) {
                    $courseDB->setLike($query_likeNoWHERE);
                    $rs = $courseDB->getAllFromGroups($_SESSION["group_id"]);
                }
                $i = 1;
                while ($row = mysql_fetch_array($rs)) {
                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . $row["name_course"] . "</td>";
                    echo "<td>" . $row["semester"] . "</td>";
                    echo "<td>" . $row["final_control"] . "</td>";
                    echo "<td>" . $row["name_faculty"] . "</td>";
                    $course = "course" . $row["id"];
                    $group = "group" . $row["id"];
                    $delete = "delete" . $row["id"];
                    if ($id != -1)
                        if (!isset($_SESSION["group_id"]))
                            if (!isset($_SESSION["teacher_id"]))
                                echo("<td><input type=\"submit\" name = \"" . $course . "\"  value = \"Teachers\"></td>");
                    if ($id != -1)
                        if (!isset($_SESSION["group_id"]))
                            if (!isset($_SESSION["teacher_id"]))
                                echo("<td><input type=\"submit\" name = \"" . $group . "\"  value = \"Groups\"></td>");
                    echo("<td><input type=\"submit\" name = \"" . $delete . "\"  value = \"Delete\"></td>");
                    echo "</tr>";
                    $i = $i + 1;
                }
                ?>
            </table>
            <br>
            <input type="submit" name="add" value="Add course">
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

