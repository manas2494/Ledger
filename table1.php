<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
       $companyname = $_POST['name'];
	   $payer=$companyname;
	   if($companyname == '')
	   {
 echo 'please fill all values';
 }
 else
 { 
  $conn = new mysqli('localhost', 'root', '', 'ledger') 
                           or die ('Cannot connect to db');

$result1 = $conn->query("select * from reciept where companyname = '".$payer."'");
							                 echo '<thead>';
                                             echo '<tr>';											  
											
											 echo '<th>Seller</th>';
                                            echo ' <th>Purchaser</th>';
                                            echo ' <th>Date</th> ';
											echo ' <th>Billno</th> ';
											echo ' <th>Amount</th> ';
											echo ' <th>Date of Payment</th> ';
                                             echo ' </tr> ';
                                             echo ' </thead>';
											 echo ' <tbody>' ;
											 
                               while ($row = $result1->fetch_assoc()) {                                                                                          
											 echo '<tr>';
                                             
											 $companyname = $row['companyname'];
                                             $payer = $row['payer'];
                                             $billno = $row['billno'];
											 $date = $row['date'];
                                             $amount = $row['amount'];
											 $dop = $row['dop'];
											 
                                             echo '<td>'.$companyname.'</td>';
											 echo '<td>'.$payer.'</td>';
											 echo '<td>'.$date.'</td>';
											 echo '<td>'.$billno.'</td>';
											 echo '<td>'.$amount.'</td>';
											 echo '<td>'.$dop.'</td>';
											 echo '</tr>';
											 
}
echo '</tbody>';
} } ?>