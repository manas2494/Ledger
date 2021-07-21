<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
 $companyname = $_POST['name'];
 $billno = $_POST['billno'];
 $item = $_POST['item'];
 $qty = $_POST['qty'];
 $rate = $_POST['rate'];
 #$amount = $_POST['amount'];
  if($companyname == '' || $billno == '' || $item == '' || $qty == ''|| $rate == '')
  {
 echo 'please fill all values';
 }
 else
 {
 $con = new mysqli('localhost', 'root', '', 'mahavir') 
                or die ('Cannot connect to db');

 $sql = "INSERT INTO bill (companyname,billno,item,qty,rate,amount) VALUES('$companyname','$billno','$item','$qty','$rate',$qty*$rate)";
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
 #mysqli_close($con);
 }
 else
{
echo 'error';
}
?>