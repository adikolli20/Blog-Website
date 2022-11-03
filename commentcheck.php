
<?php

session_start();
if(isset($_SESSION['username']) and isset ($_SESSION['password'])){
  ?>


<?php


$comment= htmlspecialchars(  $_POST['comment']);
$conn = mysqli_connect('localhost','ari','test1234','register');
$postid=$_SESSION['postid'];
$userid=$_SESSION['id'];

$sql = "INSERT INTO `comment` (`postId`, `comment`,`userid`) VALUES ('$postid', '$comment','$userid');";


if(mysqli_query($conn,$sql)){
   
    header("Location:header.php");
}
else{
    $error= "An error occured .Please try again";
}



?>



<?php



       }
       else{
            header("Location:login.php");
       }
?>
















































