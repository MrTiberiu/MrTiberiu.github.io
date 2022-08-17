<!DOCTYPE html>

<html lang="no,eng">

<head>

    <title>Neo Ungdomssklubb</title> <!-- Title of the page -->

    <link rel="stylesheet" type="text/css" href="css/style.css"> <!-- Linking the page to a CSS file -->

</head>

<body>

<div id="title_id" class="title">
    <h1>Velkomen til NEO Ungdomsklubb</h1> <!-- Header of the login page -->
</div>
<form class="login_page" action="db/login.php" method="post"> <!-- Links forum to the login code -->

    <h2>Login</h2>

    <?php if (isset($_GET['error'])) { ?>

        <p class="error"><?php echo $_GET['error']; ?></p> <!-- Prints error message if Login fails -->

    <?php } ?>

    <label>User Name</label>

    <input type="text" name="uname" placeholder="User Name"><br> <!-- Input feeld for the User Name -->

    <label>Password</label>

    <input type="password" name="password" placeholder="Password"><br> <!-- Input feelp for the Password with type:password so the input is encriptet/hidden **** -->

    <button type="submit">Login</button> <!-- Submit button so the forum acesses the login script -->

</form>
<div style="text-align: center;
    padding: 5px;">
    <a href="newuser.php">
        <button class="button_grn">Signup</button> <!-- Create a button that is linked to Signup/Create new user -->
    </a>
</div>
</body>

</html>

