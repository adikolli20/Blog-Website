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
  </div>
</div>
<?php

session_start();
if(isset($_SESSION['username']) and isset ($_SESSION['password'])){
  ?>


<link rel="stylesheet" href="login.css">

<?php

$id=$_GET['id'];
$conn = mysqli_connect('localhost','ari','test1234','register');
$sql= "SELECT * FROM `post` where `id`=$id;";
$result= mysqli_query($conn,$sql);
$infos = mysqli_fetch_all($result,MYSQLI_ASSOC);
$title=($infos[0]['title']);
$comment=($infos[0]['comment']);
$content=($infos[0]['content']);
$date=($infos[0]['date']);
$link=($infos[0]['link']);
$username=($infos[0]['username']);
$photolink=($infos[0]['imagelink']);
$_SESSION['postid']=$id;
$reviewsql="SELECT * FROM `comment` WHERE postId=$id;";
    $result= mysqli_query($conn,$reviewsql);
        $commentResult = mysqli_fetch_all($result,MYSQLI_ASSOC);
         $size=sizeof($commentResult);
      
echo '<section id="main">';
echo  ' <article class="col">';
echo "<a href='#' title=''><img width='240' height='100' alt='img' class='thumbnail' src='$photolink'  /></a>   ";
echo '<div class="top">';
echo "<h4><a href='#'>$title</a></h4>";
echo "<p><span class='datetime'> $date </span><a class='comment' href='showcomments2.php?postid='.$id> $size Review</a></p>";
echo "</div>
<div class='content'>";
echo " <p> $content </p>";
echo "<h5> Comments :</h5>";
echo  "<p> $comment</p>";
echo "<p><a href='$link' class='more'>continue reading</a></p>";
echo "<h4> Post created by $username </h4>";
echo "<br> <br> ";
echo "<form action='commentcheck.php' method='Post'>";
echo "<Label for='comment' > <h1> Add a comment</h1> </label>";
echo "<textarea rows = '5' cols = '60'  name='comment'  required>"; 
echo "</textarea>";
echo "<br> <br> ";
echo '
  <div class="rate">
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="text">1 star</label>
  </div>

';
echo "<br> <br> ";
echo "<input type='submit' value='Save Comment' name='submit' class='savebttn'>";
echo "<br> <br> ";
ECHO "<form>";
echo "</div> ";


echo " </article>";


?>

<?php

?>







<?php



       }
       else{
            header("Location:login.php");
       }
?>






































