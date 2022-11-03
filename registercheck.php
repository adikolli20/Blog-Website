
<?php
   session_start();




   if(isset($_POST['submit'])){

    $pattern = '/^(?=.*[A-Z]).{8,}$/';
    $num = '/^[0-9]{8,}$/';
   $username=htmlspecialchars($_POST['username']);
   $password=htmlspecialchars($_POST['password']);
   $email=htmlspecialchars($_POST['email'] );
   $phone=htmlspecialchars($_POST['phone'] );
   
   $_SESSION['username']="$username";
   $_SESSION['password']="$password";
   $_SESSION['phone']=$phone;
    $_SESSION['email']=$email;
   if($username=="" or $username==null or $password=="" or $password==null or $email=="" or $email==null or $phone=="" or $phone==null){
    
    $error= "Please fill all the required fields";
    header("Location:register.php?registererror=".$error);

    
    
   }
  
   
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error= "Please enter a valid email";
        header("Location:register.php?registererror=".$error);
}
    
    else if(!preg_match($pattern, $password)){
    
    $error= "Password should have at least one uppercase letter and should be at least 8 characters";
    header("Location:register.php?registererror=".$error);
}
else if(!preg_match($num,$phone)){
    
   
    $error= "Phone should have at least 8 digits";
    header("Location:register.php?registererror=".$error);
}

    else {
    


    $conn=mysqli_connect('localhost','ari','test1234','register');
    if(!$conn){
        echo "DB not connected";
    }
    else{
        $encryptedpassword= md5($password);
        $sql= "SELECT username,password,email,phone from `users` where username='$username';";
        $result= mysqli_query($conn,$sql);
        $infos = mysqli_fetch_all($result,MYSQLI_ASSOC);
            
            if(sizeof($infos)>0){
                $error="User Already Exists. Try another username";
                header("Location:register.php?registererror=".$error);
            }
            else{

           

        $sql = "Insert into users(email,username,password,phone) values ('$email','$username','$encryptedpassword','$phone');";
      
        if(mysqli_query($conn,$sql)){
            $newsql="SELECT id,username from `users` where username='$username';";
            $result= mysqli_query($conn,$newsql);
            $infos = mysqli_fetch_all($result,MYSQLI_ASSOC);
            $_SESSION['id']=$infos[0]['id'];
            header("Location:header.php");
        }
        else{
            $error= "An error occured .Please try again";
            header("Location:register.php?registererror=".$error);
        }
    }
    
}
       
}
   
}
   
   
   
   
   
   
   
   ?> 




<?php
       
?>

































   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   