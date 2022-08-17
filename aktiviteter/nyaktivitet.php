<?php
session_start(); // <!-- Starts a session so the page wont be accesible without login -->
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { // <!-- Checks if the ID and UserName maches before it shows somthing -->
    include_once '../db/db_conn.php'; // <!-- Includes the code to acess the database -->


    $navn = $_SESSION['user_name']; // <!-- Gets session user_name -->


    ?>

    <!DOCTYPE html>

    <html lang="no,eng"> <!-- Sets the languege for the webpage -->

    <head>

        <title>Neo Ungdomssklubb</title> <!-- Title of the page -->

        <link rel="stylesheet" type="text/css" href="../css/aktivitet.css"> <!-- Connects the page with the CSS file -->

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

    <div id="title_id" class="title">
        <h2>Ny aktivitet</h2>
    </div>
    <form class="nyakt" action="../aktiviteter/nyakt.php" method="post" id="nyakt" style="font-size: 25px;">  <!-- HTML forum  to create new activity and connects the forum to nyakt file -->


        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p> <!-- Prints Error -->

        <?php } ?>

        <label><label>Navn Aktivitet</label><br>

            <input type="text" name="aktivitet" placeholder="Navn Aktivitet"><br> <!-- Input feeld to create a new Activity -->

            <label>Ansvarlig</label><br>

            <input type="text" name="mansvarlig" placeholder="Ansvarlig" value="<?php echo $navn; ?>"><br> <!-- Input feeld to create a new Activity -->

            <label>Dato</label><br>

            <input type="date" name="dato" placeholder="Dato"><br> <!-- Input feeld to create a new Activity -->
            <label>Beskrivelse</label><br>
            <textarea rows="4" cols="50" name="beskrivelse" form="nyakt" placeholder="Beskrivelse..."> <!-- Text feeld to create a new Activity -->
</textarea><br>

            <button type="submit" name="submit" class="button_grn">Save</button> <!-- Button to submit the forum -->


    </form>


    </body>

    </html>

    <?php

} else {

    header("Location: ../index.php"); // <!-- If ID and Username don´t mach it will send you back to the index/login page -->

    exit();

}

?>