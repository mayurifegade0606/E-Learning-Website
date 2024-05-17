//log in form script
var x=document.getElementById("login");
var y=document.getElementById("register");
var z=document.getElementById("btn");
                          
function register()
        {
          x.style.left="-400px";
          y.style.left="50px";
          z.style.left="110px";
        }
 function login()
          {
           x.style.left="50px";
           y.style.left="450px";
           z.style.left="0px";
          }
              //log in form script end
                              
                          

//Tutorial secton script
function openTopic(evt, topicName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(topicName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  
  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
  //Tutorial secton script end


     









  <!doctype html>
<html>
    <head>
        <Title>Log_In</Title>
        <link rel="stylesheet" href="Index.css">
        <script src="https://kit.fontawesome.com/248d218fad.js" crossorigin="anonymous"></script>
    </head>
    <body>
        
        <div class="header">
       
            <nav>
                <div class="logo">
                    <img src="capstonelogo.png">
                </div>
                <ul>
           
                             <li class="active"><a href="Home.html" > <i class="fas fa-home"></i>Home</a></li>
                             <li><a href="About_us.html" ><i class="fas fa-address-card"></i>About_us</a></li>
                             <li><a href="cources.html" ><i class="fas fa-book-reader"></i>Courses</a></li>
                             <li><a href="Contact_us.html" ><i class="fas fa-user-circle"></i></i>Contact_us</a></li>
                             <li><a href="Log_in.html" ><i class="fas fa-user"></i>Log_in</a></li>
                        </ul>
                         </nav>
                 </div>
                 
    <div class="loginNav">
    <nav>
            <ul>
           
           <li class="active"><a href="login.php" > Log_In</a></li>
           <li><a href="register.php" >Register</a></li>
           <li><a href="logout.php" >Log_Out</a></li>
           </ul>
</nav>
 </div>

 <div class="form-box">
 <form action="" method="post">
                                <input type="text"    id="inputemail" name="username" class="input-field" placeholder="Name" required >
                                <input type="password" id="inputPassword"  name="password" class="input-field" placeholder=" Password" required>
                                <input type="password" id="inputPassword1" name="confirm_password" class="input-field" placeholder=" confirm Password" required>
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </form>
                           
 </div>