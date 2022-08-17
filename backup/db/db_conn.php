<?php

$sname= "localhost"; // servername

$unmae= "root"; // username

$password = ""; // password

$db_name = "prosjekt"; //database name 

$conn = mysqli_connect($sname, $unmae, $password, $db_name); // Opens a new connection to the MySQL server

if (!$conn) { //iff connection failed, echo error message

    echo "Connection failed!";

}
?>