






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
    <title>Sign Up Login Form</title>
</head>

<body>
    <header>
        <div class="header"><img class="logo" src="..\images\logo.png">
            <h1>Welcome to <span>Found</span> HERE</h1>
        </div>
    </header>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="" method="post">
                <h1>Create Account</h1>
                <input type="text" placeholder="First Name" id="fname" name="fname">
                <input type="text" placeholder="Last Name" id="lname" name="lname">
                <input type="email" placeholder="Email" id="email" name="email">
                <input type="password" placeholder="Password" id="myInput" minlength="8" name="password">
                <input type="checkbox" onclick="myfuncpwd()">
                Show Password
                <div class="gender">
                    <p>Select Gender:</p>
                    <input type="radio" id="choice1" name="choice" value="male">   Male
                    <input type="radio" id="choice2" name="choice" value="female">Female
                </div>
                <div>

                    <input class="inp" type="reset" value="Reset">
                    <input class="inp" name="register" type="submit" value="Submit">

                </div>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="" method="post">
                <h1>Sign in</h1>
                <input type="email" placeholder="Email" name="email"/>
                <input type="password" placeholder="Password" id="myInputSignIn" name="password"/>
                <input type="checkbox" onclick="myfuncshowpwd()">
                Show Password
                <a href="email_recover.php">Forgot your password?</a>
                <button class="btn" name="signin" id="btn">Sign In</button>

            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>Login to get connected!</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friendzzz!</h1>
                    <p>Start journey with us!</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>

<?php
if(isSet($_POST['register']))
{


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
  // Collect post variables
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['choice'];



       $sq="SELECT email FROM users WHERE email = '$email'";
       $res=mysqli_query($con,$sq);
       $rows= mysqli_num_rows($res);

       if($rows==0)
       {
        $sql = "INSERT INTO users (fname, lname, email, password, gender) VALUES ('$fname', '$lname','$email', '$password','$gender');";

        $result=mysqli_query($con,$sql);
    
        if($result)
        {
           
            // echo "registration successfull";
            $scrpt="<script>alert('registration successfull')</script>";
          echo $scrpt;
          // header('Location:index.php');
        }
       }
       else{
           $text="<script>alert('email already there')</script>";
           echo $text;
       // echo "email already exist";
      // header('Location:index.html');
       
       }

}


if(isSet($_POST['signin']))
{
    $con=mysqli_connect('localhost','root','','db_foundhere');

    if($con)
    {
        $log=0;
        $qr="select user_id,email,password from users";
        $result=mysqli_query($con,$qr);
        if(mysqli_num_rows($result)>0)
        {
        while($row = mysqli_fetch_assoc($result))
        {
            if($row["email"]==$_POST["email"] && $row["password"]==$_POST["password"])
            {
             // echo "login successful";
             session_start();
             $_SESSION['username'] = true;
              $log=1;

              //setting sno as session variable
                $_SESSION['user_id']=$row['user_id'];
              //keeping password as session variable
                // $_SESSION['session_password']=$_POST['password'];
                //accessing chat database
                include "db_foundhere.php";
                //setting unique_id from chatapp database as session variable
            //   $_SESSION['unique_id']=$unique_id;
            }
        }
        if($log==1)
        {
            header('Location:../profile page/index.php');
        }
        else
        {
          $scrpt="<script>alert('login error')</script>";
          echo $scrpt;
        }
    }
}
}

// mysqli_close($con);  
?>
