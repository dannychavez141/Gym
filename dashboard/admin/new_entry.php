﻿<?php
require 'db_conn.php';
page_protect();
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>RAPAZZ Gym</title>
    <link rel="stylesheet" href="../../neon/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
    <link rel="stylesheet" href="../../neon/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
    <link rel="stylesheet" href="../../neon/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
    <link rel="stylesheet" href="../../neon/css/neon.css"  id="style-resource-5">
    <link rel="stylesheet" href="../../neon/css/custom.css"  id="style-resource-6">

	<!-- jQuery UI -->
	<link rel="stylesheet" href="../../css/plugins/jquery-ui/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="../../css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
	<!-- Fullcalendar -->
	<link rel="stylesheet" href="../../css/plugins/fullcalendar/fullcalendar.css">
	<link rel="stylesheet" href="../../css/plugins/fullcalendar/fullcalendar.print.css" media="print">

	<!-- Tagsinput -->
	<link rel="stylesheet" href="../../css/plugins/tagsinput/jquery.tagsinput.css">
	<!-- chosen -->
	<link rel="stylesheet" href="../../css/plugins/chosen/chosen.css">
	<!-- multi select -->
	<link rel="stylesheet" href="../../css/plugins/multiselect/multi-select.css">
	<!-- timepicker -->
	<link rel="stylesheet" href="../../css/plugins/timepicker/bootstrap-timepicker.min.css">
	<!-- colorpicker -->
	<link rel="stylesheet" href="../../css/plugins/colorpicker/colorpicker.css">
	<!-- Datepicker -->
	<link rel="stylesheet" href="../../css/plugins/datepicker/datepicker.css">
	<!-- Plupload -->
	<link rel="stylesheet" href="../../css/plugins/plupload/jquery.plupload.queue.css">


	<!-- jQuery -->
	<script src="../../js/jquery.min.js"></script>
	<!-- jQuery UI -->
	<script src="../../js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
	<script src="../../js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
	<script src="../../js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
	<script src="../../js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
	<script src="../../js/plugins/jquery-ui/jquery.ui.spinner.js"></script>
	<script src="../../js/plugins/jquery-ui/jquery.ui.slider.js"></script>
	<!-- Bootstrap -->
	<script src="../../js/bootstrap.min.js"></script>
	<!-- Datepicker -->
	<script src="../../js/plugins/datepicker/bootstrap-datepicker.js"></script>
	<!-- Timepicker -->
	<script src="../../js/plugins/timepicker/bootstrap-timepicker.min.js"></script>
	
	<!-- Theme framework -->
	<script src="../../js/eakroko.min.js"></script>
	<!-- Theme scripts -->
	<script src="../../js/application.min.js"></script>
	<!-- Just for demonstration -->
	<script src="../../js/demonstration.min.js"></script>
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


    <SCRIPT LANGUAGE="JavaScript">
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

	<script type="text/javascript" src="webcam.js"></script>

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

		<h3>Nueva Entrada</h3>

		<hr />
		
		<form action="new_submit.php" method="POST" class="form-horizontal form-groups-bordered">
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">ID Membresia :</label>					
					<div class="col-sm-5">
						<input type="text" name="p_id" value="<?php echo time(); ?>" class="form-control" readonly/>
					</div>
			</div>

			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Fotografia:</label>					
					<div class="col-sm-5">
						<script language="JavaScript">
								document.write( webcam.get_html(300, 220) );
						</script>
						<script language="JavaScript">
						    webcam.set_api_url( 'test.php' );
								webcam.set_quality( 100 ); // JPEG quality (1 - 100)
								webcam.set_shutter_sound( true ); // play shutter click sound
								webcam.set_hook( 'onComplete', 'my_completion_handler' );

								function take_snapshot(){
									// take snapshot and upload to server
									webcam.snap();
								}

						
						</script>		
						<input type=button  class="btn btn-primary" value="Tomar Foto" onClick="take_snapshot()">
					</div>
			</div>

			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Nombre :</label>					
					<div class="col-sm-5">
						<input type="text" name="p_name" id="textfield3" class="form-control" data-rule-required="true" data-rule-minlength="4" placeholder="Nombres y Apellidos de miembro" maxlength="30" required="">
					</div>
			</div>

			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Direccion :</label>					
					<div class="col-sm-5">
						<input type="text" name="add" id="textfield5" class="form-control" data-rule-required="true" data-rule-minlength="6" placeholder="Direccion"required="">
					</div>
			</div>
										
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Fecha de Nacimiento :</label>			
					<div class="col-sm-5">
						<input type="text" placeholder="seleccione Fecha de Nacimiento" name="birthdate" id="birthdate" class="form-control datepicker" data-format="yyyy-m-d"required="">
					</div>
			</div>

			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Sexo :</label>					
					<div class="col-sm-5">
						<select name="sex" id="bbb" data-rule-required="true" class="form-control">
						  <option value="Masculino">Masculino</option>
						    <option value="Femenino">Femenino</option>
						</select>
					</div>
			</div>

			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Altura :</label>					
					<div class="col-sm-5">
						<input type="number" name="height" id="textfield" class="form-control" data-rule-required="true" data-rule-minlength="1" placeholder="Altura"  min="0" max="500"required=""> (En Cms)
					</div>
			</div>		

			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Peso :</label>					
					<div class="col-sm-5">
						<input type="number" name="weight" id="textfield" class="form-control" data-rule-required="true" data-rule-minlength="1" placeholder="Peso"  min="0" max="500"required=""> (En Kgs)
					</div>
			</div>			

			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Correo Electronico:</label>					
					<div class="col-sm-5">
						<input type="text" name="email"  id="emailfield" class="form-control" data-rule-minlength="5" placeholder="E-Mail" maxlength="60"required="">
					</div>
			</div>
	
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Telefono / Celular:</label>					
					<div class="col-sm-5">
						<input type="text" name="contactperson"  id="contactperson" class="form-control" data-rule-minlength="5" placeholder="Telefono / Celular" maxlength="60"required="">
					</div>
			</div>
																						
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Identificacion:</label>					
					<div class="col-sm-5">
						<select name="proof" id="bbb" data-rule-required="true" class="form-control">
							    <option value="DNI">DNI</option>
							    <option value="Tarjeta de Votacion">Tarjeta de Votacion</option>
								<option value="Licencia de Conducir">Licencia de Conducir</option>
								<option value="Pasaporte">Pasaporte</option>
								<option value="Universidad /Escuela ID">Universidad /Escuela ID</option>
								<option value="Otros">Otros</option>
						</select>
						
					</div>
			</div>
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">N° de Identificacion:</label>					
					<div class="col-sm-5">
						<input type="text" name="nproof"  id="nproof" class="form-control" placeholder="N° de Identificacion" maxlength="15"required="">
					</div>
			</div>

			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">InscripcionFecha :</label>					
					<div class="col-sm-5">
						<input type="text" name="date" id="textfield22" value="<?php echo date('Y-m-d'); ?>"required="">
					</div>
			</div>			

			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Tipo Membresia :</label>					
					<div class="col-sm-5">
						 <select name="mem_type" id="id" data-rule-required="true" class="country">
							<option value="">-- Porfavor seleccione --</option>
							<?php

								$query = "select * from mem_types";

								//echo $query;
								$result = mysqli_query($con, $query);

								if (mysqli_affected_rows($con) != 0) {
								    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
								        echo "<option value=" . $row['mem_type_id'] . ">" . $row['name'] . "</option>";
								        
								    }
								}

							?>
						</select>

						<span class="selectRequiredMsg">Porfavor seleccione un tipo de menbresia</span>
					</div>					
			</div>



			<div class="form-group">		
					<div class="col-sm-offset-3 col-sm-5">
						<div class="city"></div>
					</div>
			</div>				

			<div class="form-group">		
					<div class="col-sm-offset-3 col-sm-5">
						<button type="submit" class="btn btn-primary">Registrar Miembro</button>	
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
    <script src="../../neon/js/bootstrap-datepicker.js" id="script-resource-11"></script>

    <script type="text/javascript">
		var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
		var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
		var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
		var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
		var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
		var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
    </script>
    </body>
</html>

