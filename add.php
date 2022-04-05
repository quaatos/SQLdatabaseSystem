<?php
//create a connection with the database
//it is possible that your credentials are different as mine. in case: first the username than the password.
//error_reporting(0);
$database = new PDO('mysql:host=localhost;dbname=quaatos', 'root', '');

//part to fetch data out of the database
$fetchQuery = "SELECT * FROM data";
$fetchData = $database->query($fetchQuery);
$fetch = $fetchData->fetchAll();

//gather information out of the input fields
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$submit = $_POST['submit'];

//query to insert data into the database
$sql = "INSERT INTO `data` (`name`, `age`, `Email`) VALUES (:name, :age, :email)";
$query = $database->prepare($sql);
$query->bindParam(':name', $name, PDO::PARAM_STR);
$query->bindParam(':age', $age, PDO::PARAM_INT);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Delete data</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="align">
      <ul>
        <li><a href="index.php">home</a></li>
        <li><a class="whereAreYou" href="addData.php">Add data</a></li>
        <li><a href="delete.php">Delete data</a></li>
        <li><a href="update.php">Update data</a></li>
      </ul>
    </div>
<hr>
    <form action="index.php" method="POST">
      <input type="text" name="name" placeholder="Name">
      <input type="number" name="age" placeholder="Age">
      <input type="email" name="email" placeholder="E-mail">
      <input type="submit" name="submit" value="go">
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
