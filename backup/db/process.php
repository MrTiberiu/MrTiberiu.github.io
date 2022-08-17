<?php
include_once 'db_conn.php'; // includes the code to acess the database
if (isset($_POST['save'])) { // if post is submitted then... 
    $first_name = $_POST['uname']; // gets the value from the input
    $last_name = $_POST['enavn']; // gets the value from the input
    $gateadresse = $_POST['adress']; // gets the value from the input
    $postnumber = $_POST['pnumb']; // gets the value from the input
    $poststed = $_POST['psted']; // gets the value from the input
    $tlf = $_POST['tlf']; // gets the value from the input
    $epost = $_POST['epost']; // gets the value from the input
    $bdate = $_POST['bdate']; // gets the value from the input
    $gender = $_POST['gender']; // gets the value from the input
    $interesser = $_POST['interesser']; // gets the value from the input
    $rdate = $_POST['rdate']; // gets the value from the input
    $usname = $_POST['usname']; // gets the value from the input
    $pass = $_POST['pass']; // gets the value from the input
    $pass = md5($pass); // hashes the input in password


    $sql = "INSERT INTO medlemer (fornavn, etternavn, gateadresse, postnummer, poststed, 
     mobilnummer, email, fødselsdato, kjønn, interesser,
      msiden) VALUES ('$first_name','$last_name','$gateadresse','$postnumber','$poststed','$tlf',
      '$epost','$bdate','$gender','$interesser','$rdate')";

    $sql = "INSERT INTO users (user_name, password) VALUES ('$usname','$pass')";


    if (mysqli_query($conn, $sql)) { // performs a query on the database 
        header("Location: ../medlemer/medlemer.php"); // if query succeeds, takes u to /medlemmer
    } else { //if not display error message 
        echo "Error: " . $sql . " 
" . mysqli_error($conn); //Returns a string description of the last error
    }
    mysqli_close($conn); // Closes a previously opened database connection
}
?>