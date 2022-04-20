<?php
$database = new PDO('mysql:host=localhost;dbname=quaatos', 'root', '');

if (isset($_POST['submit'])) {
    $submit = $_POST['submit'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `users` (`username`, `pass`) VALUES (:user, :pass)";
    $query = $database->prepare($sql);
    $query->bindParam(':user', $username, PDO::PARAM_STR);
    $query->bindParam(':pass', $password, PDO::PARAM_STR);
    $query->execute();
}

//TODO: error if username already exist in database

//if fields are empty: do nothing
if (!empty($username) && !empty($password)) {
    if ($submit) {
        header('location: index.php');
    } else {
        //do nothing
    }
} else {
    //do nothing
}

//WORK IN PROCCES
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create account</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <h2>Create account</h2>
    <form action="createAccount.php" method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submit" value="CREATE ACCOUNT">
    </form>
</body>
</html>