<?php
require 'db_conn.php';
page_protect();
if (isset($_POST['p_id'])) {
    
    
    $date      = $_POST['date'];
    $full_name = rtrim($_POST['p_name']);
    $email     = rtrim($_POST['email']);
    $address   = rtrim($_POST['add']);
    $contactperson   = rtrim($_POST['contactperson']);
    $height    = rtrim($_POST['height']);
    $weight    = rtrim($_POST['weight']);
    $nproof    = rtrim($_POST['nproof']);
    
    $p_id = $_POST['p_id'];
    
    mysqli_query($con, "UPDATE user_data SET name='$full_name', address='$address', contactperson='$contactperson', email='$email', height='$height', weight='$weight', joining='$date',nproof='$nproof' WHERE newid='$p_id'");
    echo "<meta http-equiv='refresh' content='0; url=view_mem.php'>";
} else {
    echo "<head><script>alert('Miembro no Actualizado, Verificar Datos');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_mem.php'>";
    
}
?>
