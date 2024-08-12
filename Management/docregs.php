<?php
$con=mysqli_connect("localhost:3307","root","","myhmsdb");
if(isset($_POST['patsub1'])){
	$fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $gender=$_POST['gender'];
  $email=$_POST['email'];
  $contact=$_POST['contact'];
	$password=$_POST['password'];
  $cpassword=$_POST['cpassword'];
  $result2=mysqli_query($con,"select * from docreg where email='$email'");
  $row2 = mysqli_fetch_assoc($result2);
  if($row2===null){
  if($password==$cpassword){
  	$query="insert into docreg(fname,lname,gender,email,contact,password) values ('$fname','$lname','$gender','$email','$contact','$password');";
    $result=mysqli_query($con,$query);
    if($result){
      $_SESSION['fname']=$fname;
      $_SESSION['lname']=$lname;  
      header("Location:admindoc.php");
    } 
  }
  else{
    header("Location:error1.php");
  }
}else{
  echo "<script>alert('User already registered. Please login'); window.location='indexdoc.php';</script>";
}
}
?>
