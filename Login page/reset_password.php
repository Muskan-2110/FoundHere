<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>reset password</title>
    
</head>
<body>
<div class="card bg-light">
    <artical class="card-body mx-auto" style="max-width: 400px;">
    <h3 class="card-title mt-3 text-center"> RESET YOUR PASSWORD</h3>
     <p> <?php 
     session_start();
     if(isset($_SESSION['passmsg']))
     {
        echo $_SESSION['passmsg'];
     }else{
        echo $_SESSION['passmsg']= "";
     } ?>
      </p>    

    <form action=""
    method="POST">

         <div class ="form-group input-group">
              <div class="input-group-prepend">
                <span class ="input-group-text"> <i class="fa fa-envelope">
</i> </span>
<div>
    <input name="new_password" class="form-control" placeholder="password" type="password" required>
    <input name="re_password" class="form-control" placeholder=" reenter password" type="password" required>

<div class="form-group">
    <button type="submit" name="submit" class="btn btn-primary btn-block"> UPDATE PASSWORD </button>
    
</div>  <!-- form-group// --> 
</form>
</article>
</div> <!-- card.// -->
</div>
</div>
</div>

<?php
if(isset($_POST['submit'])){
// Set connection variables
$server = "localhost";
$username = "root";
$password = "";
$db = "db_foundhere";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password,$db);
 
    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
   // echo "Success connecting to the db";

  
    if(isset($_GET['id'])){
   
   $id = $_GET['id'];

   echo "$id"; 
   $new_password = $_POST['new_password'];
   $cpass = $_POST['re_password'];
    //$new_password = password_hash($n_password, PASSWORD_BCRYPT);
    //$cpass = password_hash($r_password,PASSWORD_BCRYPT);

    if($new_password === $cpass)
    {
        $updatequerey = " update users set password='$cpass' where user_id=$id ";
        $iquery = mysqli_query($con, $updatequerey);
        if($iquery)
        { 
            
           $_SESSION['username']= "your password has been updated" ;
           header('location:index.php');
        }else{
            
                $_SESSION['passmsg'] = "password is not updated";
         header('location:reset_password.php');
// echo "error";
        }

        }else{
            
            $_SESSION['passmsg'] = "password is not matching";
           header('location:reset_password.php');
        echo "error";
        }
        
        }
    }

?>
</body>
</html>