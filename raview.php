<!DOCTYPE html>
	<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width = device-width, initial-scale= 1">
		<title>Ledger</title>
		<!-- Latest compiled and minified CSS -->
		 <link rel="stylesheet" href="http://localhost/mahavir%20fashion/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="http://localhost/mahavir%20fashion/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="http://localhost/mahavir%20fashion/bootstrap.min.js"></script>
		<link rel="stylesheet" href="navbar.css">
		<script src="http://localhost/mahavir%20fashion/jquery-2.1.1.min.js" type="text/javascript"></script>
      <script>
         function fetch_select()
         {
            $.ajax({
             type: 'post',
              url: 'ratable.php',
              data: {
                
				billno:val,
         	   	    },
              success: function (response) {                
         	   //alert(response);
			   //document.getElementById("table2").innerHTML=response;
			   var w = window.open();
        //Append Search unordered list
              $(w.document.body).html(response);

              }
			 
            });
         }
		 
         
      </script>
      <script>
         var val,val1,val2,val3,val4;
         function change(value){
         //var button = document.query("mainbutton");
         //var dataValue = buttom.getAttribute("data-value");
         //var dataValue2=button.getAttribute("data-value2");
          val=value;//dataValue;//here u will get the entered text
          //val1=value//dataValue2;
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
				<a href="http://localhost/mahavir%20fashion/random1.php" class="navbar-brand" id="colorcchange">Mahavir Fashion</a>
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
			       	<li><a href="http://localhost/mahavir%20fashion/random1.php" id="colorcchange">Sale</a></li>
			       	<li><a href="http://localhost/mahavir%20fashion/raview.php" id="colorcchange">View Sale Ledger</a></li>
					<li><a href="http://localhost/mahavir%20fashion/purchase.php" id="colorcchange">Purchase</a></li>
		       </ul>
	       </div>
		</nav>
	</div>
	<br><br><br><br><br>
<div class="container-fluid">
<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title"> Sale Ledger</h1>
	               		<hr />
	               	</div>
	            </div> 	
<table class="table">
    <thead>
      <tr>
	    <th> </th>
	
        <th>Company</th>
        <th>Date</th>
		<th>Bill Number</th>
		<th>Amount</th>
		
      </tr>
    </thead>
    <tbody>
	  <?php
                           $conn = new mysqli('localhost', 'root', '', 'mahavir') 
                           or die ('Cannot connect to db');
                    
                               $result = $conn->query("SELECT DISTINCT companyname,billno  FROM bill");
                               while ($row = $result->fetch_assoc()) {                                            
                                             unset($companyname);
											 unset($billno);
                                             $companyname = $row['companyname'];
                                             $billno = $row['billno'];											 
											 //echo '<tr value='.$companyname.' ">';
											 echo '<td> <button id="mainbutton"   value='.$billno.'  onclick="change(this.value);"> </td>';											 
                                             echo '<td>'.$companyname.'</td>';
											 echo '<td>'.$billno.'</td>';
																						 
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