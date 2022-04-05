<?php
$database = new PDO('mysql:host=localhost;dbname=quaatos', 'root', '');

$fetchQuery = "SELECT * FROM data";
$fetchData = $database->query($fetchQuery);
$fetch = $fetchData->fetchAll();

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

<h3>Current database:</h3><br>
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
