<!DOCTYPE html>

<html lang="no,eng">

<head>

    <title>Neo Ungdomssklubb</title>

    <link rel="stylesheet" type="text/css" href="./css/style.css"> <!-- Linking the page to a CSS file -->

</head>

<body>
<div id="title_id" class="title">
    <h1>Velkomen til NEO Ungdomsklubb</h1>
</div>
<form class="login_page" action="./db/process.php" method="post"> <!-- Links forum to the processing code for registering a new member -->

    <h2>Login</h2>

    <?php if (isset($_GET['error'])) { ?>

        <p class="error"><?php echo $_GET['error']; ?></p> <!-- Prints error message if registering a new user fails -->

    <?php } ?>

    <label><label>Fornavn</label>

        <input type="text" name="uname" placeholder="Fornavn"><br> <!-- Input feeld for  Fornavn -->

        <label>Etternavn</label>

        <input type="text" name="enavn" placeholder="Etternavn"><br></label> <!-- Input feeld for  Etternavn -->

    <label>Gateadresse</label>

    <input type="text" name="adress" placeholder="Gateadresse"><br> <!-- Input feeld for  Gateadresse -->

    <label>Postnumber</label>

    <input type="number" name="pnumb" placeholder="Postnumber"><br> <!-- Input feeld for  Postnumber -->

    <label>Poststed</label>

    <input type="text" name="psted" placeholder="Poststed"><br> <!-- Input feeld for  Poststed -->

    <label>Mobilnummer</label>

    <input type="tel" name="tlf" placeholder="Mobilnummer"><br> <!-- Input feeld for  Mobilnummer -->

    <label>Epost</label>

    <input type="email" name="epost" placeholder="Epost"><br> <!-- Input feeld for  Epost -->

    <label>Fødselsdato</label>

    <input type="date" name="bdate" placeholder="Fødselsdato"><br> <!-- Input date feeld for  Fødselsdato -->

    <label for="gender">Kjønn:</label> 
    <select id="gender" name="gender"> <!-- Multiple values for  Kjønn -->
        <option value="boy">Boy</option>
        <option value="girl">Girl</option>
    </select>

    <label for="interesser">Interesser:</label>
    <select id="interesser" name="interesser"> <!-- Multiple values for Interesser -->
        <option value="film">Film</option>
        <option value="trenning">Trenning</option>
        <option value="bil">Bil</option>
        <option value="studie">Studie</option>
    </select>
    <br>
    <label>Medlem siden</label>

    <input type="date" name="rdate" placeholder="Medlem siden"><br> <!-- Input date feeld for Medlem siden -->

    <label for="betalt">Kontingentstatus:</label>
    <select id="kontingentstatus" name="kontingentstatus"> <!-- Multiple values for Kontingentstatus -->
        <option value="betalt">Betalt</option>
        <option value="ubetalt">Ubetalt</option>
    </select>
    <br>
    <label>Username</label>

    <input type="text" name="usname" placeholder="Username"><br> <!-- Input feeld for the Username -->


    <label>Password</label>

    <input type="password" name="pass" placeholder="Password"><br> <!-- Input feeld for the Password -->
    <button type="submit" name="save">Register</button>

</form>

</body>

</html>

