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
}

if (empty($id)) {
  //do nothing
} else {
    $sql = "DELETE FROM `data` WHERE `id` = :id";
    $query = $database->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    header("Location: delete.php");
}
//IN PROGRESS: confirmation if you want to delete a row.
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Delete data</title>
    <link rel="stylesheet" href="../css/style.css">  
    <script rel="script/javascript" src="../Javascript/main.js"></script>
  </head>
  <body>
    <div class="align">
      <ul>
        <li><a href="database.php">home</a></li>
        <li><a href="add.php">Add data</a></li>
        <li><a class="whereAreYou">Delete data</a></li>
        <li><a href="update.php">Update data</a></li>
      </ul>
    </div>
<hr>
    <form action="delete.php" method="POST">
      <input type="number" name="id" placeholder="Person id">
      <input type="submit" name="submit" onclick="confirmation()" value="DELETE">
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
