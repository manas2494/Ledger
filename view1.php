<!DOCTYPE html>
	<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width = device-width, initial-scale= 1">
		<title>Ledger</title>
		<!-- Latest compiled and minified CSS -->
		 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="navbar.css">
		<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
		 <script>
         function fetch_select()
         {
            $.ajax({
             type: 'post',
              url: 'table1.php',
              data: {
                name:val,
         	   	    },
              success: function (response) {                
         	   alert(response);
			   document.getElementById("table2").innerHTML=response;
              }
			 
            });
         }
		 
         
      </script>
      <script>
         var val,val1,val2,val3,val4;
         function change(value){
         
          val=value;//here u will get the entered text
          
		  fetch_select();
		 }		
      </script>
</head>
	<body>
	<!--for header-->
	<div class="container-fluid">
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-header" >
			<!--logo-->
				<a href="http://localhost/ledger/ledger.html" class="navbar-brand" id="colorcchange">Ledger</a>
				<!--toggle button-->
				<button type= "button" class="navbar-toggle" data-toggle="collapse" data-target="#mycollapser">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!--right button collapser and buttons-->
	       <div class="collapse navbar-collapse" id="mycollapser">
		       <ul class="nav navbar-nav navbar-right" >
			       	<li><a href="http://localhost/ledger/ledger.html" id="colorcchange">Add Company</a></li>
			       	<li><a href="http://localhost/ledger/addbill.php" id="colorcchange">Add Bill</a></li>
			       	<li><a href="http://localhost/ledger/view.php" id="colorcchange">View Ledger</a></li>
				  <li><a href="http://localhost/ledger/addpayment.php" id="colorcchange">Add Payment</a></li>
				  <li><a href="http://localhost/ledger/view1.php" id="colorcchange">View Payment</a></li>					
		       </ul>
	       </div>
		</nav>
	</div>
	<br><br><br><br><br>
<div class="container-fluid">
<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Ledger</h1>
	               		<hr />
	               	</div>
	            </div> 	
<table class="table">
    <thead>
      <tr>
	    <th> </th>
	
        <th>Company</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
	  <?php
                           $conn = new mysqli('localhost', 'root', '', 'ledger') 
                           or die ('Cannot connect to db');
                    
                               $result = $conn->query("select companyname from company");
                               while ($row = $result->fetch_assoc()) {                                            
                                             unset($companyname);
											 unset($amount);
                                             $companyname = $row['companyname']; 
											 //echo '<tr value='.$companyname.' ">';
											 echo '<td> <button value='.$companyname.' onclick="change(this.value);"> </td>';											 
                                             echo '<td>'.$companyname.'</td>';
											 $result1 = $conn->query("select SUM(amount) as afamount from reciept where companyname ='".$companyname."'");
											 $row = $result1->fetch_assoc();
											 $amount = $row['afamount'];
                                             echo '<td>'.$amount.'</td>';
											 //echo '<td> <button value='.$amount.' onclick="change(this.value);"> </td>';											 
											 echo '</tr>';
                           }
                           ?>       
      
    </tbody>
  </table>
</div>
<table class="table" id="table2"> </table>
    

	</div>
</body>
</html>