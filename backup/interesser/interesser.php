<?php
session_start(); // <!-- Starts a session so the page wont be accesible without login -->
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { // <!-- Checks if the ID and UserName maches before it shows somthing -->
    include_once '../db/db_conn.php'; // <!-- Includes the code to acess the database -->
    $id = $_SESSION['id']; // <!-- Gets the session id -->
    if (count($_POST) > 0) {
        mysqli_query($conn, "UPDATE `medlemer` SET  interesser = '" . $_POST['interesser'] . "',inetresser1 = '" . $_POST['inetresser1'] . "' WHERE id = '$id'"); // <!-- SQL update query if button pressed -->
        $message = "Update Successfuly"; // <!-- Message if successfuly -->
    }
    $result = mysqli_query($conn, "SELECT interesser, inetresser1  FROM medlemer WHERE id= '$id'"); // <!-- SQL query to get the values from the database -->
    $row = mysqli_fetch_array($result); // <!-- Gets the array from the SQL query -->

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Neo Ungdomssklubb</title>
        <!-- bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css"> <!-- Connects the page with Bootstrap -->
 
        <link rel="stylesheet" href="../css/aktivitet.css"> <!-- Connects the page with the CSS file -->
    </head>
    <body>
    <nav class="navbar">
        <!-- Logo/Title -->
        <div class="logo">Neo Ungdomssklubb</div>
        <!-- Navigation Menu -->
        <ul class="nav-links">
            <!-- Navigation Links -->
            <div class="menu">
                <li><a href="../home/home.php">Hjem</a></li> <!-- Links the button with right page -->
                <li><a href="../medlemer/medlemer.php">Medlemmer</a></li> <!-- Links the button with right page -->
                <li><a href="../interesser/interesser.php">Interesser</a></li> <!-- Links the button with right page -->
                <li><a href="../aktiviteter/aktiviteter.php">Aktiviteter</a></li> <!-- Links the button with right page -->
                <li><a href="../db/logout.php">Logout</a></li> <!-- Links the button with right page -->
            </div>
        </ul>
    </nav>

    <h2 style=" text-align: center;
  color: #000000;">Interesser</h2>

    <!-- HTML Form -->

    <form name="frmUser" method="post" action="" style="text-align: center; font-size:25px;">
        <?php if (isset($message)) {
            echo $message;
        } ?> <br> <!-- Prints error message -->

        <input type="hidden" name="id" value="<?php echo $row['id'] ?? ''; ?>"> <!-- Input feeld where the value from the database is inserted for you so you can change it but hidden for the id -->

        <div class="container-fluid"> <!-- Bootstrap container -->
            <div class="row">
                <div class="col-lg-6">
                    <h2>Første interesse</h2>
                    <label for="interesser" style="color: #000000;">Interesser:</label>
                    <select id="interesser" name="interesser" style="width: 125px; font-size: 19px;"> <!-- Multiple choices for interesser -->
                        <option value="<?php echo $row['inetresser1'] ?? ''; ?>"><?php echo $row['interesser'] ?? ''; ?></option> <!-- prints the value from the database -->
                        <option value="film">Film</option> <!-- Values -->
                        <option value="trenning">Trenning</option> <!-- Values -->
                        <option value="bil">Bil</option> <!-- Values -->
                        <option value="studie">Studie</option> <!-- Values -->
                    </select>

                </div>

                <div class="col-lg-6">
                    <h2>Andre interesse</h2>
                    <label for="inetresser1" style="color: #000000;">Interesser:</label>
                    <select id="inetresser1" name="inetresser1" style="width: 125px; font-size: 19px;"> <!-- Multiple choices for interesser -->
                        <option value="<?php echo $row['inetresser1'] ?? ''; ?>"><?php echo $row['inetresser1'] ?? ''; ?></option> <!-- prints the value from the database -->
                        <option value="film">Film</option> <!-- Values -->
                        <option value="trenning">Trenning</option> <!-- Values -->
                        <option value="bil">Bil</option> <!-- Values -->
                        <option value="studie">Studie</option> <!-- Values -->
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" name="submit" class="button_grn">Save</button> <!-- Button to submit -->
    </form>
</div>
    </div>
    </div>
    </body>
    </html>

    <?php

} else {

    header("Location: ../index.php"); // <!-- If ID and Username don´t mach it will send you back to the index/login page -->

    exit();

}

?>