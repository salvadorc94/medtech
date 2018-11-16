<?php
include("connect.php");

if(isset($_SESSION['invitado'])){
  $result = pg_query($con, "SELECT doctor_name, description, mail, number FROM users");
  if(!$result){
    echo "No se pudo extraer la información";
    exit;
  }

}





 ?>
