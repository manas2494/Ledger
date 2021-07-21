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
              url: 'insert2.php',
              data: {
                name:val,
         	   billno:val2,
         	   buyer:val1,
         	   date:val4,
         	   amount:val3,
               dop:val5,			   
              },
              success: function (response) {                
         	   alert(response);
			   document.getElementById("table2").innerHTML=response;
              }
			  
            });
         }
         
      </script>
      <script>
         var val,val1,val2,val3,val4,val5;
         function setValue(value){
         
          val=value;//here u will get the entered text
         }
         function setValue1(value){
         
          val1=value;//here u will get the entered text
         }
         function setValue2(value){
         val2=value;
         }
         function setValue3(value){
         val3=value;
         }
         function setValue4(value){
         val4=value;
         }
		 function setValue5(value){
         val5=value;
         }
         function last(){
         
         fetch_select();
         }
		 
		 
      </script>
   </head>
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
      <br><br><br>
      <!-- for adding bill-->
      <div class="container">
         <div class="row main">
            <div class="panel-heading">
               <div class="panel-title text-center">
                  <h1 class="title">Add Payment</h1>
                  <hr />
               </div>
            </div>
            <div class="main-login main-center">
               <form class="form-horizontal">
                  <div class="form-group">
                     <label class="col-sm-3 control-label">Company Name</label>
                     <div class="col-sm-3">
                        <select class="form-control" id="name" onchange="setValue(this.value);">
                        <option>
                           Select Seller
                       </option>
						<?php
                           $conn = new mysqli('localhost', 'root', '', 'ledger') 
                           or die ('Cannot connect to db');
                           
                               $result = $conn->query("select companyname from company");
                               while ($row = $result->fetch_assoc()) {
                           
                                             unset($companyname);
                                             $companyname = $row['companyname']; 
                                             echo '<option value ="'.$companyname.'">'.$companyname.'</option>';
                                            
                           }
                           ?>
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">Buyer Name</label>
                     <div class="col-sm-3">
                        <select class="form-control" onchange="setValue1(this.value);" id="buyer">
						<option>
                           Select Buyer
                        </option>
                        <?php
                           $conn = new mysqli('localhost', 'root', '', 'ledger') 
                           or die ('Cannot connect to db');
                           
                               $result = $conn->query("select companyname from company");
                               while ($row = $result->fetch_assoc()) {
                           
                                             unset($companyname);
                                             $companyname = $row['companyname']; 
                                             echo '<option value ="'.$companyname.'">'.$companyname.'</option>';
                                            
                           }?>                                                               
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">Amount</label>
                     <div class="col-sm-3">
                        <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount" onchange="setValue3(this.value)" required >
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">Bill Number</label>
                     <div class="col-sm-3">
                        <input type="number" class="form-control" name="billno" id="billno" placeholder="Bill Number" onchange="setValue2(this.value)" >
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">Date</label>
                     <div class="col-sm-3">
                        <input type="text" class="form-control" name="date" id="date" placeholder="Date" onchange="setValue4(this.value)" >
                     </div>
                  </div> 
				  <div class="form-group">
                     <label class="col-sm-3 control-label">Date of Payment</label>
                     <div class="col-sm-3">
                        <input type="text" class="form-control" name="date" id="date" placeholder="Date of Payment" onchange="setValue5(this.value)" >
                     </div>
                  </div>
                  <div class="form-group ">
                     <button onclick="last()" class="btn btn-lg btn-warning btn-block" name="submit" id="submit">Submit</button>
                  </div>
               </form>
			   <table class="table" id="table2"> </table>
            </div>
			
         </div>
      </div>
   </body>
</html>