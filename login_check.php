<?php 
        session_start();
       

if(isset($_POST['submit'])){
   
    $username= $_POST['username'];
    $password= $_POST['password'];
    $_SESSION['usernameCheck']=$username;
    $_SESSION['passwordCheck']=$password;
    if  ($username=="" or $username==null or $password=="" or $password==null){
        $error="Please fill all fields";
        header('Location:login.php?logincheck='.$error);
    }
   
    else{
        $conn = mysqli_connect('localhost','ari','test1234','register');

        if(!$conn){
            echo "Error Occured";
        }
        else{
            $encpass= md5($password);
            $sql= "SELECT id,username,password,email,phone from `users` where password='$encpass';";
            $result= mysqli_query($conn,$sql);
            $infos = mysqli_fetch_all($result,MYSQLI_ASSOC);
            
            if(sizeof($infos)==0){
                $error="Wrong username or password";
                header('Location:login.php?logincheck='.$error);
            }
            else {
                for($i=0;$i<sizeof($infos);$i=$i+1){
                    if($encpass == $infos[$i]['password'] && $username==$infos[$i]['username']){
                        $_SESSION['email']=$infos[$i]['email'];
                        $_SESSION['password']=$password;
                        $_SESSION['phone']=$infos[$i]['phone'];
                        $_SESSION['username']=$infos[$i]['username'];
                        $_SESSION['id']=$infos[$i]['id'];
                        if($username=="admin"){
                            header("Location: adminheader.php");
                        }
                        else {
                            header("Location: header.php");
                        }
                      
                        exit;
                    }
                    else{
                        $error="Wrong username or password";
                        header('Location:login.php?logincheck='.$error);
                    }
        
                }
               
            }
          


        }

        
    }
}
else{
    header("Location:login.php");
}




?>