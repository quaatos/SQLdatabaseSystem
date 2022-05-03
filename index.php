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
    <form action="index.php" method="POST" autocomplete="off">
        <input type="text" name="username" placeholder="Username" require>
        <input type="password" name="password" placeholder="Password" require>
        <input type="submit" name="submit" value="LOGIN">
    </form>
    
    <b class="createAccountLink"><p>Want to create an account? click <a href="createAccount.php">here!</a></p></b>
</body>
</html>
<?php
session_start();
$database = new PDO('mysql:host=localhost;dbname=quaatos', 'root', '');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = :username AND pass = :pass";
    $query = $database->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':pass', $password, PDO::PARAM_STR);
    $query->execute();
    $conn = $query->fetch();
    $_SESSION['loggedInUser'] = $_POST['username'];

    if ($conn !== false) {
        if (!empty($username) && !empty($password)) {
            $_SESSION['user'] = $_POST['username'];
            header("Location: layout/database.php");
            die();
    
            } else {
                $_SESSION['error'] = "Something went wrong";
        }  
    } else {
        echo "<p class='errorStyle'>Something went wrong, check your credentials.</p>";
    }
}
?>
