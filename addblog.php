<!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
<!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet"> -->
<?php
session_start();
?>

<head> 

<link rel="stylesheet" href="header.css">
</head>


<body>

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
  </div>
</div>
<br> <br> <br> <br> 

<?php
if(isset($_SESSION['username']) and isset ($_SESSION['password'])){
  ?>
<link rel="stylesheet" href="styleblog.css">
<div class="container">
  <form method="Post" action="blogcheck.php">
    <p>Creating a new Reminder ...  </p>
    <input type="text" placeholder="Title" name='title' required><br>
    <input type="text" placeholder="Description" name='content' required><br>
    <input type="text" placeholder="Image Link" name='imagelink' required><br>
    <input type="text" placeholder="Place" name='place' required><br>
    <input type="date" placeholder="Date" name='date' required><br>
    <input type="text" placeholder="Entry Fee" name='entry' required><br>


    <input type="submit" value="Submit"><br>
    
  </form>

</div>
<?php
       }
       else{
            header("Location:login.php");
       }
       
       ?>
       

