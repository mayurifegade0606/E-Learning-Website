<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: welcome.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: welcome.php");
                            
                        }
                    }

                }

    }
}    


}


?>

<!doctype html>
<html >
  <head>
  <link href="index.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <title>PHP login system!</title>
  </head>
  <body>
  
  <div class="log_nav ">
    
    <button class="nav-item">
      <a class="nav-link" href="register.php">Register</a>
    </button>

    <button class="nav-item">
      <a class="nav-link" href="login.php">Login</a>
    </button>

    <button class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </button>
    
   </div>
   <div class="loginBg">
     <h1>Welcome back to Learnio</h1>
     <h3>Log in and discover a greate amount of opportunities...!</h3>
   </div>
<div class="registercontainer1">
 
  <div class="registercontainer2">
<form action="" method="post">
  <input type="text" class="form-control1" name="username" id="inputEmail4" placeholder="username"><br>
    <input type="password" class="form-control1" name ="password" id="inputPassword4" placeholder="Password"><br>
    
    <a href="welcome.php">
   <button type="submit" class="btn-btn-primary1">Log in</button>
   </a>
   
 </form>
 </div>
</div>


   
</body>
</html>




