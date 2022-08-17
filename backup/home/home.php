<?php

session_start(); // <!-- Starts a session so the page wont be accesible without login -->
include_once '../db/db_conn.php'; // <!-- Includes the code to acess the database -->

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { // <!-- Checks if the ID and UserName maches before it shows somthing -->
    $test = $_SESSION['user_name']; // <!-- Gets session username for photo -->
    $test1 = $_SESSION['id']; // <!-- Gets session ID for Aktiviteter og role -->
    $where = " WHERE fornavn='$test'"; // <!-- Where for SQL string -->
    $where1 = " WHERE usr_id='$test1'"; // <!-- Where for SQL string -->
    $img = "../img/$test.png"; // <!-- Get the right photo based on username -->
    $sql = "SELECT gateadresse,mobilnummer,email,interesser,fornavn,etternavn,inetresser1 FROM medlemer $where"; // <!-- SQL query thet gets the values from the database -->

    $result = mysqli_query($conn, $sql); // <!-- Sends the query -->

    $info = mysqli_fetch_all($result, MYSQLI_ASSOC); // <!-- Gets the data and index like the fild name -->


    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!-- bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css"> <!-- Connects the page with Bootstrap -->
        <!-- style CSS -->
        <link rel="stylesheet" href="../css/home.css"/> <!-- Connects the page with CSS file -->

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
   
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
             
            <?php foreach ($info as $infos) { ?>  <!-- sets info as infos to print the values in the card -->
            <div class="card" style="width: 18rem;     background-color: rgb(210, 210, 210); margin:5px;" >
  <img src="<?php echo $img ?>" class="card-img-top" alt="<?php echo $test ?>" style="border-radius: 50%;"> <!-- Bootstrap card -->
  <div class="card-body" >
    <p class="card-text" style="text-align: center;"><?php echo ucwords(htmlspecialchars($infos['fornavn'])) . " " . htmlspecialchars($infos['etternavn']); ?> </p> <!-- Prints the value from database --> 
                        <hr>
    <p class="card-text" style="text-align: center;">Adresse: <?php echo ucwords(htmlspecialchars($infos['gateadresse'])); ?> </p> <!-- Prints the value from database --> 
                        <hr>
    <p class="card-text" style="text-align: center;">Email: <?php echo htmlspecialchars($infos['email']); ?> </p> <!-- Prints the value from database --> 
                        <hr>
    <p class="card-text" style="text-align: center;">Telefon: <?php echo htmlspecialchars($infos['mobilnummer']); ?> </p> <!-- Prints the value from database --> 
                        <hr>
    <p class="card-text" style="text-align: center;">Interesser: <?php echo ucwords(htmlspecialchars($infos['interesser'])) . ", " . ucwords(htmlspecialchars($infos['inetresser1'])); ?></p> <!-- Prints the value from database --> 
                        


  </div>
</div>


                <?php } ?>

            </div>

            <div class="col-lg-6">
                <!-- Aktiviteter erolled -->
                <?php
                include_once '../db/db_conn.php'; // <!-- Includes the code to acess the database -->
                $result = mysqli_prepare($conn, "SELECT *  FROM aktusr INNER JOIN aktiviteter ON aktiviteter.id = aktusr.aktiv_id $where1"); // <!-- SQL query that takes the info for the aktivitis the user is enrolled -->

                mysqli_stmt_execute($result); // <!-- Execute the SQL query -->

                $getResult = mysqli_stmt_get_result($result); // <!-- Gets the results -->


                ?>
                <table class="table table-bordered" style="margin: 5px; border:black; background-color: rgb(210, 210, 210);"> <!-- Creates a table -->
                    <thead>
                    <tr>

                        <th>Aktivitet</th> <!-- Name for columns -->
                        <th>Ansvarlig</th> <!-- Name for columns -->
                        <th>Dato</th> <!-- Name for columns -->
                        <th>Beskrivelse</th> <!-- Name for columns -->
                        <th>Meld Av</th> <!-- Name for columns -->

                    </thead>
                    <tbody>

                    <?php
                   
                    while ($row1 = mysqli_fetch_assoc($getResult)) { // <!-- Gets the array as row1 --> 
                        ?>
                        <tr>
                            <td><?php echo $row1['aktivitet']; ?></td> <!-- Prints the value in the row --> 
                            <td><?php echo $row1['mansvarlig'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                            <td><?php echo $row1['dato'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                            <td><?php echo $row1['beskrivelse'] ?? ''; ?></td> <!-- Prints the value in the row --> 
                            <td><a href="./delakt.php?id=<?php echo $row1['id']; ?>" class="button_grn btn-success">Meld Av</a></td> <!-- Button to drop out of a activity --> 


                        </tr>
                        <?php
                        
                    } ?>
                    <tr>

                    </tbody>
                </table>

                <?php
                include_once '../db/db_conn.php'; // <!-- Includes the code to acess the database -->
                $result1 = mysqli_prepare($conn, "SELECT *  FROM medrol INNER JOIN roles ON roles.id = medrol.role_id $where1"); // <!-- SQL query that takes the roles of the user -->


                mysqli_stmt_execute($result1); // <!-- Execute the SQL query -->

                $getResult1 = mysqli_stmt_get_result($result1); // <!-- Gets the results -->
                

                ?>
                <table class="table table-bordered" style="margin: 5px; border:black; background-color: rgb(210, 210, 210);"> <!-- Creates a table -->
                    <thead>
                    <tr>

                        <th>Role</th> <!-- Name for columns -->
                       
                    </thead>
                    <tbody>

                    <?php
                 
                    while ($row2 = mysqli_fetch_assoc($getResult1)) { // <!-- Gets the array as row2 --> 
                        ?>
                        <tr>
                            <td><?php echo $row2['role']; ?></td>  <!-- Prints the value in the row --> 
                            


                        </tr>
                        <?php
                       
                    } ?>
                    <tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!--   bootstrap JS -->
    <script src="../js/bootstrap/bootstrap.min.js"></script>  <!-- Links the JS from the Bootstrap --> 
    </body>

    </html>
    <?php

} else {

    header("Location: ../index.php");  // <!-- If ID and Username don´t mach it will send you back to the index/login page -->

    exit();

}

?>