<?php
include("connect.php");

if(isset($_SESSION['invitado'])){
  $result = pg_query($con, "SELECT doctor_name, description, mail, number FROM users");
  if(!$result){
    echo "No se pudo extraer la información";
    exit;
  }
}

if(isset($_SESSION['admin']) && $_SESSION['admin'] == hash_hmac('sha256','admin','superman')){
  $id = $_SESSION['id'];
  /*REEMPLAZAR EN LA QUERY RESULT_ADMIN EL ID*/
  $result_admin = pg_query($con, "SELECT P.iduser, U.user_name, patient_name, patient_desc, tel_number, P.mail FROM patients as P, users as U WHERE P.iduser = U.iduser");
  $user_query = pg_query($con, "SELECT user_name FROM users WHERE iduser = ". $id ."");
  $user = pg_fetch_row($user_query);
  if(!$result_admin){
    echo "No se pudo extraer la información";
    exit;
  }


}





 ?>
