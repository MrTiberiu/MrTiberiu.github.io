<?php
session_start(); // <!-- Starts a session so the page wont be accesible without login -->


if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { // <!-- Checks if the ID and UserName maches before it shows somthing -->
    include_once '../db/db_conn.php'; // <!-- Includes the code to acess the database -->

    if (isset($_POST['submit'])) { // <!-- If the buttun is pressed the code will print the following  -->
        if (!empty($_POST['kontingentstatuss'])) { // <-- If kontingentstatuss is not empty then... -->
            $selected = $_POST['kontingentstatuss']; // <-- Select the values from kontingentstatuss -->
            $result = mysqli_query($conn, "SELECT * FROM medlemer WHERE kontingentstatus = '$selected'"); // <-- SQL query thet selects the values from medlemer based on kontingentstatus -->
        } else { // <-- If kontingentstatuss is  empty then... -->
            $result = mysqli_query($conn, "SELECT * FROM medlemer"); // <-- SQL query thet selects the values from medlemer -->
        }
    }


    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="../css/aktivitet.css"> <!-- Connects the page with the CSS file -->
        <title>Neo Ungdomssklubb</title>
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
<br>
    <form action="" method="post"> <!-- Forum used for the filter -->
        <label>Kontingentstatus</label>
        <select name="kontingentstatuss">
            <option value="">Velg status</option> <!-- Values for the filter -->
            <option value="betalt">Betalt</option> <!-- Values for the filter if status is "betalt" -->
            <option value="ubetalt">Ubetalt</option> <!-- Values for the filter if status is "ubetalt"  -->
        </select>

        <input class="btn-ss" type="submit" name="submit" vlaue="Choose options"> <!-- Button to submit the value -->
    </form>


    <table class="table table-bordered"> <!-- Table used to store the values in the table -->
        <thead>
        <tr>

            <th>ID</th> <!-- Name for columns -->
            <th>Fornavn</th> <!-- Name for columns -->
            <th>Etternavn</th> <!-- Name for columns -->
            <th>Adresse</th> <!-- Name for columns -->
            <th>Postnummer</th> <!-- Name for columns -->
            <th>Poststed</th> <!-- Name for columns -->
            <th>Mobilnummer</th> <!-- Name for columns -->
            <th>Email</th> <!-- Name for columns -->
            <th>Fødselsdato</th> <!-- Name for columns -->
            <th>Kjønn</th> <!-- Name for columns -->
            <th>Interesser</th> <!-- Name for columns -->
            <th>Interesser</th> <!-- Name for columns -->
            <th>Medlem Siden</th> <!-- Name for columns -->
            <th>Role</th> <!-- Name for columns -->
            <th>Kontingentstatus</th> <!-- Name for columns -->
            <th>Edit</th> <!-- Name for columns -->

        </thead>
        <tbody>

        <?php
        
        while ($row = mysqli_fetch_array($result)) { // <!-- Gets the array from the SQL query -->
            ?>
            <tr>
                <td><?php echo $row['id'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                <td><?php echo $row['fornavn'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                <td><?php echo $row['etternavn'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                <td><?php echo $row['gateadresse'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                <td><?php echo $row['postnummer'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                <td><?php echo $row['poststed'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                <td><?php echo $row['mobilnummer'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                <td><?php echo $row['email'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                <td><?php echo $row['fødselsdato'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                <td><?php echo $row['kjønn'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                <td><?php echo $row['interesser'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                <td><?php echo $row['inetresser1'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                <td><?php echo $row['msiden'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                <td><?php echo $row['roles'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                <td><?php echo $row['kontingentstatus'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a></td> <!-- Button to update that gets the id --> 

            </tr>
            <?php
           
        } ?>
        <tr>

        </tbody>
    </table>
    </div>
    <div style="text-align: center;
    padding: 5px;">
        <a href="../medlemer/nybruker.php"> <!-- Create a button that is linked to Create new user -->
            <button class="button_grn">Ny medlem</button>
    </div>
    <div style="text-align: center;
    padding: 5px;">
        <a href="../mail1/bulk_email.php"> <!-- Create a button that is linked to a page to send emails -->
            <button class="button_grn">Send Mail</button>
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