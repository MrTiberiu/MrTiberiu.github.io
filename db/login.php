<?php

session_start(); //A session is a way to store information (in variables) to be used across multiple pages

include "./db_conn.php"; //inkluderer database connectionen

if (isset($_POST['uname']) && isset($_POST['password'])) { //determines if variables is declared

    function validate($data) 
    {

        $data = trim($data); //Strip whitespace (or other characters) from the beginning and end of a string

        $data = stripslashes($data); // a string with backslashes stripped off

        $data = htmlspecialchars($data); //Convert special characters to HTML entities

        return $data;

    }

    $uname = validate($_POST['uname']); // the variable which is validatet

    $pass = validate($_POST['password']); // the variable which is validatet
    $pass = md5($pass); //hashing of a string

    if (empty($uname)) { // if username is empty display following

        header("Location: ../index.php?error=User Name is required");

        exit(); // outputs the message and terminates the current script

    } else if (empty($pass)) { // if password is empty display following

        header("Location: ../index.php?error=Password is required");

        exit(); // outputs the message and terminates the current script

    } else { // if username and password is not empty get the uname and pass from the database

        $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql); // performs a query on the database

        if (mysqli_num_rows($result) === 1) { // Gets the number of rows in a result, "1" means false

            $row = mysqli_fetch_assoc($result); // Fetch a result row as an associative array

            if ($row['user_name'] === $uname && $row['password'] === $pass) { // if uname and pass is correct then u logg inn

                echo "Logged in!";

                $_SESSION['user_name'] = $row['user_name']; //checks if username is equal to username from database

                $_SESSION['name'] = $row['name']; //checks if name is equal to username from database

                $_SESSION['id'] = $row['id']; //checks if id is equal to username from database

                header("Location: ../home/home.php"); //takes u to /home

                exit(); // outputs the message and terminates the current script

            } else { // if the input doesnt match with the database rows, display following

                header("Location: ../index.php?error=Incorect User name or password"); //display message

                exit(); // outputs the message and terminates the current script

            }

        } else {

            header("Location: ../index.php?error=Incorect User name or password"); // if not display error

            exit(); // outputs the message and terminates the current script

        }

    }

} else {

    header("Location: ../index.php"); // directs your location to index

    exit(); // outputs the message and terminates the current script

}
?>