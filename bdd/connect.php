<?php
  //ESTA ES LA CONEXION A LA BDD
  $conn_string = "host=localhost port=5432 dbname=medtech user=postgres password=root";
  $con = pg_connect($conn_string);


  if(!$con){
    echo "Error conectando a la base de datos";
    exit;
  }

 ?>
