<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>


<!doctype html>
<html >
  <head>
    
  <link href="index.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <script src="https://kit.fontawesome.com/248d218fad.js" crossorigin="anonymous"></script>
    
    <title>Lernio LogIn!</title>
  </head>
  <body>
  
     <div class="circle"> </div>
    <div class="circle2"></div>
    
    
      <div class="username">
      <a class="nav-linkp" href="#"> <i class="far fa-user"><?php echo "Welcome ". $_SESSION['username']?></i></a>
     
      
      <div class="next">
        <a href="home.html">
        <button>Concure a day </button>
        </a>
      </div>
      </div>

     
      
      
      
     
     

  </body>
</html>