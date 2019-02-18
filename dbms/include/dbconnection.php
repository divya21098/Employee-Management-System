<?php
$dbms="mysql";
$dbhost="localhost";
$dbname="payroll";
$dbuser="root";
$dbpasswd="";

//Establish connection
$link=mysqli_connect($dbhost, $dbuser, $dbpasswd)
or die (mysqli_error());

$status = mysqli_select_db($link,$dbname) or die (mysql_error());

//echo "Connected Successfully to ". $dbname.'<br>';
?>
