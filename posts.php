

<?php
session_start();

if(isset($_SESSION['username']) and isset ($_SESSION['password'])){
  ?>



<html> 
<style> 
table, th, td {
  border: 10px solid grey;

}



</style>
<link rel="stylesheet" href="header.css">
<head> 
    <Title> All Posts </Title>
</head>

<body>
<div class="header">
  <a href="#default" class="logo">My Blog</a>
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
   
    <Label> Category </Label>
    <form action="posts.php" method="post">
    <select name="category" id="category">
       <option value="default"> All news</option>
        <option value="dailynews">Culture News</option>
        <option value="sport">Sport</option>
        <option value="Fashion">Fashion</option>
        <option value="politics">Politics</option>
        </select>  
        <button name="search" type="submit">Search </button>
    </form>
    
  
   

  </div>


  
</div>


<?php 
if (isset($_POST['search'])){
    $selectedcategory= $_POST['category'];



$conn = mysqli_connect('localhost','ari','test1234','register');
$sql= "SELECT * FROM `post` ;";
$result= mysqli_query($conn,$sql);
$infos = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo "<table>";
echo "<tr>";

if($selectedcategory=="default"){


    for($i=0;$i<sizeof($infos);$i=$i+1){
        $title=($infos[$i]['title']);
        $comment=($infos[$i]['comment']);
        $content=($infos[$i]['content']);
        $date=($infos[$i]['date']);
        $link=($infos[$i]['link']);
        $username=($infos[$i]['username']);
        $photolink=($infos[$i]['imagelink']);
        $id=($infos[$i]['id']);
        $category=($infos[$i]['category']);
        $reviewsql="SELECT * FROM `comment` WHERE postId=$id;";
        $result= mysqli_query($conn,$reviewsql);
            $commentResult = mysqli_fetch_all($result,MYSQLI_ASSOC);
             $size=sizeof($commentResult);
             echo "<td>";
    
                echo '<section id="main">';
                echo  ' <article class="col">';
                echo "<a href='#' title=''><img width='240'  alt='img' class='thumbnail' src='$photolink'  /></a>   ";
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
                        echo "<a href='comment.php?id=$id' > Add a Review </a>";
                echo "</div> ";
                echo " </article>";
             echo "</td>";
             if(($i+1)%5==0){
                echo "</tr>";
                echo "<tr>";
            }
    
    }


}
else {


    $j=0;
    for($i=0;$i<sizeof($infos);$i=$i+1){
        $title=($infos[$i]['title']);
        $comment=($infos[$i]['comment']);
        $content=($infos[$i]['content']);
        $date=($infos[$i]['date']);
        $link=($infos[$i]['link']);
        $username=($infos[$i]['username']);
        $photolink=($infos[$i]['imagelink']);
        $id=($infos[$i]['id']);
        $category=($infos[$i]['category']);
        $reviewsql="SELECT * FROM `comment` WHERE postId=$id;";
        $result= mysqli_query($conn,$reviewsql);
            $commentResult = mysqli_fetch_all($result,MYSQLI_ASSOC);
             $size=sizeof($commentResult);
            
             if($category==$selectedcategory){
                echo "<td>";
                echo '<section id="main">';
                echo  ' <article class="col">';
                echo "<a href='#' title=''><img width='240' height='100' alt='img' class='thumbnail' src='$photolink'  /></a>   ";
                echo '<div class="top">';
                echo "<h4><a href='#'>$title</a></h4>";
                echo "<p><span class='datetime'> $date </span><a class='comment'  href='showcomments.php?postid=$id'> $size Review</a></p>";
                echo "</div>
                <div class='content'>";
                echo " <p> $content </p>";
                echo "<h5> Comments :</h5>";
                echo  "<p> $comment</p>";
                echo "<p><a href='$link' class='more'>continue reading</a></p>";
                echo "<h4> Post created by $username </h4>";
                        echo "<a href='comment.php?id=$id' > Add a Review </a>";
                echo "</div> ";
                echo " </article>";
                echo "</td>";
                $j=$j+1;
                if(($j+1)%5==0){
                    echo "</tr>";
                    echo "<tr>";
                }
             }
    
    }
    



    
}

 


}

echo "</tr>";
echo "</table>";

// ?>




</body>





</html>






<?php



       }
       else{
            header("Location:login.php");
       }
?>
















