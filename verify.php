<?php

include("bdd/connect.php");
include("bdd/query.php");
session_start();

if(isset($_POST['guest'])){
  $token = bin2hex(openssl_random_pseudo_bytes(64));
  $_SESSION['invitado'] = $token;
  header("Location: guest.php");
  break;
}else{
  header("Location: index.php");
}

if(isset($_POST['editar_admin'])){
  $id = $_SESSION['id'];
  $encrypted_pass = hash_hmac('sha256',$_POST['oldPass'],'pasaje');
  $new_pass = hash_hmac('sha256',$_POST['newPass'],'pasaje');
  $db_pass = pg_query($con,"SELECT pass FROM users WHERE iduser=". $id ."");
  $row = pg_fetch_row($db_pass);

  $cadena_tratada = trim($_POST['newPass']);
  if($row[0] == $encrypted_pass && $cadena_tratada != ""){
    pg_query_params($con,'UPDATE users SET pass= $1 WHERE iduser= $2',array($new_pass,$id));
    //Se pudo
  }else{
    //No se pudo
  }
  unset($_POST["editar_admin"] );
}

if(isset($_POST['add_medic'])){
  $user = trim($_POST['addUser']);
  $nombre = trim($_POST['addNombre']);
  $pass = trim($_POST['addPass']);
  $num = trim($_POST['addNumber']);
  $desc = trim($_POST['addDesc']);
  $mail = trim($_POST['addMail']);
  $encrypted_pass = hash_hmac('sha256',$pass,'pasaje');

  if($user != "" && $num != "" && $desc != "" && $nombre != "" && $pass != "" && $mail != ""){
    pg_query_params($con,'INSERT INTO users(user_name, pass, doctor_name, description, mail, number) VALUES($1,$2,$3,$4,$5,$6)',array($user,$encrypted_pass,$nombre,$desc,$mail,$num));
    //Se pudo
  }else{
    //No se pudo
  }
  unset($_POST["add_medic"] );
}

if(isset($_POST['add_paciente'])){
  $id = $_SESSION['id'];
  $user = trim($_POST['addUser']);
  $num = trim($_POST['addNumber']);
  $desc = trim($_POST['addDesc']);
  $mail = trim($_POST['addMail']);
  if($user != "" && $num != "" && $desc != "" && $mail != ""){
    pg_query_params($con,'INSERT INTO patients(patient_name, patient_desc, iduser, tel_number, mail) VALUES($1,$2,$3,$4,$5)',array($user,$desc,$id,$num,$mail));
    //Se pudo
  }else{
    //No se pudo
  }
  unset($_POST["add_paciente"] );
}


if(!isset($_POST['inputUser']) && !isset($_POST['inputPass'])){
  header("Location: login.php");
}else{
  $encrypted_pass = hash_hmac('sha256',$_POST['inputPass'],'pasaje');
  $result_login = pg_query_params($con, 'SELECT user_name, pass, iduser FROM users WHERE user_name = $1 AND pass = $2 limit 1', array($_POST['inputUser'], $encrypted_pass));
  $row = pg_fetch_row($result_login);
  if($row[0] != ""){
    if($row[0] == "admin"){
      $_SESSION['admin'] = hash_hmac('sha256','admin','superman');
      $_SESSION['id'] = $row[2];
    header("Location: admin.php");
    }else{
      $_SESSION['normal'] = hash_hmac('sha256','normal','pleb');
      $_SESSION['id'] = $row[2];
      header("Location: patients.php");
    }
  }else{
  header("Location: login.php");
  }
}
/*
pg_free_result($result_login);
pg_close($con);
*/
 ?>
