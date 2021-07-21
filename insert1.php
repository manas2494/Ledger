<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
 $companyname = $_POST['name'];
 $billno = $_POST['billno'];
 $payer = $_POST['buyer'];
 $date = $_POST['date'];
 #$deliveredto == $_POST['deliveredto'];
 $amount = $_POST['amount'];
  if($companyname == '' || $payer == '' || $date == '' || $amount == ''|| $billno == ''){
 echo 'please fill all values';
 }
 else
 {
 $con = new mysqli('localhost', 'root', '', 'ledger') 
                or die ('Cannot connect to db');

 $sql = "INSERT INTO transactions (companyname,billno,amount,payer,date) VALUES('$companyname','$billno','$amount','$payer','$date')";
 if(mysqli_query($con,$sql))
 {
 echo 'Successfully Added';
 }
 else
 {
 echo $companyname;
 echo $billno;
 echo $payer;
 echo  $date;
 echo $amount;
 }
 }
 mysqli_close($con);
 

 }
else
{
echo 'error';
}
?>