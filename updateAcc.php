
<?php
   session_start();

if(isset($_SESSION['username']) and isset ($_SESSION['password'])){
  ?>

<?php



   if(isset($_POST['submit'])){

    $pattern = '/^(?=.*[A-Z]).{8,}$/';
    $num = '/^[0-9]{8,}$/';
   $username=htmlspecialchars($_POST['username']);
   $password=htmlspecialchars($_POST['password']);
   $email=htmlspecialchars($_POST['email'] );
   $phone=htmlspecialchars($_POST['phone'] );
    $id=$_POST['id'];


 

   if($username=="" or $username==null or $password=="" or $password==null or $email=="" or $email==null or $phone=="" or $phone==null){
    
    $error= "Please fill all the required fields";
    header("Location:account.php?registererror=".$error);

    
    
   }
  
   
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error= "Please enter a valid email";
        header("Location:account.php?registererror=".$error);
}
    
    else if(!preg_match($pattern, $password)){
    
    $error= "Password should have at least one uppercase letter and should be at least 8 characters";
    header("Location:account.php?registererror=".$error);
}
else if(!preg_match($num,$phone)){
    
   
    $error= "Phone should have at least 8 digits";
    header("Location:account.php?registererror=".$error);
}

    else {
    


    $conn=mysqli_connect('localhost','ari','test1234','register');

    if(!$conn){
        echo "DB not connected";
    }
    $encrypted=md5($password);
    $sql="UPDATE `users` SET `email` = '$email', `username` = '$username', `phone` = '$phone', `password` = '$encrypted' WHERE `users`.`id` = $id;";
    
    if(mysqli_query($conn,$sql)){
        $_SESSION['username']=$username;
         $_SESSION['password']=$password;
        $_SESSION['phone']=$phone;
        $_SESSION['email']=$email;
        $_SESSION['id']=$id;

        header("Location:account.php");
    }
    
       
}
   
}
   

   
   
   ?> 


<?php



       }
       else{
            header("Location:login.php");
       }
?>







































































