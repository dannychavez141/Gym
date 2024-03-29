<?php
require 'db_conn.php';
page_protect();
if (isset($_POST['p_id'])) {
    function getRandomWord($len = 3)
    {
        $word = array_merge(range('a', 'z'), range('0', '9'));
        shuffle($word);
        return substr(implode($word), 0, $len);
    }
    $memid    = $_POST['p_id'];
    $mem_type = $_POST['mem_type'];
    
    $query1 = "select * from mem_types WHERE mem_type_id='$mem_type'";
    
    //echo $query;
    $result1 = mysqli_query($con, $query1);
    
    if (mysqli_affected_rows($con) == 1) {
        while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
            
            $name_type = $row1['name'];
            $details   = $row1['details'];
            $days      = $row1['days'];
            
            
        }
    }
    $query2 = "select * from user_data WHERE newid='$memid'";
    
    //echo $query;
    $result2 = mysqli_query($con, $query2);
    
    if (mysqli_affected_rows($con) == 1) {
        while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
            
            $full_name = $row2['name'];
            $age       = $row2['age'];
            $sex       = $row2['sex'];
            $height    = $row2['height'];
            $weight    = $row2['weight'];
            
            
        }
    }
    
    
    $invoice   = substr(time(), 2, 10) . getRandomWord();
    $date      = $_POST['date'];
    $full_name = rtrim($_POST['p_name']);
    $total     = $_POST['total'];
    $paid      = $_POST['paid'];
    $mod_date  = strtotime($date . "+ $days days");
    $expiry    = date("Y-m-d", $mod_date);
    $wait      = "no";
    $time      = $days * 86400;
    $exp_time  = $time + strtotime($date);
    $bal       = $total - $paid;
    mysqli_query($con, "UPDATE subsciption SET renewal='no' WHERE renewal='yes' AND mem_id='$memid'");
    mysqli_query($con, "INSERT INTO subsciption (mem_id,name,sub_type,paid_date,total,paid,expiry,invoice,sub_type_name,bal,exp_time,renewal)
VALUES ('$memid','$full_name','$mem_type','$date','$total','$paid','$expiry','$invoice','$name_type','$bal','$exp_time','yes')");
    echo "<head><script>alert('Payment Added ,');</script></head></html>";
    
    
    
} else {
    echo "<head><script>alert('Payment NOT Added, Check Again');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=new_entry.php'>";
    
}
?>
<!doctype html>

	<head>
		<meta charset="utf-8">
		<title>Recibo</title>
		<link rel="stylesheet" href="style.css">
		<script src="script.js"></script>
 <script type="text/javascript" src="jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="jquery-barcode.js"></script>
    <script type="text/javascript">
  
      function generateBarcode(){
        var value = "<?php
echo $invoice;
?>";
        var btype = "code128";
        var renderer = "css";
        
		var quietZone = false;
        if ($("#quietzone").is(':checked') || $("#quietzone").attr('checked')){
          quietZone = true;
        }
		
        var settings = {
          output:renderer,
          bgColor: $("#bgColor").val(),
          color: $("#color").val(),
         
          moduleSize: $("#moduleSize").val(),
          posX: $("#posX").val(),
          posY: $("#posY").val(),
          addQuietZone: $("#quietZoneSize").val()
        };
        if ($("#rectangular").is(':checked') || $("#rectangular").attr('checked')){
          value = {code:value, rect: true};
        }
        if (renderer == 'canvas'){
          clearCanvas();
          $("#barcodeTarget").hide();
          $("#canvasTarget").show().barcode(value, btype, settings);
        } else {
          $("#canvasTarget").hide();
          $("#barcodeTarget").html("").show().barcode(value, btype, settings);
        }
      }
          
      function showConfig1D(){
        $('.config .barcode1D').show();
        $('.config .barcode2D').hide();
      }
      
      function showConfig2D(){
        $('.config .barcode1D').hide();
        $('.config .barcode2D').show();
      }
      
      function clearCanvas(){
        var canvas = $('#canvasTarget').get(0);
        var ctx = canvas.getContext('2d');
        ctx.lineWidth = 1;
        ctx.lineCap = 'butt';
        ctx.fillStyle = '#FFFFFF';
        ctx.strokeStyle  = '#000000';
        ctx.clearRect (0, 0, canvas.width, canvas.height);
        ctx.strokeRect (0, 0, canvas.width, canvas.height);
      }
      
      $(function(){
        $('input[name=btype]').click(function(){
          if ($(this).attr('id') == 'datamatrix') showConfig2D(); else showConfig1D();
        });
        $('input[name=renderer]').click(function(){
          if ($(this).attr('id') == 'canvas') $('#miscCanvas').show(); else $('#miscCanvas').hide();
        });
        generateBarcode();
      });
  
    </script>
	</head>
	<body>
		<header>
			<a href="payments.php"><h1>Factura (Pagos)</h1></a>
      <address>
        <p>RAPAZZ Gym</p>
        <p>Psje. San Francisco Mz. 183 Lte. 21 Yarinacocha, Peru</p>
        <p>Celular:+51 995 530 374</p><br><p><div id="barcodeTarget" class="barcodeTarget"></div>
    <canvas id="canvasTarget"></canvas> </span>
      </address>
      <span><img alt="" src="../../img/logo.png" width="350" height="100">
		</header>
		<article><img alt="" src="pic1.jpg" width="100" height="100">
			<table class="meta">
				<tr>
					<th><span  >Recibo #</span></th>
					<td><span  ><?php
echo $invoice;
?></span></td>
				</tr>
				<tr>
					<th><span  >Fecha</span></th>
					<td><span  ><?php
echo $date;
?></span></td>
				</tr>
				<tr>
					<th><span  >ID Miembro</span></th>
					<td><?php
echo $memid;
?></span></td>
				</tr>
			</table>	
<table class="meta">
				<tr>
					<th><span  >Nombre</span></th>
					<td><span  ><?php
echo $full_name;
?></span></td>
				</tr>
				<tr>
					<th><span  >Edad, Sexo</span></th>
					<td><span  ><?php
echo $age . " / " . $sex;
?></span></td>
				</tr>
				<tr>
					<th><span  >Altura / Peso</span></th>
					<td><?php
echo $height . "  FEET / " . $weight . " Kg";
?></span></td>
				</tr>
			</table>	
<table class="inventory">
				<thead>
					<tr>
						<th><span  >Tipo Membresia</span></th>
						<th><span  >Detalles</span></th>
						<th><span  >Expiracion de suscripción</span></th>
						
					</tr>
				</thead>

				<tbody>
					<tr>
						<td><span  ><?php
echo $name_type;
?></span></td>
						<td><span  ><?php
echo $details . " For " . $days;
?></span></td>
						<td><span  ><?php
echo $expiry;
?></span></td>
					</tr>
				</tbody>
			</table>
			
			
			
			<table class="balance">
				<tr>
					<th><span  >Total</span></th>
					<td><span data-prefix>$</span><span><?php
echo $total;
?></span></td>
				</tr><tr>
					<th><span  >Pagado</span></th>
					<td><span data-prefix>$</span><span><?php
echo $paid;
?></span></td>
				</tr><tr>
					<th><span  >Deuda</span></th>
					<td><span data-prefix>$</span><span><?php
echo $total - $paid;
?></span></td>
				</tr>
				
			</table>
    </article>
    <aside>
      <h1><span  >Notas Adicionales</span></h1>
      <div  >
        <p>1). Todos los miembros deben respetar nuestros TNC / normas normalmente de miembros podrán retirarse. </br> </br> 2). El pago no es transferible y no es reembolsable. </br> </br> 3). Comision en caso de presentarse dentro de los 5 días hábiles antes de la expiración sometidos , de lo contrario 100 PHP / día se le cobrará . </br> </br> 4). Todos los usuarios deben vestir apropiadamente O según aconseja. </br> </br> 5). Fumar NO está permitido en el sitio de la gimnasia . </br> </br> 6). Un PHP 1000 para romper / scracthing gafas que pertenecen a " gimnasio de Platea21 " se impondrá .
      </div>
    </aside><center><br><br><a href="view_mem.php">RAPAZZ Gym </center>
  </body>
</html>
