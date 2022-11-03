<?php 
session_start();
    $id=$_SESSION['id'];
    echo $id;

 
    
    $conn = mysqli_connect('localhost','ari','test1234','register');
    $sql = "DELETE FROM `users` WHERE `users`.`id` = $id;";
    
    if($result= mysqli_query($conn,$sql)){
     
        
            header("Location:login.php");
        
        
    }
    else{
        echo "An error occured";
    }
    
    
    
    
    




?>