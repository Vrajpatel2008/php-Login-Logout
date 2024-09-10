<div>
    <div class="container">
        <h2>Add employee:</h2>
        <form class="form" action="<?php $_SERVER['PHP_SELF']; ?>" method = "post">
                <div class="add-form">
                    <label>Name</label>
                    <input type="text" name="name" />
                </div>
                <div class="add-form">
                    <label>Username</label>
                    <input type="text" name="username" />
                </div>
                
                <div class="add-form">
                    <label>password</label>
                    <input type="password" name="password" />
                </div>
                <input type="submit" name="submit" value="register"/>
        </form>

        <?php
        
        if(isset($_POST['submit'])){

            $conn = mysqli_connect("localhost", "root", "", "login") or die("connection-failed");

            $_name = mysqli_real_escape_string($conn, $_POST['name']);
            $_username = mysqli_real_escape_string($conn, $_POST['username']);
            $_password = md5($_POST['password']);

            $sql = "INSERT INTO register(name, username, password) VALUES('{$_name}','{$_username}','{$_password}')";
            $result = mysqli_query($conn, $sql) or die("query-failed");

            header("location: index.php");
            mysqli_close($conn);
        }
        
        ?>
        
    </div>
</div>