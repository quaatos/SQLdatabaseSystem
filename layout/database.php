<?php
$database = new PDO('mysql:host=localhost;dbname=quaatos', 'root', '');

$fetchQuery = "SELECT * FROM data";
$fetchData = $database->query($fetchQuery);
$fetch = $fetchData->fetchAll();

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $submit = $_POST['submit'];
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
    <link rel="stylesheet" href="../css/style.css">
  </head>
<body>
<!--Navbar-->
<div class="align">
  <ul>
    <li><a class="whereAreYou" href="database.php">home</a></li>
    <li><a href="add.php">Add data</a></li>
    <li><a href="delete.php">Delete data</a></li>
    <li><a href="update.php">Update data</a></li>
  </ul>
</div>
    <h1>YOUR DATABASE SYSTEM</h1>
    <h4>V1.1</h4>
<hr>

<form action="database.php" method="POST">
  <input type="number" name="id" placeholder="Sort by id">
  <input class="inlineSubmit" type="submit" name="submit" value="ORDER / RESET">
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
        foreach($query as $OrderData) {
          echo "<tr>
                  <td>" . $OrderData['id'] . "</td>
                  <td>" . $OrderData['name'] . "</td>
                  <td>" . $OrderData['age'] . "</td>
                  <td>" . $OrderData['Email'] . "</td>
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
