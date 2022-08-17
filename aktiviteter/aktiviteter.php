<?php
session_start(); // <!-- Starts a session so the page wont be accesible without login -->

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { // <!-- Checks if the ID and UserName maches before it shows somthing -->
    include_once '../db/db_conn.php';// <!-- Includes the code to acess the database -->
    $result = mysqli_query($conn, "SELECT * FROM aktiviteter"); // <-- SQL query thet selects the values from medlemer -->

    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Neo Ungdomssklubb</title>
    </head>
    <link rel="stylesheet" type="text/css" href="../css/aktivitet.css"> <!-- Connects the page with the CSS file -->


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



    <table class="table table-bordered"> <!-- Table used to store the values in the table -->
        <thead>
        <tr>

            <th>ID</th> <!-- Name for columns -->
            <th>Aktivitet</th> <!-- Name for columns -->
            <th>Ansvarlig</th> <!-- Name for columns -->
            <th>Dato</th> <!-- Name for columns -->
            <th>Beskrivelse</th> <!-- Name for columns -->
            <th>Meld På</th> <!-- Name for columns -->

        </thead>
        <tbody>

        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($result)) { // <!-- Gets the array from the SQL query -->
            ?>
            <tr>
                <td><?php echo $row['id'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                <td><?php echo $row['aktivitet'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                <td><?php echo $row['mansvarlig'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                <td><?php echo $row['dato'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                <td><?php echo $row['beskrivelse'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                <td><a href="./setakt.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Meld På</a></td> <!-- Button to setakt that gets the id --> 
                

            </tr>
            <?php
            $i++;
        } ?>
        <tr>

        </tbody>
    </table>
    </div>
    <div style="text-align: center;
    padding: 5px;">
        <a href="./nyaktivitet.php"> <!-- Create a button that is linked to Create new activity -->
            <button class="button_grn">Ny Aktivitet</button>
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