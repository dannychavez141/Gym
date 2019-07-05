<?php
require 'db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="en">
<head>

       <?php 
 include_once'../cabezera.php';  
?>


    <script type="text/javascript">
		$(document).ready(function()
		{
		$(".country").change(function()
		{
		var id=$(this).val();
		var dataString = 'id='+ id;

		$.ajax
		({
		type: "POST",
		url: "ajax_city.php",
		data: dataString,
		cache: false,
		success: function(html)
		{
		$(".city").html(html);
		} 
		});

		});
		});
		    </script>
		<script type="text/javascript">
		$(document).ready(function()
		{
		$(".country1").change(function()
		{
		var id=$(this).val();
		var dataString = 'id='+ id;

		$.ajax
		({
		type: "POST",
		url: "ajax_city1.php",
		data: dataString,
		cache: false,
		success: function(html)
		{
		$(".city1").html(html);
		} 
		});

		});
		});
    </script>


   <!-- <SCRIPT LANGUAGE="JavaScript">
		function checkIt(evt) {
		    evt = (evt) ? evt : window.event
		    var charCode = (evt.which) ? evt.which : evt.keyCode
		    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		        status = "This field accepts numbers only."
		        return false
		    }
		    status = ""
		    return true
		}
	</SCRIPT>

	<script type="text/javascript" src="webcam.js"></script>-->

</head>
    <body class="page-body  page-fade">

    	<div class="page-container">	
	
		<div class="sidebar-menu">
	
			<header class="logo-env">
			
			<!-- logo -->
			<div class="logo">
				<a href="main.php">
					<img src="../../img/logo.png" alt="" width="192" height="80" />
				</a>
			</div>
			
					<!-- logo collapse icon -->
					<div class="sidebar-collapse">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
							
			
			<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
			<div class="sidebar-mobile-menu visible-xs">
				<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
					<i class="entypo-menu"></i>
				</a>
			</div>
			
			</header>
    		<?php include('nav.php'); ?>
    	</div>

    		<div class="main-content">
		
				<div class="row">
					
					<!-- Profile Info and Notifications -->
					<div class="col-md-6 col-sm-8 clearfix">	
							
					</div>
					
					
					<!-- Raw Links -->
					<div class="col-md-6 col-sm-4 clearfix hidden-xs">
						
						<ul class="list-inline links-list pull-right">

							<li>Bienvenido <?php echo $_SESSION['full_name']; ?> 
							</li>						
						
							<li>
								<a href="logout.php">
									Cerrar Sesión<i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>
						
					</div>
					
				</div>

		<h2>Estado de Salud</h2>

		<hr />

		<form action="submit_health_new.php" enctype="multipart/form-data" method="POST" role="form" class="form-horizontal form-groups-bordered">

			<div class="form-group">
				<label class="col-sm-3 control-label">Cliente</label>
					
					<div class="col-sm-5">						
							<select name="id" id="id" class="select2" >
								<option value="">-- Porfavor seleccione --</option>						
									
												<?php
													$query  = "select * from user_data";
													//echo $query;
													$result = mysqli_query($con, $query);

													if (mysqli_affected_rows($con) != 0) {
													    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
															echo "<option>'". $row['id'] ."','". $row['name'] . "'</option>";
													    }
													}
												?>								

								
							</select>
							
						</div>
			</div>




			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Fecha:</label>					
					<div class="col-sm-5">
						<input type="text" name="date1" id="date1" class="form-control datepicker" value="<?php echo date('Y-m-d'); ?>">
					</div>
			</div>

			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Grasa corporal:</label>					
					<div class="col-sm-5">
						<input type="text" name="bodyfat" id="bodyfat" class="form-control" placeholder="Grasa corporal" >
					</div>
			</div>			

			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Liquidos:</label>					
					<div class="col-sm-5">
						<input type="text" name="water" id="water" class="form-control" placeholder="Liquidos" >
					</div>
			</div>

			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Músculos:</label>					
					<div class="col-sm-5">
						<input type="text" name="muscle" id="muscle" class="form-control" placeholder="Músculos" >
					</div>
			</div>

			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Calorias:</label>					
					<div class="col-sm-5">
						<input type="text" name="calorie" id="calorie" class="form-control" placeholder="Calorias" >
					</div>
			</div>

			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Contextura:</label>					
					<div class="col-sm-5">
						<input type="text" name="bone" id="bone" class="form-control" placeholder="Contextura" >
					</div>
			</div>

			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Observaciones:</label>					
					<div class="col-sm-5">
						<input type="text" name="remarks" id="remarks" class="form-control" placeholder="Observaciones" >
					</div>
			</div>										

			<div class="form-group">		
					<div class="col-sm-offset-3 col-sm-5">
						<button type="submit" class="btn btn-primary">Guardar Cambios</button>	
					</div>
			</div>				
						

                                    
</form>
			<?php include('footer.php'); ?>
    	</div>


    <script src="../../neon/js/gsap/main-gsap.js" id="script-resource-1"></script>
    <script src="../../neon/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
    <script src="../../neon/js/bootstrap.min.js" id="script-resource-3"></script>
    <script src="../../neon/js/joinable.js" id="script-resource-4"></script>
    <script src="../../neon/js/resizeable.js" id="script-resource-5"></script>
    <script src="../../neon/js/neon-api.js" id="script-resource-6"></script>
    <script src="../../neon/js/jquery.validate.min.js" id="script-resource-7"></script>
    <script src="../../neon/js/neon-login.js" id="script-resource-8"></script>
    <script src="../../neon/js/neon-custom.js" id="script-resource-9"></script>
    <script src="../../neon/js/neon-demo.js" id="script-resource-10"></script>
	<script src="../../neon/js/select2/select2.min.js" id="script-resource-7"></script>
	<link rel="stylesheet" href="../../neon/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet" href="../../neon/js/select2/select2.css"  id="style-resource-2">
	<link rel="stylesheet" href=".../../neon/js/selectboxit/jquery.selectBoxIt.css"  id="style-resource-3">
	<link rel="stylesheet" href="../../neon/js/daterangepicker/daterangepicker-bs3.css"  id="style-resource-4">    



    </body>
</html>

