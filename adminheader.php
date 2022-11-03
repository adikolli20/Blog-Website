

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
<a href="#default" class="logo">CompanyLogo</a>
<div class="header-right">
  <a class="active" href="header.php">Home</a>
  <a href="posts.php">Posts</a>
  <a href="blogs.php">Blogs</a>
  <a href="addnew.php">Add a news</a>
  <a href="account.php">Account</a>
  <a href="users.php">Managae Users</a>

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
$colors=array('aqua','LightCoral','Lavender','LightCyan','SkyBlue','Wheat','Beige','LavenderBlush','Linen','MistyRose','OldLace');
if(sizeof($infos)>3){
  
  
  $array=  array();
  $size= sizeof($infos)-1;
  $i=rand(0,$size);

  for($j=0;$j<3;$j=$j+1){
      
      while(TRUE){
          if(in_array($i,$array,TRUE)){
              $i=rand(0,$size);
          }
          else{
              array_push($array,$i);
              break;
          }
      }
      
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
       }
      ?>
      <?php
      echo ' </div>
      </div>';



}
else{


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
}
?>
<?php
echo ' </div>
</div>';
}
?>       

  <div class="recent">


  <div id="content-wrap-home">

<!-- main -->

<?php 
$conn = mysqli_connect('localhost','ari','test1234','register');
$sql= "SELECT * FROM `post` ;";
$result= mysqli_query($conn,$sql);
$infos = mysqli_fetch_all($result,MYSQLI_ASSOC);

$length = sizeof($infos);
$k=0;
if($length>=4){
  $k=$length-4;
  echo   "<h2> 4 Latest news </h2>";

}
else if($length<4 and $length>0){
  echo   "<h2> $length Latest news </h2>";
}

  
for($i=sizeof($infos)-1;$i>=$k;$i=$i-1){
 
      $title=($infos[$i]['title']);
      $comment=($infos[$i]['comment']);
      $content=($infos[$i]['content']);
      $date=($infos[$i]['date']);
      $link=($infos[$i]['link']);
      $username=($infos[$i]['username']);
      $photolink=($infos[$i]['imagelink']);
      $id=($infos[$i]['id']);
      $reviewsql="SELECT * FROM `comment` WHERE postId=$id;";
      $result= mysqli_query($conn,$reviewsql);
          $commentResult = mysqli_fetch_all($result,MYSQLI_ASSOC);
           $size=sizeof($commentResult);
      
  
      echo '<section id="main">';
      echo  ' <article class="col">';
      echo "<a href='#' title=''><img width='240' height='100' alt='img' class='thumbnail' src='$photolink'  /></a>   ";
      echo '<div class="top">';
      echo "<h4><a href='#'>$title</a></h4>";
      echo "<p><span class='datetime'> $date </span><a class='comment' href='showcomments.php?postid=$id'> $size Review</a></p>";
      echo "</div>
      <div class='content'>";
      echo " <p> $content </p>";
      echo "<h5> Comments :</h5>";
      echo  "<p> $comment</p>";
      echo "<p><a href='$link' class='more'>continue reading</a></p>";
      echo "<h4> Post created by $username </h4>";
              
      echo "</div> ";
      echo " </article>";
}



?>



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

























