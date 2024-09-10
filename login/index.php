<?php
session_start();

if(isset($_SESSION["id"])){
  header("location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sql Injection</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="main">
    <div id="header">
      <h1>User Login</h1>
    </div>
    <div id="content">
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="form-group">
          <label>Username</label>
          <input  type="text" name="username" autocomplete="off" />
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" />
        </div>
      <div style = "display:flex; ">
        <input type="submit" class="btn" name="login" id="submit" value="Submit" />
        <a href = "register.php" > Register here </a>     
        </div>
      </form>
     
      <?php
      
      if(isset($_POST['login'])){

        $conn = mysqli_connect("localhost", "root", "", "login") or die("connection-failed");


        if($_POST['username'] != "" && $_POST['password'] != ""){

          
  
          $_username = mysqli_real_escape_string($conn, $_POST['username']);
          $_password = md5($_POST['password']);

          $sql = "SELECT id, name FROM register WHERE username = '{$_username}' AND password = '{$_password}' ";
          $result = mysqli_query($conn, $sql) or die("query-failed");
    
          if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
              session_start();
    
              $_SESSION["id"] = $row['id'];
              $_SESSION["name"] = $row['name'];
              header("location: dashboard.php");
    
            }
          }else{
            echo "<div>Username and Password are not matched</div>";
          }
          }else{
            echo "please enter the feilds";
          }
         
        }
      ?>
      
    </div>
  </div>
</body>
</html>