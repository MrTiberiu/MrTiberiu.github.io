<?php
session_start(); // <!-- Starts a session so the page wont be accesible without login -->

include_once '../db/db_conn.php'; // <!-- Includes the code to acess the database -->
if (count($_POST) > 0) {
    mysqli_query($conn, "UPDATE `medlemer` SET fornavn = '" . $_POST['fornavn'] . "', etternavn = '" . $_POST['etternavn'] . "', gateadresse = '" . $_POST['gateadresse'] . "', 
        postnummer = '" . $_POST['postnummer'] . "', poststed ='" . $_POST['poststed'] . "', mobilnummer = '" . $_POST['mobilnummer'] . "', email = '" . $_POST['email'] . "',
         fødselsdato = '" . $_POST['fødselsdato'] . "', kjønn = '" . $_POST['kjønn'] . "', interesser = '" . $_POST['interesser'] . "',inetresser1 = '" . $_POST['inetresser1'] . "',
         msiden = '" . $_POST['msiden'] . "',roles = '" . $_POST['roles'] . "',kontingentstatus = '" . $_POST['kontingentstatus'] .
          "' WHERE id = '" . $_POST['id'] . "'");// <!-- SQL query to update the table with the new informations -->
    $message = "Update Successfuly"; // <!-- Message to confirm if is Successfuly -->
}
$result = mysqli_query($conn, "SELECT * FROM medlemer WHERE id= '" . $_GET['id'] . "'"); // <!-- SQL query to get the informations from the database -->
$row = mysqli_fetch_array($result); // <!-- Gets the array from the SQL query -->

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Neo Ungdomssklubb</title>
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
  color: #000000;">Update Member</h2>

<!-- HTML Form -->

<form name="frmUser" method="post" action="" style="text-align: center; font-size:25px;"> <!-- HTML forum for updating the memers info -->
    <?php if (isset($message)) {
        echo $message;
    } ?> <br> <!-- Prints error message -->
    <input type="hidden" name="id" value="<?php echo $row['id'] ?? ''; ?>"> <!-- Input feeld where the value from the database is inserted for you so you can change it but hidden for the id -->
    <label style="color: #000000;">Fornavn</label><br>

    <input type="text" name="fornavn" style="width: 300px; font-size: 19px;"
           value="<?php echo $row['fornavn'] ?? ''; ?>"><br> <!-- Input feeld where the value from the database is inserted for you so you can change it -->

    <label style="color: #000000;">Etternavn</label><br>

    <input type="text" name="etternavn" style="width: 300px; font-size: 19px;"
           value="<?php echo $row['etternavn'] ?? ''; ?>"><br> <!-- Input feeld where the value from the database is inserted for you so you can change it -->

    <label style="color: #000000; ">Gateadresse</label><br>

    <input type="text" name="gateadresse" style="width: 300px; font-size: 19px;" placeholder="Gateadresse"
           value="<?php echo $row['gateadresse'] ?? ''; ?>"><br> <!-- Input feeld where the value from the database is inserted for you so you can change it -->

    <label style="color: #000000;">Postnumber</label><br>

    <input type="number" name="postnummer" style="width: 300px; font-size: 19px;" placeholder="Postnumber"
           value="<?php echo $row['postnummer'] ?? ''; ?>"><br> <!-- Input feeld where the value from the database is inserted for you so you can change it -->

    <label style="color: #000000;">Poststed</label><br>

    <input type="text" name="poststed" style="width: 300px; font-size: 19px;" placeholder="poststed"
           value="<?php echo $row['poststed'] ?? ''; ?>"><br> <!-- Input feeld where the value from the database is inserted for you so you can change it -->

    <label style="color: #000000;">Mobilnummer</label><br>

    <input type="tel" name="mobilnummer" style="width: 300px; font-size: 19px;" placeholder="Mobilnummer"
           value="<?php echo $row['mobilnummer'] ?? ''; ?>"><br> <!-- Input feeld where the value from the database is inserted for you so you can change it -->

    <label style="color: #000000;">Epost</label><br>

    <input type="email" name="email" style="width: 300px; font-size: 19px;" placeholder="Epost"
           value="<?php echo $row['email'] ?? ''; ?>"><br> <!-- Input feeld where the value from the database is inserted for you so you can change it -->

    <label style="color: #000000;">Fødselsdato</label><br> 

    <input type="date" name="fødselsdato" style="width: 300px; font-size: 19px;" placeholder="Fødselsdato"
           value="<?php echo $row['fødselsdato'] ?? ''; ?>"><br> <!-- Input feeld where the value from the database is inserted for you so you can change it -->

    <label for="kjønn" style="color: #000000;">Gender:</label>
    <select id="kjønn" name="kjønn" style="width: 125px; font-size: 19px;"> <!-- Input feeld -->
        <option value="boy">boy</option> <!-- Values -->
        <option value="girl">girl</option> <!-- Values -->
    </select>

    <label for="interesser" style="color: #000000;">Interesser:</label>
    <select id="interesser" name="interesser" style="width: 125px; font-size: 19px;"> <!-- Input feeld -->
        <option value="film">Film</option> <!-- Values -->
        <option value="trenning">Trenning</option> <!-- Values -->
        <option value="bil">Bil</option> <!-- Values -->
        <option value="studie">Studie</option> <!-- Values -->
    </select>

    <label for="inetresser1" style="color: #000000;">Interesser:</label>
    <select id="inetresser1" name="inetresser1" style="width: 125px; font-size: 19px;"> <!-- Input feeld -->
        <option value="film">Film</option>
        <option value="trenning">Trenning</option> <!-- Values -->
        <option value="bil">Bil</option> <!-- Values -->
        <option value="studie">Studie</option> <!-- Values -->
    </select>
    <br>
    <label style="color: #000000;">Medlem siden</label><br>

    <input type="date" name="msiden" style="width: 300px; font-size: 19px;" placeholder="Medlem siden"
           value="<?php echo $row['msiden'] ?? ''; ?>"><br> <!-- Input feeld where the value from the database is inserted for you so you can change it -->

    <label for="roles" style="color: #000000;">Role:</label>
    <select id="roles" name="roles" style="width: 150px; font-size: 19px;"> <!-- Input feeld -->
        <option value="admin">Admin</option> <!-- Values -->
        <option value="user">User</option> <!-- Values -->
    </select>

    <label for="betalt" style="color: #000000;">Kontingentstatus:</label>
    <select id="kontingentstatus" name="kontingentstatus" style="width: 150px; font-size: 19px;"> <!-- Input feeld -->
        <option value="betalt">Betalt</option> <!-- Values -->
        <option value="ubetalt">Ubetalt</option> <!-- Values -->
    </select><br>


    <button type="submit" name="submit" class="button_grn">Save</button> <!-- Button to submit the forum -->
</form>

</div>
</div>
</div>
</body>
</html>

