  
<?php
   session_start();

if(isset($_SESSION['username']) and isset ($_SESSION['password'])){
  ?>




<?php

$title=$_POST['title'];
$content=$_POST['content'];
$date=$_POST['date'];
$photolink=$_POST['photolink'];
$comment=$_POST['comment'];
$link=$_POST['link'];
$link=$_POST['link'];
$category = $_POST['category'];
$username=$_SESSION['username'];

$conn = mysqli_connect('localhost','ari','test1234','register');

if(!isset($conn)){
    $error="Posting Failed. Try Again";
    header('Location:addnew.php?error='.$error);
}
else{
    $sql = "INSERT INTO `post` ( `title`, `content`, `date`, `imagelink`, `comment`,`link`,`username`,`category`) VALUES ('$title', '$content', '$date', '$photolink', '$comment','$link','$username','$category');";
    if(mysqli_query($conn,$sql)){
           
        header("Location:header.php");
    }
    else{
        $error= "An error occured .Please try again";
        header("Location:addnew.php?error=".$error);
    }
}



?>

<?php



       }
       else{
            header("Location:login.php");
       }
?>























































