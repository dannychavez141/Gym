<?php
require 'db_conn.php';
page_protect();
if (isset($_POST['id'])) {
    
    $id = rtrim($_POST['id']);
    $date1 = rtrim($_POST['date1']);
    $bodyfat   = rtrim($_POST['bodyfat']);
    $water   = rtrim($_POST['water']);
    $muscle  = rtrim($_POST['muscle']);
    $calorie = rtrim($_POST['calorie']);
    $bone    = rtrim($_POST['bone']);
    $remarks = rtrim($_POST['remarks']);

$sql="INSERT INTO healthstatus (id,name, date1,bodyfat,water,muscle,calorie,bone,remarks)
VALUES ($id,'$date1','$bodyfat','$water','$muscle','$calorie','$bone','$remarks')";
    
    
    
    mysqli_query($con, $sql);
 echo "<head><script>alert('ESTADO DE SALUD AGREGADO');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=view_health.php'>";
} else {
    echo "<head><script>alert('Profile NOT Updated, Check Again');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_health.php'>";
    
}
?>
