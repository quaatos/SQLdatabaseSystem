<?php
$database = new PDO('mysql:host=localhost;dbname=quaatos', 'root', '');

$fetchQuery = "SELECT * FROM data";
$fetchData = $database->query($fetchQuery);
$fetch = $fetchData->fetchAll();

if (isset($_POST['id'])) {
  $id = $_POST['id'];
}

if (isset($_POST['submit'])) {
  $submit = $_POST['submit'];

} elseif (!isset($_POST['submit'])) {
  error_reporting(0);
}


$OrderQuery = "SELECT * FROM `data` WHERE id = :id";
$query = $database->prepare($OrderQuery);
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Database system</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
<!--Navbar-->
<div class="align">
  <ul>
    <li><a class="whereAreYou" href="index.php">home</a></li>
    <li><a href="add.php">Add data</a></li>
    <li><a href="delete.php">Delete data</a></li>
    <li><a href="update.php">Update data</a></li>
  </ul>
</div>
    <h1>YOUR DATABASE SYSTEM</h1>
    <h5>version 1</h5>
<hr>

<form action="index.php" method="POST">
  <input type="number" name="id" placeholder="Sort by id">
  <input class="inlineSubmit" type="submit" name="submit" value="ORDER">
  <button class="inlineSubmit" type="submit" name="reset">RESET</button>
</form>
    
<h3>Current database:</h3><br>
<div class="tableAlign">
  <table>
    <th>id</th>
    <th>name</th>
    <th>age</th>
    <th>E-mail</th>
    <?php
    if (empty($id)) {
      foreach ($fetch as $data) {
        echo "<tr>
                <td>" . $data['id'] . "</td>
                <td>" . $data['name'] . "</td>
                <td>" . $data['age'] . "</td>
                <td>" . $data['Email'] . "</td>
              </tr>";
      }
    } elseif ($submit) {
        foreach($query as $data) {
          echo "<tr>
                  <td>" . $data['id'] . "</td>
                  <td>" . $data['name'] . "</td>
                  <td>" . $data['age'] . "</td>
                  <td>" . $data['Email'] . "</td>
              </tr>";
      }
    } else {
      foreach ($fetch as $data) {
        echo "<tr>
                <td>" . $data['id'] . "</td>
                <td>" . $data['name'] . "</td>
                <td>" . $data['age'] . "</td>
                <td>" . $data['Email'] . "</td>
              </tr>";
      }
    }
    ?>
      </table>
    </div>
  </body>
</html>
