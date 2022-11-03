<?php
session_start();
?>



<link rel="stylesheet" href="loginstyle.css">


<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" action='login_check.php' method="post">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
                    <h1>  <i> Log In </i> </h1> <br> <br>
                    <label for="username"> Username</label>
					<input type="text" class="login__input" placeholder="User name " name='username'>
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
                    <label for="username"> Password </label>

					<input type="password" class="login__input" placeholder="Password" name='password'>
				</div>
				<button class="button login__submit" type="submit" name='submit'>
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>			
                <h3 id="h3"> Do not have an account?    <a href="register.php">  Register Now </a></h3>
	
			</form>
			<div class="social-login">
				<h3></h3>
				
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
















<?php



if(isset($_SESSION['usernameCheck']) and isset($_SESSION['passwordCheck'])){
    $username=$_SESSION['usernameCheck'];
    $password= $_SESSION['passwordCheck'];
    echo "<script>
    document.getElementById('username').value='$username';
    
    document.getElementById('password').value='$password';
    
    </script>";
}
?>
<?php 
if($_GET){
    $display=$_GET['logincheck'];
    echo "<script>
    window.alert('$display');
        </script>";
}
?>