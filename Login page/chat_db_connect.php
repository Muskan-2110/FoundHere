<?php
$user_id=$_SESSION['sno'];
$conn = mysqli_connect("localhost","root","","db_foundhere");
if($conn)
{
$query="select unique_id from users where user_id=$user_id;";
$result= mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
$unique_id=$row['unique_id'];
}
else{
    echo "failed to connect";
}
?>