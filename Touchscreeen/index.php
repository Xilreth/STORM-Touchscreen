<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css" />
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <title></title>
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="#">K&amp;T lijst</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu</a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="" data-toggle="modal" data-target="#agenda">Agenda</a>
                </li>
                <li>
                  <a href="#">Another action</a>
                </li>
                <li>
                  <a href="#">Something else here</a>
                </li>
                <li>
                  <a href="#">Separated link</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>
    <style>
        body{
        overflow:hidden;
        }

        .lijst{
        width:100%;
        }
        
        .btn{
        margin:5px;
        }
        
</style>
    <div class="col-md-6" style="overflow:scroll; height:100%">
      <div id="users">
      <input class="search lijst" placeholder="Search" /> 
	  
	  <?php
            $conn=mysql_connect("","","");
            // Check connection
            if (mysqli_connect_errno())
              {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }
              else {
              //echo "Connection Succesfull </br>";
              }
            // Perform queries 
            mysql_select_db("touchdev");
			
			
            $query = mysql_query("SELECT User_ID, First_Name, Last_Name, Balance FROM Users");
			
			//$query = mysql_query("SELECT User_ID, First_Name, Last_Name, Balance FROM Users WHERE possibleloginname LIKE '%" . inputvalue . "%'");

            //echo "The table currently contains " . mysql_num_rows($query) . " row(s) </br>";

            while($row = mysql_fetch_array($query)){
                echo "<button class='btn btn-default lijst' data-toggle='modal' id='user' User_ID='" . $row["User_ID"] . "' data-target='#pincodepad'>" . $row["First_Name"] . " " . $row["Last_Name"] . " " . $row["Balance"] . "</button>";
                    }
                    
                    //$row["FirstName"] . "<br />";

            ?></div>
    </div>
    <script>
$(document).ready(function(){
        $('.btn-default').click(function(event){
                $id = $(this).attr('user_id');
                $form_id = document.getElementById('user_id');
                $form_id.value = $id;
        });
});

function idnum(id) { return document.getElementById(id); }
</script>
    <div class="col-md-6">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators"></ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="http://upload.wikimedia.org/wikipedia/en/b/b0/Avatar-Teaser-Poster.jpg" alt="1"
          style="height:95%; width:100%" />
          <div class="carousel-caption">
            <h3>Caption Text</h3>
          </div>
        </div>
        <div class="item">
          <img src="http://www.denhaagdirect.nl/wp-content/uploads/2012/09/poster-ohohintro.png" alt="..."
          style="height:95%; width:100%" />
          <div class="carousel-caption">
            <h3>Caption Text</h3>
          </div>
        </div>
        <div class="item">
          <img src="http://www.watermelondesign.nl/wp-content/uploads/2011/05/Poster-Rubix-House-Party1.jpg" alt="..."
          style="height:95%; width:100%" />
          <div class="carousel-caption">
            <h3>Caption Text</h3>
          </div>
        </div>
      </div>
      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"></a> 
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"></a></div>
      <!-- Carousel -->
    </div>
    <div class="modal fade bs-example-modal-sm" id="pincodepad" tabindex="-1" role="dialog" aria-labelledby="pincodepadlabel"
    aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">�</span> 
            <span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="pincodepadlabel">Pincode</h4>
          </div>
		  <div class="modal-body" id="modalbody">
			<form method="post" action="login.php" id="login_form">
				<input type="hidden" id="user_id" name="user_id" value="" /> 
				<input type="password" class="form-control" id="user_pwd" name="user_pwd" placeholder="&lt;Insert pincode here&gt;" />  
				<div id="keypad" align="center">
					<input type="button" class="btn btn-lg" value="1" onclick="idnum('user_pwd').value+=1;"/>
					<input type="button" class="btn btn-lg" value="2" onclick="idnum('user_pwd').value+=2;"/>
					<input type="button" class="btn btn-lg" value="3" onclick="idnum('user_pwd').value+=3;"/><br/>
					<input type="button" class="btn btn-lg" value="4" onclick="idnum('user_pwd').value+=4;"/>
					<input type="button" class="btn btn-lg" value="5" onclick="idnum('user_pwd').value+=5;"/>
					<input type="button" class="btn btn-lg" value="6" onclick="idnum('user_pwd').value+=6;"/><br/>
					<input type="button" class="btn btn-lg" value="7" onclick="idnum('user_pwd').value+=7;"/>
					<input type="button" class="btn btn-lg" value="8" onclick="idnum('user_pwd').value+=8;"/>
					<input type="button" class="btn btn-lg" value="9" onclick="idnum('user_pwd').value+=9;"/><br/>
					<input type="button" class="btn btn-lg" value="X" onclick="idnum('user_pwd').value=null"/>
					<input type="button" class="btn btn-lg" value="0" onclick="idnum('user_pwd').value+=0;"/>
					<input type="button" class="btn btn-lg" value="&larr;" onclick="idnum('user_pwd').value=idnum('user_pwd').value.substr(0,idnum('user_pwd').value.length-1);"/>
				</div>
				<div id="submit" align="center">
					<input type="submit" class="btn btn-lg" value="OK"/>
					<input type="button" class="btn btn-lg" data-dismiss="modal" value="Annuleren"/>
				</div>
			</form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="agenda">
      <div class="modal-dialog modal-sm" style="height:80%;width:60%">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">�</span> 
            <span class="sr-only">Close</span></button>
            <h4 class="modal-title">Agenda</h4>
          </div>
          <div class="modal-body">
            <img src="http://www.kalender-365.nl/jpg/kalender-februari-2015.jpg" alt="1" style="height:100%; width:100%" />
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
