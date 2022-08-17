<?php


session_start(); // Initialize session data

session_unset(); // Free all session variables

session_destroy(); // Destroys all data registered to a session

header("Location: ../index.php"); // Sends you back to log in page

?>