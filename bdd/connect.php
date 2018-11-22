<?php
  //ESTA ES LA CONEXION A LA BDD
  //localhost only
  //$conn_string = "host=localhost port=5432 dbname=medtech user=postgres password=root";
  $conn_string ="host=localhost port=5432 dbname=medtech user=salvador password=benjibenji2018";
  $con = pg_connect($conn_string);

  if(!$con){
    echo "Error conectando a la base de datos";
    exit;
  }

 ?>
