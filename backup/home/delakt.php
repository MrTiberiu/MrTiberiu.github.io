<?php
session_start();// <!-- Starts a session so the page wont be accesible without login -->

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { // <!-- Checks if the ID and UserName maches before it shows somthing -->
    $id = $_GET['id']; // <!-- $id gets the id for aktiv_id from aktusr -->
    
    include_once '../db/db_conn.php'; // <!-- Includes the code to acess the database -->


    $sql = "DELETE FROM `aktusr` WHERE aktiv_id = '$id'"; // <!-- SQL query that delete the row where aktiv_id = $id  -->

    if (mysqli_query($conn, $sql)) {
        header("Location: ../home/home.php"); // <!-- If success then redirect to home page  -->
    } else { // <!-- If fails then print error message  -->
        echo "Error: " . $sql . " 
" . mysqli_error($conn);
    }
    mysqli_close($conn); // <!-- Closes the connection with the database  -->

} else {

    header("Location: ./index.php"); // <!-- If ID and Username don´t mach it will send you back to the index/login page -->

    exit();

}

?>
