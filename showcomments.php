
<head> 

<link rel="stylesheet" href="header.css">
</head>


<body>

<div class="header">
  <a href="#default" class="logo">CompanyLogo</a>
  <div class="header-right">
    <a class="active" href="header.php">Home</a>
    <a href="posts.php">Posts</a>
    <a href="blogs.php">Blogs</a>
    <a href="addnew.php">Add a news</a>
    <a href="account.php">Account</a>
  </div>
</div>


<?php
$id=$_GET['postid'];
$conn=mysqli_connect('localhost','ari','test1234','register');
if(!$conn){
    echo "DB not connected";
}
else{
   
    $sql= "SELECT comment,postid,userid from `comment` where postid='$id';";
    $result= mysqli_query($conn,$sql);
    $infos = mysqli_fetch_all($result,MYSQLI_ASSOC);
   
    echo '
<head>
  <meta charset="utf-8">
  <title>Stackfindover: Comments </title>
  <link rel="stylesheet" type="text/css" href="comment.css">
</head>

<body>';
echo '<table> 

<tr> 
';
   
        

               
$j=0;
    for($i=0;$i<sizeof($infos);$i++){   
        $userid=$infos[$i]['userid'];
    $usersql= "SELECT username from `users` where id='$userid';";
    $result= mysqli_query($conn,$usersql);
    $userinfos = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $username=$userinfos[0]['username'];
    $comment= $infos[$i]['comment'];

    if(isset($username) and isset($comment) ) {
        
    
    echo "<td> 

    <div class='comment'>
        <span class='padding-bottom--15'>Comments to this post:</span>
            <form id='stripe-login'>
                <div class='field padding-bottom--24'>
                <label for='email'><h1><b>User<b></h1></label>'
               <input type='text' name='email' value=' $username' readonly>'
        
        </div>
        <div class='field padding-bottom--24'>
        <div class='grid--50-50'>
            <label for='comment'>Comment</label>
        
        </div>
    
        <textarea name='comment'  cols='60' rows='10' >$comment</textarea>
                
        </div>
    
    </form>


</td>";
if(($j+1)%3==0){
    
    echo "</tr>
        <tr>";
        
}
  $j=$j+1;
    
}

}
echo "</tr>


</table>

</body>

</html>";
}




?>

                          
                
                    

                 