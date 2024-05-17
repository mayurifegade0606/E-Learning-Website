<?php
    require("connection.php");
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Login Form </title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="center">
      <h1>Admin Login</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" required  name="AdminName">
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" required  name="AdminPassword">
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" value="Login" name="signin">
        <div class="signup_link">
          Not a member? <a href="#">Signup</a>
        </div>
      </form>
    </div>

    <?php
    if (isset($_POST['signin']))
    {
      $query="SELECT * FROM `admin_login` WHERE `Admin_Name`='$_POST[AdminName]' AND `Admin_Password`='$_POST[AdminPassword]'";
     $result=mysqli_query($con,$query);
     if (mysqli_num_rows($result)==1)
     {
       session_start();
       $_SESSION['AdminLoginId']=$_POST['AdminName'];
       header("location: admin_panel.php");
     }
     else
     {
       echo"<script>alert('Incorrect password');</script>";
     }

    }
    ?>

  </body>
</html>