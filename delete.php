<?php
$id = $_GET['id'];
$submit = $_POST['submit'];

$database = new PDO('mysql:host=localhost;dbname=quaatos', 'root', '');

$fetchQuery = "SELECT * FROM data";
$fetchData = $database->query($fetchQuery);
$fetch = $fetchData->fetchAll();

if (isset($submit)) {
//delete data
$deleteQuery = "DELETE FROM data WHERE id = :id";
$query = $database->prepare($deleteQuery);
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();
}
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
        <li><a href="add.php">Add data</a></li>
        <li><a class="whereAreYou" href="delete.php">Delete data</a></li>
        <li><a href="update.php">Update data</a></li>
      </ul>
    </div>
<hr>
    <form action="index.php" method="POST">
      <input type="number" name="id" placeholder="memeber id">
      <input type="submit" name="submit" value="DELETE">
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
