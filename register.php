<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}


?>


<!doctype html>
<html >
  <head>
  <link href="index.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  
  <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            
        <title>student register</title>
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

      <button class="admin_button">
         <a class="admin_link" href="admin_login.php" >Admin-logIn</a>
     </button>
      </div>

    

     
<div class="regBg">
    <h1>“People expect to be bored by eLearning—
        <br>let’s show them it doesn’t have to be like that through Learnio ...</h1>
 </div>   
<div class="registercontainer">
<form action="" method="post">

  <div class="textName">
    <input type="text" class="form-control" name="Name" placeholder="Name" required><br>
    <input type="text" class="form-control" name="Mobile_No" placeholder="Moblie_No" required><br>
    <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="username"><br>
    <input type="password" class="form-control" name ="password" id="inputPassword4" placeholder="Password"><br>
    <input type="password" class="form-control" name ="confirm_password" id="inputPassword" placeholder="Confirm Password"><br>
   <button type="submit" class="btn-btn-primary">Sign in</button>
   </div>
 </form>
 
</div>


   
    
     


</body>
</html>




