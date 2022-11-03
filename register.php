

<link rel="stylesheet" href="registersheet.css">

<html>
  <head>
    <meta charset="utf-8">
    <title>Form</title>
    <link href="css/registersheet.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>


  
    <!-- Body of Form starts -->
  	<div class="container">
      <form method="post" autocomplete="on" action="registercheck.php">

        <!--First name-->
        <H1 style="color:orange">>>> Register Form<<<</H1>
    		<div class="box">
                 
          <label for="firstName" class="fl fontLabel">  Username: </label>
    			<div class="new iconBox">
            <i class="fa fa-user" aria-hidden="true"></i>
          </div>
    			<div class="fr">
    					<input type="text" name="username" placeholder="Username"
              class="textBox" autofocus="on" required>
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!--First name-->


        <!--Second name-->
    		<div class="box">
          <label for="emaiil" class="fl fontLabel"> Email address: </label>
    			<div class="fl iconBox"><i class="fa fa-user" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="email" required name="email"
              placeholder="Email" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!--Second name-->


    		<!---Phone No.------>
    		<div class="box">
          <label for="phone" class="fl fontLabel"> Phone No.: </label>
    			<div class="fl iconBox"><i class="fa fa-phone-square" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="number" required name="phone"  placeholder="Phone No." class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!---Phone No.---->


    		


    		<!---Password------>
    		<div class="box">
          <label for="password" class="fl fontLabel"> Password </label>
    			<div class="fl iconBox"><i class="fa fa-key" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="Password" required name="password" placeholder="Password" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!---Password---->

    		


    		<!--Terms and Conditions------>
    		<div class="box terms">
    				<input type="checkbox" name="Terms" required> &nbsp; I accept the terms and conditions
    		</div>
    		<!--Terms and Conditions------>



    		<!---Submit Button------>
    		<div class="box" style="background: #2d3e3f">
    				<input type="Submit" name="submit" class="submit" value="SUBMIT">
    		</div>

    		<!---Submit Button----->
              <h2 id="log">Already have an account? <a href="login.php"> Log in Now</a></h2>
      </form>
  </div>
  <!--Body of Form ends--->
  </body>
</html>


<?php
session_start();

if($_GET){
     $display=$_GET['registererror'];
     echo "<script>
     window.alert('$display');
         </script>";
 }
if(isset($_SESSION['username'])){
     $username=$_SESSION['username'];
     echo "<script>
     document.getElementById('username').value='$username';
     </script>";
}
if(isset($_SESSION['password'])){
     $password=$_SESSION['password'];
     echo "<script>
     document.getElementById('password').value='$password';
     </script>";
}

if(isset($_SESSION['email'])){
     $email=$_SESSION['email'];
     echo "<script>
     document.getElementById('email').value='$email';
     </script>";
}
if(isset($_SESSION['phone'])){
     $phone=$_SESSION['phone'];
     echo "<script>
     document.getElementById('phone').value='$phone';
     </script>";
}



?>