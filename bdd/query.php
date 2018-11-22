<?php
//AQUI SE HACEN TODAS LAS CONSULTAS SIEMPRE SE VERIFICA QUE LA SESION SEA LA CORRECTA
//lOS DATOS INGRESADOS POR EL USUARIO SON VERIFICADOS Y USADOS MEDIANTE PARAMETROS

$conn_string ="host=localhost port=5432 dbname=medtech user=salvador password=benjibenji2018";
$con = pg_connect($conn_string);

if(!$con){
  echo "Error conectando a la base de datos";
  exit;
}


if(isset($_SESSION['invitado'])){
  $result = pg_query($con,"SELECT doctor_name, description, mail, number, user_name FROM users");
  if(!$result){
    echo "No se pudo extraer la información";
    exit;
  }
}

if(isset($_SESSION['admin']) && $_SESSION['admin'] == hash_hmac('sha256','admin','superman')){
  $id = $_SESSION['id'];
  $result_admin = pg_query($con,"SELECT P.iduser, U.user_name, patient_name, patient_desc, tel_number, P.mail FROM patients as P, users as U WHERE U.iduser = ".$id ." AND P.iduser = ".$id ."");
  $user_query = pg_query($con,"SELECT user_name FROM users WHERE iduser = ". $id ."");
  $user = pg_fetch_row($user_query);
  if(!$result_admin){
    echo "No se pudo extraer la información";
    exit;
  }

  $result = pg_query($con,"SELECT doctor_name, description, mail, number, user_name FROM users");
  if(!$result){
    echo "No se pudo extraer la información";
    exit;
  }
}

if(isset($_SESSION['normal']) && $_SESSION['normal'] == hash_hmac('sha256','normal','pleb')){
  $id = $_SESSION['id'];
  $result_normal = pg_query($con,"SELECT P.iduser, U.user_name, patient_name, patient_desc, tel_number, P.mail FROM patients as P, users as U WHERE U.iduser = ".$id ." AND P.iduser = ".$id ."");
  $user_query = pg_query($con,"SELECT * FROM users WHERE iduser = ". $id ."");
  $user = pg_fetch_row($user_query);
  if(!$result_normal){
    echo "No se pudo extraer la información";
    exit;
  }

  $result = pg_query($con,"SELECT doctor_name, description, mail, number, user_name FROM users");
  if(!$result){
    echo "No se pudo extraer la información";
    exit;
  }
}

pg_close($con);
 ?>
