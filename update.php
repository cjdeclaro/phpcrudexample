<?php
  include("connect.php");

  if(isset($_POST["update"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];
    $id = $_GET["id"];

    $query = "
      UPDATE Users
      SET username = '$username',
      password = '$password',
      first_name = '$firstname',
      last_name = '$lastname'
      WHERE id = '$id';
    ";
    executeQuery($query);
    header("Location: index.php");
  }

  if(!isset($_GET["id"])){
    header("Location: index.php");
  } else {
    $userid = $_GET["id"];
    $query = "SELECT * FROM Users WHERE id='$userid'";
    $result = executeQuery($query);

    $username = "";
    $password = "";
    $firstname = "";
    $lastname = "";

    while ($row = mysqli_fetch_array($result)) {
      $username = $row['username'];
      $password = $row['password'];
      $firstname = $row['first_name'];
      $lastname = $row['last_name'];
    }
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
      width: 500px;
      margin: auto;
      border: 2px solid black;
      border-radius: 20px;
      height: 300px;
      padding: 20px;

    }

    h2{
      padding: 20px;
    }
  </style>
</head>

<body style="margin: 0px">
  <div class="header">
    <h2>Update <?php echo "$adminusername"?></h2>
  </div>

  <div class="container">
    <form method="POST">
      <input type="text" placeholder="Username" name="username" value="<?php echo $username ?>" required/>
      <input type="password" placeholder="Password" name="password" value="<?php echo $password ?>" required/>
      <input type="text" placeholder="First Name" name="fname" value="<?php echo $firstname ?>" required/>
      <input type="text" placeholder="Last Name" name="lname" value="<?php echo $lastname ?>" required/>

      <input type="submit" name="update" value="Submit"/>
    </form>
  </div>
</body>

</html>