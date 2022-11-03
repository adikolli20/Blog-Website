<head> 

<link rel="stylesheet" href="header.css">
</head>


<body>

<div class="header">
  <a href="#default" class="logo">MyBlog</a>
  <div class="header-right">
   <?php 
   session_start();
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



<?php


if(isset($_SESSION['username']) and isset ($_SESSION['password'])){
  ?>



<html>
<head> 
<title> Add a new Post in the blog page...</title>

<link rel="stylesheet" href="form.css">
</head>


<body>




<div class="general">

<div class="contact-us">
  <form action="savenews.php" method="POST">
    <label for="title">Title of post <em>&#x2a;</em></label>
    <input id="title" name="title" required type="text" />
    <label for="content">Content <em>&#x2a;</em></label>
    <input id="content" name="content" required="" type="text" />
    <label for="date">Date Posted</label>
    <input id="date" name="date"  type="date" />
    <label for="photolink">Image Link</label>
    <input id="photolink" name="photolink" type="text" />
    <label for="comment">YOUR Comment <em>&#x2a;</em></label>
    <input id="comment" name="comment"  type="text" /> 

    <label for="category">Category<em>&#x2a;</em></label>
   
    <select name="category" id="category" require>
       
        <option value="dailynews">Culture News</option>
        <option value="sport">Sport</option>
        <option value="Fashion">Fashion</option>
        <option value="politics">Politics</option>
        </select>  

    <label for="link">Enter Link to your full Material <em>&#x2a;</em></label>
    <input id="link" name="link"  type="text" required /> 

       <h3>
      Please provide all the information about your post.
      <input type="submit" name='submit' value='Submit' class="submit">
    </h3>
  </form>
</div>




</div>     




</body>





</html>
<?php
       }
       else{
            header("Location:login.php");
       }
?>






