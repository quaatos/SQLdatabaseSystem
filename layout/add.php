<?php
session_start();
//create a connection with the database
//it is possible that your credentials are different as mine. in case: first the username than the password.
//error_reporting(0);
$database = new PDO('mysql:host=localhost;dbname=quaatos', 'root', '');

//part to fetch data out of the database
$fetchQuery = "SELECT * FROM data";
$fetchData = $database->query($fetchQuery);
$fetch = $fetchData->fetchAll();

//gather information out of the input fields
if (isset($_POST['name'])) {
  $name = $_POST['name'];
}

if (isset($_POST['age'])) {
  $age = $_POST['age'];
}

if (isset($_POST['email'])) {
  $email = $_POST['email'];
}

if (isset($_POST['submit'])) {
  $submit = $_POST['submit'];
}

if (empty($name) && empty($age) && empty($email)) {
  //do nothing
} else {
    $sql = "INSERT INTO `data` (`id`, `name`, `age`, `Email`) VALUES (:id, :fname, :age, :email)";
    $query = $database->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->bindParam(':fname', $name, PDO::PARAM_STR);
    $query->bindParam(':age', $age, PDO::PARAM_INT);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    header("Location: add.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Delete data</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <p>Logged in as:  <b><?php echo $_SESSION['user']; ?></b></p> 
    <div class="align">
      <ul>
        <li><a href="database.php">home</a></li>
        <li><a class="whereAreYou">Add data</a></li>
        <li><a href="delete.php">Delete data</a></li>
        <li><a href="update.php">Update data</a></li>
      </ul>
    </div>
<hr>
    <form action="add.php" method="post">
      <input type="text" name="name" placeholder="Name">
      <input type="number" name="age" placeholder="Age">
      <input type="text" name="email" placeholder="E-mail">
      <input type="submit" name="submit" value="ADD">
    </form>
    <hr>

<div class="tableAlign">
  <table>
    <th>id</th>
    <th>name</th>
    <th>age</th>
    <th>E-mail</th>
    <?php
    foreach ($fetch as $data) {
      echo "<tr>
              <td>" . $data['id'] . "</td>
              <td>" . $data['name'] . "</td>
              <td>" . $data['age'] . "</td>
              <td>" . $data['Email'] . "</td>
            </tr>";
    }
    ?>
      </table>
    </div>
  </body>
</html>
