<?php
$conn = mysqli_connect("localhost","root","","micro_project");
if(!$conn)
{
die('Connection Failed'.mysql_error());
}
if(isset($_POST['register']))
{

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $isValid=true;
    if($isValid){
        $sql="INSERT INTO tbl_register(username,email,pswd) VALUES('$username' , '$email' , '$password')";
    mysqli_query($conn, $sql);

    }

 

}



?>

<?php
if(isset($_POST['logsubmit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "select * from tbl_register where username = '$username' and pswd = '$password'";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  mysqli_select_db($conn, 'micro_project');
  

  if($count == 1 ){
    header("Location: index.html");
   
  }
  else {
    echo "<script type='text/javascript'>alert('User Doesn't Exits!!!!')</script>";
  }
}


?>

<!-- <script>
      function load() {
    document.getElementById("regForm").style.display = "block";
    document.getElementById("loginForm").style.display = "none";
}
function change() {
    document.getElementById("regForm").style.display = "none";
    document.getElementById("loginForm").style.display = "block";
}
      $(function () {

         $("#uname_error_message").hide();
         $("#email_error_message").hide();
         $("#pswd_error_message").hide();
         

         var error_uname = false;
         var error_email = false;
         var error_pswd = false;
         
         $("#uname").focusout(function () {
            check_fname();
         });
        
         $("#remail").focusout(function () {
            check_email();
         });
         $("#pswd").focusout(function () {
            check_password();
         });
        
         function check_fname() {
            var pattern = /^[a-zA-Z]*$/;
            var fname = $("#uname").val();
            if (pattern.test(fname) && fname !== '') {
               $("#uname_error_message").hide();
               $("#uname").css("border-bottom", "2px solid #34F458");
            } else {
               $("#uname_error_message").html("Should contain only Characters");
               $("#uname_error_message").show();
               $("#uname").css("border-bottom", "2px solid #F90A0A");
               error_fname = true;
            }
         }
         function check_email() {
            var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var email = $("#remail").val();
            if (pattern.test(email) && email !== '') {
               $("#email_error_message").hide();
               $("#remail").css("border-bottom", "2px solid #34F458");
            } else {
               $("#email_error_message").html("Invalid Email");
               $("#email_error_message").show();
               $("#remail").css("border-bottom", "2px solid #F90A0A");
               error_email = true;
            }
         }
         function check_password() {
            var password_length = $("#pswd").val().length;
            if (password_length < 8) {
               $("#password_error_message").html("Atleast 8 Characters");
               $("#password_error_message").show();
               $("#pswd").css("border-bottom", "2px solid #F90A0A");
               error_password = true;
            } else {
               $("#password_error_message").hide();
               $("#pswd").css("border-bottom", "2px solid #34F458");
            }
         }

        });
        </script>      -->
<!--  -->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="style.css"> 
        <link rel="stylesheet"href="https://fonts.google.com/share?selection.family=Poppins:wght@300;400;500;600;700">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    </head>
    <body>
        
    

        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="images\logo-removebg-preview.png" width="100px" height="65px">
                </div>
                <nav>
                    <ul id="menuitems">
                        <li><a href="images/">Home</a></li>
                        <li><a href="products.html">Products</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                        <li><a href="account.html">Account</a></li>
                    </ul>
                </nav>
                <img src="images\cart.png" width="30px" height="30px">
                <img src="images\menu.png" width="30px" height="30px" class="menu-icon" onclick="menutoggle()">
            </div>
            
        </div>
    
    <!----------Account page ------->
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="images\hcam-removebg-preview.png" width="100%">
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Register</span>
                            <hr id="indicator">
                        </div>
                        <form id="loginForm" action="" method="post" >
                            <input type="text" placeholder="Username" name="username" id="username">
                            
                            <input type="password" placeholder="Password" name="password" id="password">
                            
                            <button type="submit" class="btn" name="logsubmit">Login</button>
                            <a href="">Forgot Password</a>
                        </form>
                        <form id="regForm" action="" method="post" >
                            <input type="text" placeholder="Username" name="uname">
                            <span class="error_form" id="uname_error_message"></span>
                            <input type="text" placeholder="Email" name="remail" id="email">
                            <span class="error_form" id="email_error_message"></span>
                            <input type="password" placeholder="Pswd" name="password">
                            <span class="error_form" id="pswd_error_message"></span>
                            <button type="submit" class="btn"  name="register">Register</button>
                            
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <!-----footer section----->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and ios mobile phone.</p>
                    <div class="app-logo">
                        <img src="images\play-store.png">
                        <img src="images\app-store.png">
                    </div>
                    
                </div>
                <div class="footer-col-2">
                    <img src="images\logo.png">
                    
                    <p>Our purpose is to sustainably Make the pleasure and Benefits ofSports Accessible
                        to the Many
                    </p>
                    
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                   <ul>
                    <li> Coupons</li>
                    <li> Blog Posts</li>
                    <li> Return Policy</li>
                    <li> Join Affiliate</li>
                    
                    
                   </ul>
                    
                </div>
            
                <div class="footer-col-4">
                <h3>Follow us</h3>
               <ul>
                <li> Facebook</li>
                <li> Twitter</li>
                <li> Instagram</li>
                <li> Youtube</li>
                
                
               </ul>
                
            </div>
                </div>
       
                <hr>
                <p class="copyright">Copyright 2022</p>
        </div>     
     
    </div>
    <script>
        var menuitems=document.getElementById("menuitems");
        menuitems.style.maxHeight="0px";
        function menutoggle(){
            if(menuitems.style.maxHeight=="0px"){
                menuitems.style.maxHeight="200px";
            }
            else{
                menuitems.style.maxHeight="0px";
            }
        }
    </script>
    <!--------login form js-------->
    <script type="text/javascript">
        var loginForm = document.getElementById("loginForm");
        var regForm = document.getElementById("regForm");
        var indicator = document.getElementById("indicator");
    
        function register() {
            regForm.style.transform = "translateX(0px)";
            loginForm.style.transform = "translateX(0px)";
            indicator.style.transform = "translateX(100px)";
     }
        function login() {
            regForm.style.transform = "translateX(300px)";
            loginForm.style.transform = "translateX(300px)";
            indicator.style.transform = "translateX(0px)";
     
     }
  /*validation
  const form = document.querySelector('#loginForm');
const pass_reg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

let username = form.elements.namedItem("username");
let password = form.elements.namedItem("password");

username.addEventListener('input', validate);
password.addEventListener('input', validate);

form.addEventListener('submit', function (e) {
 e.preventDefault();
 
 alert('SUBMITTED');
 return true;
});

function validate (e) {
 if (e.target.name == "password") {
  if (pass_reg.test(e.target.value)) {
   e.target.classList.add('valid');
   e.target.classList.remove('invalid');
  } else {
   e.target.classList.add('invalid');
   e.target.classList.remove('valid');
  }
 }
 
 if (e.target.name == "username") {
  if (e.target.value.length > 3) {
   e.target.classList.add('valid');
   e.target.classList.remove('invalid');
  } else {
   e.target.classList.add('invalid');
   e.target.classList.remove('valid');
  }
 }
}


  */

  </script> 


    
       
    </body>
</html>