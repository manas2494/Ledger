<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
 $companyname = $_POST['name'];
 $billno = $_POST['billno'];
 $payer = $_POST['buyer'];
 $date = $_POST['date'];
 #$deliveredto == $_POST['deliveredto'];
 $dop = $_POST['dop'];
 $amount = $_POST['amount'];
  if($companyname == '' || $payer == '' || $date == '' || $amount == ''|| $billno == ''){
 echo 'please fill all values';
 }
 else
 {
 $con = new mysqli('localhost', 'root', '', 'ledger') 
                or die ('Cannot connect to db');

 $sql = "INSERT INTO reciept (companyname,billno,amount,payer,date,dop) VALUES('$companyname','$billno','$amount','$payer','$date','$dop')";
 if(mysqli_query($con,$sql))
 {
 echo 'Successfully Added';
 $result1 = $con->query("SELECT amount AS amount1 FROM transactions WHERE companyname = '".$companyname."' AND billno = '".$billno."' AND payer = '".$payer."' AND date = '".$date."' ") ;
 $row = $result1->fetch_assoc();
 $amount1 = $row['amount1'];
 $diff = $amount1-$amount;
 if($diff==0)
 $result1 = $con->query("DELETE FROM transactions WHERE companyname = '".$companyname."' AND billno = '".$billno."' AND payer = '".$payer."' AND date = '".$date."' ") ;
 else
 $result1 = $con->query("UPDATE transactions SET amount = '".$diff."'  WHERE companyname = '".$companyname."' AND billno = '".$billno."' AND payer = '".$payer."' AND date = '".$date."' ") ;} 
 else
 {
 echo $companyname;
 echo $billno;
 echo $payer;
 echo  $date;
 echo $amount;
 echo $dop;
 }
 }
 mysqli_close($con);
}
else
{
echo 'error';

}

?>