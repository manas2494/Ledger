<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
       //$companyname = $_POST['name'];
	   $billno =$_POST['billno'];
	   //$payer=$companyname;
	   if($billno == '')
	   {
 echo 'please fill all values';
 }
 else
 { 
  $conn = new mysqli('localhost', 'root', '', 'mahavir') 
                           or die ('Cannot connect to db');
						   
$result1 = $conn->query("select companyname,item,qty,rate,amount from bill where billno='".$billno."'" );
$result2 = $conn->query("select companyname,item,qty,rate,amount from bill where billno='".$billno."'" );
											 $row = $result2->fetch_assoc();
											 $companyname = $row['companyname'];
											 echo '<html>';
											 echo'<head><link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">';
											 echo'<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script></head>';
                                             echo'<body>';
											 echo '<div class="container-fluid">';
											 echo'<div class="row main">';
											 echo'<div class="panel-heading">';
											 echo'<div class="panel-title text-center">';
											 echo'<h1 class="title">'.$companyname.'</h1><hr /></div></div>';  
							                 echo '<table class="table">';											 
											 echo '<thead>';
                                             echo '<tr>';											  
											
											 /*echo '<th><h1>'.$companyname.'</h1><th>';
                                            echo ' <br>';*/
                                            echo ' <th>Item</th> ';
											echo ' <th>Qty</th> ';
											echo ' <th>Rate</th> ';
											echo '<th>Amount</th>';
                                             echo ' </tr> ';
                                             echo ' </thead>';
											 echo ' <tbody>' ;
											 
                               while ($row = $result1->fetch_assoc()) {                                                                                          
											 echo '<tr>';
                                             
											 $item= $row['item'];
                                             $qty = $row['qty'];
                                             $rate = $row['rate'];
											$amount = $row['amount']; 
                                             //echo '<td></td>';echo '<td></td>'; 											
											 echo '<td>'.$item.'</td>';
											 echo '<td>'.$qty.'</td>';
											 echo '<td>'.$rate.'</td>';
											 echo '<td>'.$amount.'</td>';
											 echo '</tr>';
											 
}
echo '</tbody>';
echo '</table>';
echo '</body>';
echo '<html>';
} 
} 
?>