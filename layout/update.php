<?php
$database = new PDO('mysql:host=localhost;dbname=quaatos', 'root', '');

$fetchQuery = "SELECT * FROM data";
$fetchData = $database->query($fetchQuery);
$fetch = $fetchData->fetchAll();

if (isset($_POST['id'])) {
  $id = $_POST['id'];
}

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

if (empty($id) && empty($name) && empty($age) && empty($email)) {
  //do nothing
} else {
  $sql = "UPDATE `data` SET `name` = :fname, `age` = :age, `email` = :email WHERE id = :id";
  $query = $database->prepare($sql);
  $query->bindParam(':id', $id, PDO::PARAM_INT);
  $query->bindParam(':fname', $name, PDO::PARAM_STR);
  $query->bindParam(':age', $age, PDO::PARAM_INT);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->execute();
  header("Location: update.php");
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update data</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
  <div class="align">
      <ul>
        <li><a href="index.php">home</a></li>
        <li><a href="add.php">Add data</a></li>
        <li><a href="delete.php">Delete data</a></li>
        <li><a class="whereAreYou">Update data</a></li>
      </ul>
    </div>
    <hr>
      <form action="update.php" method="POST">
        <input type="number" name="id" placeholder="Person id" require>
        <input type="text" name="name" placeholder="New Name" require>
        <input type="number" name="age" placeholder="New Age" require>
        <input type="text" name="email" placeholder="New E-mail" require>
        <input type="submit" name="submit" value="UPDATE">
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
