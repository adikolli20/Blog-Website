

<?php
session_start();

if(isset($_SESSION['username']) and isset ($_SESSION['password'])){
  ?>



<?php

$title=htmlspecialchars($_POST['title']);
$content=htmlspecialchars($_POST['content']);
$imagelink=htmlspecialchars($_POST['imagelink']);
$place=htmlspecialchars($_POST['place']);
$date=htmlspecialchars($_POST['date']);
$entry=htmlspecialchars($_POST['entry']);
$username=htmlspecialchars($_SESSION['username']);
$conn = mysqli_connect('localhost','ari','test1234','register');

// echo $title." ";
// echo $content." ";
// echo $imagelink." ";
// echo $place." ";
// echo $username." ";
// echo $date." ";
// echo $entry." ";
if(!isset($conn)){
    $error="Posting Failed. Try Again";
    header('Location:addblog.php?error='.$error);
}
else{
    $sql = "INSERT INTO `reminder` ( `title`, `content`, `imagelink`, `username`, `date`, `place`, `entry`) VALUES ( '$title', '$content', '$imagelink', '$username', '$date', '$place', '$entry');";
    if(mysqli_query($conn,$sql)){
           
        header("Location:header.php");
    }
    else{
        $error= "An error occured .Please try again";
        header("Location:addblog.php?error=".$error);
    }
}

?>



<?php
       }
       else{
            header("Location:login.php");
       }
?>


























