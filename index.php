<?php
$user = "quaatos";
$pass = "quaatos";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $user && $password === $pass) {
        header('Location: layout/database.php');
    } else {
        //do nothing
    }
}

//TODO: check if given credentials exist in database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <h2>Login</h2>
    <form action="index.php" method="POST">
        <input type="text" name="username" placeholder="Username" require>
        <input type="password" name="password" placeholder="Password" require>
        <input type="submit" name="submit" value="login">
    </form>
    
    <b class="createAccountLink"><p>Want to create an account? click <a href="createAccount.php">here!</a></p></b>

    <p>default credentials:</p>
    <b><p>Username: quaatos</p></b>
    <b><p>Password: quaatos</p><b>
</body>
</html>