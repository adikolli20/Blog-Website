
<?php

session_start();
if(isset($_SESSION['username']) and isset ($_SESSION['password'])){
  ?>

<html>
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



<?php
echo '<div class="main-content"> ';
echo '<h1 class="title"> Todays Reminders </h1>';
echo '<div class="b3-3">';
echo '<div class="news">';
$conn = mysqli_connect('localhost','ari','test1234','register');
$sql= "SELECT * FROM `reminder` ;";
$result= mysqli_query($conn,$sql);
$infos = mysqli_fetch_all($result,MYSQLI_ASSOC);
$colors=array('aqua','Aquamarine','Azure','Beige','BlanchedAlmond','Cornsilk','DarkGray','DarkGrey','FloralWhite','GhostWhite','Ivory','LavenderBlush','LightBlue','Linen','MistyRose','OldLace');
 for($i=0;$i<sizeof($infos);$i=$i+1){
$title=$infos[$i]['title'];
$content=$infos[$i]['content'];
$imagelink=$infos[$i]['imagelink'];
$username=$infos[$i]['username'];
$date=$infos[$i]['date'];
$place =($infos[$i]['place']);
$entry= ($infos[$i]['entry']);
$random=rand(0,sizeof($colors)-1);

echo "<div class='fistNews' style='background-color: $colors[$random]; ' > ";
echo "<img src='$imagelink' alt=''  height='240'>";
echo "<h1> $title </h1>";
echo "<p> $content</p>";

echo "<H2>Date : $date</H2>";
echo "<h1> Place : $place </h1>";
echo "<h2> Entry fee : $entry  </h2>";
echo "<H2>Created by : $username</H2>";
echo " </div>";
if(($i+1)%3==0){
    echo    ' </div>';
    echo '<div class="news">';

}
 }
?>
<?php
echo ' </div>
</div>';
echo "<a href='addblog.php'  class='reminderlink'> Add a new Reminder </a>";
?>    


<?php
       }
       else{
            header("Location:login.php");
       }
?>




































