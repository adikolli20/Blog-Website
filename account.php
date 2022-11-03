<?php
session_start();
if(isset($_SESSION['username']) and isset ($_SESSION['password'])){




$username=$_SESSION['username'];
$password=$_SESSION['password'];
$email=$_SESSION['email'];
$phone=$_SESSION['phone'];
$id=$_SESSION['id'];


     
          ?>
          <html> 
          <link rel="stylesheet" href="account.css">
          <head> 
              <title>My Account</title>
              
          
              <div class="header">
            <a href="#default" class="logo">MyBlog</a>
            <div class="header-right">
            <?php 
      if($_SESSION['username']=="admin"){
          echo ' <a class="active" href="adminheader.php">Home</a>';
      }
      else {
          echo '<a class="active" href="header.php">Home</a>';
      }
      ?>
              <a href="posts.php">Posts</a>
              <a href="blogs.php">Blogs</a>
              <a href="addnew.php">Add a news</a>
              <a href="account.php">Account</a>
              <a href="logout.php">Log out</a>
              <?php 
              if($_SESSION['username']!="admin"){
               echo '<a class="active" href="personaldelete.php">Delete My Account</a>';
              }
              ?>
            </div>
          </div>
          </head>
          
          <body>
          <form class="form" method="Post" action="updateAcc.php">
          
          <h2>My Account</h2>
          <p type='Id'></p>
          <input type="number" name='id' readonly  value=<?php echo $id?>>
          <p type='Username'></p>
          <?php 
          if($_SESSION['username']=="admin"){
              echo "   <input type='text' readonly name='username' value= $username>";
              echo "<p type='Email'></p> <br> <br> 
          <input type='text' name='email' value= $email>
          <p type='Phone'></p>
          <input type='number' name='phone' value=$phone>
          <p type='Password'></p>
          <input type='text' name='password' readonly value= $password>
         
              ";
          }
          else {
               
               echo "   <input type='text'  name='username' value= $username>";
               echo "<p type='Email'></p> <br> <br> 
           <input type='text' name='email' value= $email>
           <p type='Phone'></p>
           <input type='number' name='phone' value=$phone>
           <p type='Password'></p>
           <input type='text' name='password'  value= $password>
          
               ";

          }
          ?>
         
          <button type='submit' class="button" name='submit'>Edit Profile</button>
          
          </form>
          
          
          </body>
          
          
          </html>
          
          <?php
          }
          else{
               header("Location:login.php");
          }
          
          ?>
          
          
          
          <?php
          
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
          


