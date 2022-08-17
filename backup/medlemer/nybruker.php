<?php
session_start(); // <!-- Starts a session so the page wont be accesible without login -->


if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { // <!-- Checks if the ID and UserName maches before it shows somthing -->
    include_once '../db/db_conn.php'; // <!-- Includes the code to acess the database -->
    ?>
<!DOCTYPE html>

<html lang="no,eng"> <!-- Sets the languege for the page -->

<head>

    <title>Neo Ungdomssklubb</title>

    <link rel="stylesheet" type="text/css" href="../css/test.css"> <!-- Connects the page with the CSS file -->

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
    <h2>Lag en my bruker</h2><br>
</div>
<form class="login_page" action="../db/process.php" method="post"> <!--  HTML forum  to create new user and connects the forum to process file -->


    <?php if (isset($_GET['error'])) { ?>

        <p class="error"><?php echo $_GET['error']; ?></p> <!-- Prints Error -->

    <?php } ?>

    <label><label>Fornavn</label>

        <input type="text" name="uname" placeholder="Fornavn"><br> <!-- Input feeld to create a new Fornavn -->

        <label>Etternavn</label>

        <input type="text" name="enavn" placeholder="Etternavn"><br></label> <!-- Input feeld to create a new Etternavn -->

    <label>Gateadresse</label>

    <input type="text" name="adress" placeholder="Gateadresse"><br> <!-- Input feeld to create a new Gateadresse -->

    <label>Postnumber</label>

    <input type="number" name="pnumb" placeholder="Postnumber"><br> <!-- Input feeld to create a new Postnumber -->

    <label>Poststed</label>

    <input type="text" name="psted" placeholder="Poststed"><br> <!-- Input feeld to create a new Poststed -->

    <label>Mobilnummer</label>

    <input type="tel" name="tlf" placeholder="Mobilnummer"><br> <!-- Input feeld to create a new Mobilnummer -->

    <label>Epost</label>

    <input type="email" name="epost" placeholder="Epost"><br> <!-- Input feeld to create a new Epost -->

    <label>Fødselsdato</label>

    <input type="date" name="bdate" placeholder="Fødselsdato"><br> <!-- Input feeld to create a new Fødselsdato -->

    <label for="gender">Kjønn:</label>
    <select id="gender" name="gender"> <!-- Input feeld to create a new Kjønn -->
        <option value="boy">Boy</option>
        <option value="girl">Girl</option>
    </select>

    <label for="interesser">Interesser:</label>
    <select id="interesser" name="interesser"> <!-- Input feeld to create a new Interesser -->
        <option value="film">Film</option>
        <option value="trenning">Trenning</option>
        <option value="bil">Bil</option>
        <option value="studie">Studie</option>
    </select>
    <br>
    <br>
    <label>Medlem siden</label>

    <input type="date" name="rdate" placeholder="Medlem siden"><br> <!-- Input feeld to create a new date for Medlem siden -->

    <label for="betalt">Kontingentstatus:</label>
    <select id="kontingentstatus" name="kontingentstatus"> <!-- Input feeld to create a new Kontingentstatus -->
        <option value="betalt">Betalt</option>
        <option value="ubetalt">Ubetalt</option>
    </select>
    <br>
    <br>
    <label>Username</label>

    <input type="text" name="usname" placeholder="Username"><br> <!-- Input feeld to create a new Username -->


    <label>Password</label>

    <input type="password" name="pass" placeholder="Password"><br> <!-- Input feeld to create a new Password -->
    <button type="submit" name="save">Register</button>

</form>

</body>

</html>
<?php

} else {

    header("Location: ../index.php"); // <!-- If ID and Username don´t mach it will send you back to the index/login page -->

    exit();

}

?>
