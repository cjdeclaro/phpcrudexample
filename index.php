<?php
  include("connect.php");
  function getFullName($f, $l) {
    return $f." ".$l;
  }

  if(isset($_POST["register"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];

    $query = "
      INSERT INTO Users(username, password, first_name, last_name, address_id, access_level)
      VALUES ('$username', '$password', '$firstname', '$lastname', '1', '0');
    ";
    executeQuery($query);
  }

  if(isset($_POST["delete"])){
    $id = $_POST["id"];

    $query = "UPDATE Users SET is_deleted='yes' WHERE id = '$id'";
    executeQuery($query);
  }
?>

<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <title>
    Test
  </title>

  <style>
    .header{
      width: 100%;
      background-color: #7e2929;
      text-align: center;
      color: white;
      font-family: poppins;
    }

    .container {
      width: 800px;
      margin: auto;
      border: 2px solid black;
      border-radius: 20px;
      height: 500px;
      padding: 20px;

    }

    h2{
      padding: 20px;
    }
  </style>
</head>

<body style="margin: 0px">
  <div class="header">
    <h2>Hello <?php echo "$adminusername"?></h2>
  </div>

  <div class="container">
    <table class="col-12" style="float: left">
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Action</th>
      </tr>
      <?php
        $query = "SELECT * FROM Users WHERE is_deleted = 'no'";
        $result = executeQuery($query);

        while ($row = mysqli_fetch_array($result)) {
      ?>
        <tr>
          <td><?php echo $row['first_name']?></td>
          <td><?php echo $row['last_name']?></td>
          <td>
            <a href="update.php?id=<?php echo $row['id'] ?>">Update</a>
            <form method="POST">
              <input type="hidden" name="id" value="<?php echo $row['id'] ?>"/>
              <input type="submit" name="delete" value="Delete">
            </form>
          </td>
        </tr>
      <?php
        }
      ?>
    </table>
  </div>

  <div class="container">
    <form method="POST">
      <input type="text" placeholder="Username" name="username" required/>
      <input type="password" placeholder="Password" name="password" required/>
      <input type="text" placeholder="First Name" name="fname" required/>
      <input type="text" placeholder="Last Name" name="lname" required/>

      <input type="submit" name="register" value="Submit"/>
    </form>
  </div>
</body>

</html>