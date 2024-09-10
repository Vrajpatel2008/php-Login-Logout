<?php
session_start();

if(!isset($_SESSION["id"])){
  header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="main">
    <div id="header" class="dashboard">
      <h1>Dashboard</h1>
      <div class="user-info">
        <span>Hello</span>
        <a  href="logout.php">Logout</a>
      </div>
    </div>
    <div id="content">
        <h2>Welcome to Dashboard</h2>
    </div>
  </div>
</body>
</html>

