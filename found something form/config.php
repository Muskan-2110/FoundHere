<?php
if(isSet($_POST['sub']))
{
  session_start(); 
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
  //  echo "connection successfull";

    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $date    = $_POST['date'];
    $product = $_POST['product'];
    $s_no    = $_POST['s_no'];

    
    $sq="SELECT * FROM lost_something_details WHERE s_no = '$s_no'";
    $res=mysqli_query($con,$sq);
    $rows= mysqli_num_rows($res);
    if($rows == 0)
    {
      $sql = "INSERT INTO found_something_details (name, email, date, product, s_no) VALUES ('$name', '$email', '$date', '$product', '$s_no');";

      $result=mysqli_query($con,$sql);
      echo "<script>alert('your details insert successfully whenever we find your document we will inform you ');</script>";

      // header("location: ../home/index.php");
      header('Location:../Confirmation Page/index.php');  
         
    }
    else{
     
    //echo "serial number is matched";
    //while($row = mysqli_fetch_assoc($res))
    //echo "<br>" . " name:" . $row["name"] . " product : " . $row["product"] . " serial number : " . $row["s_no"] . " " . "<br>";
    $sq="SELECT * FROM found_something_details WHERE s_no = '$s_no'";
    $res=mysqli_query($con,$sq);
    $rows= mysqli_num_rows($res);
    if($rows == 0)
    {
    $sql = "INSERT INTO found_something_details (name, email, date, product, s_no) VALUES ('$name', '$email', '$date', '$product', '$s_no');";
    $result=mysqli_query($con,$sql);
    }
    echo "<script>alert('document matched');</script>";





    $sq2="SELECT * FROM lost_something_details WHERE s_no = '$s_no' ";
    $res2=mysqli_query($con,$sq2);
    $userdata = mysqli_fetch_array($res2);
    $requester_mail = $userdata['email'];
    include"requester_mail.php";


       //changes by NB
       $html_str="Location:../after_matching/display2.php?s_no=".$s_no;
       header($html_str);
       //changes complete

    }

    // header('Location:../index.html');
    
}
?>