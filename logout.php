
<?php
session_start();


if(isset($_SESSION['username']) and isset ($_SESSION['password'])){
  ?>


<?php



if(isset($_SESSION['username']) &&  isset($_SESSION['password'])){

  //setcookie("username" ,$_SESSION['username'],time()+84600);
  //setcookie("password" ,$_SESSION['password'],time()+84600);
     session_destroy();
     header("Location:login.php");  
}
else{
  session_destroy();
    header("Location:login.php");
}


?>

<?php
       }
       else{
            header("Location:login.php");
       }
?>

































   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   






























