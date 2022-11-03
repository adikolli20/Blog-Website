<?php

if( $_SESSION['username']='admin'){

    $conn = mysqli_connect('localhost','ari','test1234','register');
$id=$_POST['userid'];
$selectsql= "SELECT * FROM `users` WHERE `users`.`id` = $id ;";

$result= mysqli_query($conn,$selectsql);
$infos = mysqli_fetch_all($result,MYSQLI_ASSOC);
$username=$infos[0]['username'];

$conn = mysqli_connect('localhost','ari','test1234','register');
$sql = "DELETE FROM `users` WHERE `users`.`id` = $id;";

if($result= mysqli_query($conn,$sql)){
    if($username=="admin"){
        header("Location:login.php");
    }
    else {
        header("Location:adminheader.php");
    }
    
}
else{
    header("Location:login.php");
}

}
else {
    header("Location:login.php");
}


?>