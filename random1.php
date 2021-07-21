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
              url: 'rainsert.php',
              data: {
                name:val,
         	    billno:val1,
                item:val2,
				qty:val3,
				rate:val4,
              },
              success: function (response) {                
         	   alert(response);
              }
			  
            });
         }
         
      </script>
      <script>
         var val,val1 ;
		 var item;
		 var qty;
		 var rate;
		 var i=0;
         function setValue(value){
         
          val=value;//here u will get the entered text
         }
         function setValue1(value){
         
          val1=value;//here u will get the entered text
         }
         function itemfun(value){
		 val2=value
		 }
		 function qtyfun(value){
		 val3=value
		 }
		 function ratefun(value){
		 val4=value
		 }
        function last(){
         
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
	<br><br><br>
	<!--for add company-->
	<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Add Company</h1>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
					
					<form class="form-horizontal">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Name of the Company</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter Name of the Company" onchange="setValue(this.value)" required/>
								</div>
							</div>
						</div>
						<div class="form-group">
                     <label class="cols-sm-2 control-label">Bill Number</label></br>
                     <div class="col-sm-3">
					
                        <input type="number" class="form-control" name="billno" id="billno" placeholder="Bill Number" onchange="setValue1(this.value)" >
                     </div>
                  </div>
<div class="row clearfix">
		<div class="col-md-12 column">
			<table class="table table-bordered table-hover" id="tab_logic">
				<thead>
					<tr >
						<th class="text-center">
							#
						</th>
						<th class="text-center">
							Item
						</th>
						<th class="text-center">
							Qty
						</th>
						<th class="text-center">
							Rate
						</th>
					</tr>
				</thead>
				<tbody>
					<tr id='addr0'>
						<td>
						1
						</td>
						<td>
						<input type="text" name='item0' onchange='itemfun(this.value)' placeholder='Item' class="form-control"/>
						</td>
						<td>
						<input type="text" name='qty0' placeholder='Qty' onchange='qtyfun(this.value)' class="form-control"/>
						</td>
						<td>
						<input type ="text" name='rate0' placeholder='Rate' onchange='ratefun(this.value)' class="form-control"/>
						</td>
					</tr>
                    <tr id='addr1'></tr>
				</tbody>
			</table>
		</div>
	</div>
	<a id="add_row" class="btn btn-default pull-left" onclick="last()">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
</div>
<script type="text/javascript">
     $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='item"+i+"' onchange='itemfun(this.value)' type='text' placeholder='Item' class='form-control input-md'  /> </td><td><input  name='qty"+i+"' type='text' placeholder='Qty' onchange='qtyfun(this.value)' class='form-control input-md'></td><td><input  name='rate"+i+"' type='text' placeholder='Rate' onchange='ratefun(this.value)' class='form-control input-md'></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
	  
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });

});
</script><div class="form-group ">
							<button onclick="last()" class="btn btn-lg btn-block btn-warning" name="submit" id="submit">Submit</button>
						</div>
						
					</form>
				</div>
			</div>
		</div></body>
</html>