<?php
include_once '../db/db_conn.php'; // <!-- Includes the code to acess the database -->
if (isset($_POST['submit'])) { // <!-- If post is submited then... -->
    $aktivitet = $_POST['aktivitet']; // <!-- Gets the value from the input -->
    $mansvarlig = $_POST['mansvarlig']; // <!-- Gets the value from the input -->
    $dato = $_POST['dato']; // <!-- Gets the value from the input -->
    $beskrivelse = $_POST['beskrivelse']; // <!-- Gets the value from the input -->


    $sql = "INSERT INTO `aktiviteter` (aktivitet, mansvarlig, dato, beskrivelse) 
    VALUES ('$aktivitet','$mansvarlig','$dato','$beskrivelse')"; // <!-- SQL query to insert into table -->


    if (mysqli_query($conn, $sql)) {
        header("Location: ../aktiviteter/aktiviteter.php"); // <!-- If success then redirect to aktiviteter page  -->

    } else { // <!-- If fails then print error message  -->
        echo "Error: " . $sql . " 
" . mysqli_error($conn);
    }
    mysqli_close($conn); // <!-- Closes the connection  -->
}
?>