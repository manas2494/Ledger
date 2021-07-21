<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
 $companyname = $_POST['name'];
 $location = $_POST['loc'];
  if($companyname == '' || $location == ''){
 echo 'please fill all values';
 }else{
 require_once('db_connect.php');
 $sql = "SELECT * FROM company WHERE companyname='$companyname'";
 
 $check = mysqli_fetch_array(mysqli_query($con,$sql));
 
 if(isset($check)){
 echo 'Company Already Exists';
 }else{ 
 $sql = "INSERT INTO company (companyname,location) VALUES('$companyname','$location')";
 if(mysqli_query($con,$sql)){
 echo 'Successfully Added';
 }else{
 echo 'oops! Please try again!';
 }
 }
 mysqli_close($con);
 }
}else{
echo 'error';
}
?>