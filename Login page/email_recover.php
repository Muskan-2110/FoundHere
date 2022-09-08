<?php
$is_sent=0;

if(isSet($_POST['submit']))
{
$server = 'localhost';
$username = 'root';
$password = '';
$db = "db_foundhere";
//mmmmmmmmmmmmmmmm
// Create a database connection
$con = mysqli_connect($server, $username, $password,$db);
 
// Check for connection success
if($con){
    echo"connection successful";
    $email = $_POST['email']; 
    $emailquery = "select * from users where email='$email'; ";
    $query= mysqli_query($con,$emailquery)    ;
    $emailcount = mysqli_num_rows($query);

    if($emailcount){
        $userdata = mysqli_fetch_array($query);
        $username = $userdata['fname'];
        $id = $userdata['user_id'];
        $email=$userdata['email'];
        //sending mail
        include "phpmailer.php";
        //redirect to password reset
        $script = "<script>alert('mail sent to you')</script>";
        
        header("location:index.php");
        echo $script;
        

}
else{
    echo" No connection";
}




}
}
?>






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
    <title>Email verification</title>
</head>
<body>
<div class="card bg-light">
    <artical class="card-body mx-auto" style="max-width: 400px;">
    <h4 class="card-title mt-3 text-center"> RESET YOUR PASSWORD</h4>
    

    <form action="" method="POST">

         <div class ="form-group input-group">
              <div class="input-group-prepend">
                <span class ="input-group-text"> <i class="fa fa-envelope">
</i> </span>
<div>
    <input name="email" class="form-control" placeholder="email address" type="email" required>

<div class="form-group">
    <button type="submit" name="submit" class="send"> SEND EMAIL </button>

    <?php
    if(isSet($_POST['submit']))
    {
        if($is_sent==1){
            echo "mail sent";
        }
        else{
            echo "mail could not be sent";
        }
    }
    ?>
    
</div>  <!-- form-group// --> 
</form>
</article>
</div> <!-- card.// -->
</div>
</div>
</div>


            </body>
</html>