<?php
/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 28.10.2014
 * Time: 20:09
 */
$username = 'root';
$password = '';
$database = 'university';
$conn = mysql_connect(localhost,$username, $password)or die("Unable to create connection.");;
mysql_select_db($database, $conn) or die("Unable to select db.");
?>