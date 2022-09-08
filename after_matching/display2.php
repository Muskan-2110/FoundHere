<!DOCTYPE html>
<html>
<head>
 <title></title>

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

</head>
<body>

 <div class="container">
 <div class="col-lg-12">
 <br><br>
 <h1 class="text-warning text-center" > Document details matched </h1>
 <br>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center">
 
 <th> Name</th>
 <th> Product Name</th>
 <th> Unique Id</th>
 <th> date  </th>
 

 </tr >

 <?php
 session_start();


 //receiving the value of s_no
 $s_no = $_GET['s_no'];
 include '../conn.php'; 
 $q = "select * from lost_something_details where s_no = $s_no ";

 $query = mysqli_query($conn,$q);

 while($res = mysqli_fetch_array($query)){
 ?>
 <tr class="text-center">
 <td> <?php echo $res['name'];  ?> </td>
 <td> <?php echo $res['product'];  ?> </td>
 <td> <?php echo $res['s_no'];  ?> </td>
 <td> <?php echo $res['date'];  ?> </td>
 
 <!-- <td> <button class="btn-danger btn"> <a href="delete.php?id=<?php echo $res['id']; ?>" class="text-white"> Delete </a>  </button> </td>
 <td> <button class="btn-primary btn"> <a href="update.php?id=<?php echo $res['id']; ?>" class="text-white"> Update </a> </button> </td> -->

 </tr>
 <?php 
 }
  ?>
 
</table>  

 <br>
 <p> Details has matched you can contact by chat or email given below</p>





 <table  id="tabledata1" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center">
 
 <th> Name</th>
 <th> Email</th>
 
</tr >

 <?php
 $q = "select * from lost_something_details where s_no = $s_no ";

 $query = mysqli_query($conn,$q);

 while($res = mysqli_fetch_array($query)){
  $s =$res['email'];
  $q1= "select fname,lname from users where email ='$s' ";
  $query1= mysqli_query($conn,$q1);
  while($res1 = mysqli_fetch_array($query1))
  {
 ?>

 <tr class="text-center">
 <td> <?php echo $res1['fname']." ".$res1['lname'];  ?> </td>
 <td> <?php echo $res['email'];  ?> </td>
 </tr>

 <?php 
 }
}
  ?>
 
 </table> 

 </div>
 </div>

 <!-- <script type="text/javascript">
 
 $(document).ready(function(){
 $('#tabledata').DataTable();
 }) 
 
 </script> -->

</body>
</html>