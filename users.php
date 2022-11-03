

<?php
session_start(); 
if(isset($_SESSION['username']) and isset ($_SESSION['password'])){
  ?>



<html> 

<style> 
table, th, td {
  border: 10px solid black;



}
#delete{
    font-family: Algerian;
    font-size: 30px;

    }

input, label{
    font-family: Algerian;
    font-size: 30px;
    color: #233243;

}

.my{
    color:red;

}
</style>
<link rel="stylesheet" href="header.css">
<head> 
    <Title> Manage Users </Title>
</head>

<body>
<div class="header">
  <a href="#default" class="logo">CompanyLogo</a>
  
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
   
    



  
</div>


<?php 




$conn = mysqli_connect('localhost','ari','test1234','register');
$sql= "SELECT * FROM `users` ;";
$result= mysqli_query($conn,$sql);
$infos = mysqli_fetch_all($result,MYSQLI_ASSOC);

echo "<table>";
echo "<tr>";




    for($i=0;$i<sizeof($infos);$i=$i+1){
        echo "<form action='userdelete.php' method='Post'>";
        echo "<td>";
        $email=($infos[$i]['email']);
        $username=($infos[$i]['username']);
        $password=($infos[$i]['password']);
        $date=($infos[$i]['date']);
        $phone=($infos[$i]['phone']);
        $id=($infos[$i]['id']);
        if($username=="admin"){
            echo "<h1 class='my'> My Account </h1>";
        }
                echo '<label for="id"> Id </label>';
                echo "<input type='text' name='userid' value=$id readonly >";
                echo "<h1> Username $username </h1>";
                echo "<h2> Password $password </h2>";
                echo "<h2> Email $email </h2>";
                echo "<h2> Date Registered $date </h2>";
                echo "<h2> Phone Nr $phone </h2>";

                if($username!="admin"){
                    echo "<input type='submit' name='submit' value='Delete' id='delete'>";

                }
                


                if(($i+1)%3==0){
                    echo "</tr>";
                    echo "<tr>";
                }
                echo "</td>";
                echo "</form>";
    
    }

    echo "<tr>";
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
















