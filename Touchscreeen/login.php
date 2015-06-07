<html>
<head>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>



</head>
<body>

<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	print_r($_POST);

	if(isset($_POST['user_id'], $_POST['user_password'])){

		$user = $_POST['user_id'];
		$pass = $_POST['user_password'];
		
		$conn=mysql_connect("darlek.int.storm.vu","root","STORMIsThePlaceToBe!");
		mysql_select_db("touchdev");
		
		$query = mysql_query("SELECT Pin FROM Users WHERE User_id='" . $user . "'");
		
		while($row = mysql_fetch_array($query)){
			
			print_r("test");
			
			if($row["Pin"] == $pass){
				
				$_SESSION['user_id'] = $user;
				print_r($_SESSION);
				
				
			} else {
				
				 header('Location: index.php'); 
				  

		}
	}
	
}
}
	
?>




<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
		<a class="navbar-brand" href="#">K&T lijst</a>
	  
		<?php

		
		$query = mysql_query("SELECT First_Name, Last_Name, Balance FROM Users WHERE User_ID = '" . $_SESSION['user_id'] . "'");

		while($row = mysql_fetch_array($query)){
			echo '<p class="navbar-brand">' . $row['First_Name'] . ' ' . $row['Last_Name'] . '    Balance: ' . $row['Balance'];
		}
		
		?>
		<!-- BALANS -->
    
	
	
	
	</div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="" data-toggle="modal" data-target="#agenda">Agenda</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<style>
body{
overflow:hidden;
}

.btn{
padding:20px;
margin: 10px;
}

.col-md-2{
overflow:auto;
height:100%;
}


	
	.lijst{
	width:100%;
	
	}

</style>

<script>


$(document).ready(function(){
	$(".btn-default").click(function(event){
		
	var self = $(this);
    var clone = self.clone();
	
	var check = false

	$.each($('#orderCol').children(), function(){
		if($(this).attr('id') == clone.attr('id')){
			check = true;
			
			var amount = parseInt($(this).attr('amount'))+1;
			var totalPrice = parseInt($(this).attr('price')) * amount;
			
			$(this).attr('totalPrice', totalPrice);
			$(this).attr('amount', amount);
			
			$(this).text(self.text() + " " + $(this).attr('amount') + "x " + $(this).attr('totalPrice'));
			
			var totalOrder = parseInt($('#order').attr('totalOrder')) + parseInt($(this).attr('price'));
			$('#order').attr('totalOrder', totalOrder);
			$('#order').text("Total: " + $('#order').attr('totalOrder'));			
		}
	});
	
	if(check == false ){
		var amount = 1;
		clone.attr('amount', amount);
		clone.attr('totalPrice', clone.attr('price'))
		clone.addClass("orderItem");
		clone.text(clone.text() + "    " + amount + "x " + clone.attr('price'));
		clone.click(function(){
			if($(this).attr('amount') == 1){
				$(this).remove();
	
			} else{
				var amount = parseInt($(this).attr('amount'))-1;
				var totalPrice = parseInt($(this).attr('price'))*amount;
	
				$(this).attr('amount', amount);	
				$(this).attr('totalPrice', totalPrice);
	
				$(this).text(self.text() + " " + $(this).attr('amount') + "x " + $(this).attr('totalPrice'));
	
			}
			
			var totalOrder = parseInt($('#order').attr('totalOrder')) - parseInt($(this).attr('price'));
			$('#order').attr('totalOrder', totalOrder);
			$('#order').text("Total: " + $('#order').attr('totalOrder'));	
			 
			
		});
		
			var totalOrder = parseInt($('#order').attr('totalOrder')) + parseInt($(this).attr('price'));
			$('#order').attr('totalOrder', totalOrder);
			$('#order').text("Total: " + $('#order').attr('totalOrder'));	
		clone.appendTo('#orderCol');
	} 
	
	});
});
	
	

</script>

<div class="row">
	<div class="col-md-2">
	<?php
	/*
	$conn=mysql_connect("localhost","root","STORMIsThePlaceToBe!");
	mysql_select_db("touchdev");
	*/
	$query = mysql_query("SELECT Product_Name, Product_Price FROM Products WHERE Category_Name='Fris' AND Is_KenT = '1'");
	
	echo "<button class='btn btn-primary btn-lg' style='width:100%'>Fris</button>";
	
	while($row = mysql_fetch_array($query)){
		echo "<button class='btn btn-default lijst' price='" . $row["Product_Price"] . "' id='" . $row["Product_Name"] . "'>" . $row["Product_Name"] . " " . $row["Product_Price"] . "</button>";
	}
	?>
	</div>
	<div class="col-md-2">
	<?php

	$query = mysql_query("SELECT Product_Name, Product_Price  FROM Products WHERE Category_Name='Snack' AND Is_KenT = '1'");
	
	echo "<button class='btn btn-primary btn-lg' style='width:100%'>Snack</button>";
	
	while($row = mysql_fetch_array($query)){
		echo "<button class='btn btn-default lijst' price='" . $row["Product_Price"] . "' id='" . $row["Product_Name"] . "'>" . $row["Product_Name"] . " " . $row["Product_Price"] . "</button>";
	}
	?>
	</div>
	<div class="col-md-2">
	<?php

	$query = mysql_query("SELECT Product_Name, Product_Price  FROM Products WHERE Category_Name = 'Bier' AND Is_KenT = '1'");
	
	echo "<button class='btn btn-primary btn-lg' style='width:100%'>Bier</button>";
	
	while($row = mysql_fetch_array($query)){
		echo "<button class='btn btn-default lijst' price='" . $row["Product_Price"] . "' id='" . $row["Product_Name"] . "'>" . $row["Product_Name"] . " " . $row["Product_Price"] . "</button>";
	}
	?>

	</div>
	<div class="col-md-2">
	
	<?php
	
	$query = mysql_query("SELECT DISTINCT Category_Name FROM Products WHERE Is_KenT='1' AND Category_Name!= 'Fris' AND Category_Name!='Snack' AND Category_Name!='Bier'");
	
	if( mysql_num_rows($query)>0){
		while($row = mysql_fetch_array($query)){
			echo "<button class='btn btn-primary btn-lg' style='width:100%'>" . $row["Category_Name"] . "</button>";
			
			$subquery = mysql_query("SELECT Product_Name, Product_Price FROM Products WHERE Category_Name = '" . $row["Category_Name"] . "' AND Is_KenT='1'");
			while($subrow = mysql_fetch_array($subquery)){
				echo "<button class='btn btn-default lijst' price='" . $subrow["Product_Price"] . "' id='" . $subrow["Product_Name"] . "'>" . $subrow["Product_Name"] . " " . $subrow["Product_Price"] . "</button>";
			}
		}
	}
	
	?>
	
	</div>
	<div class="col-md-2"></div>
	<div class="col-md-2" id="orderCol">
	<button  class="btn btn-primary btn-lg" style="width:100%">Bestelling</button>
	<button class="btn btn-primary btn-lg order lijst" totalOrder="0" style="position:absolute; bottom:40px" id="order">Total: </button>
	</div>
</div>


	
	
		
		<div class="modal fade" id="agenda"   >
			  <div class="modal-dialog modal-sm" style="height:80%;width:60%">
				<div class="modal-content" >
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Agenda</h4>
				  </div>
				  <div class="modal-body" >
				  <img src="http://www.kalender-365.nl/jpg/kalender-februari-2015.jpg" alt="1" style="height:100%; width:100%"</img>

				  </div>
				  

				</div>
			  </div>
			</div>	
		
</body>
</html>

