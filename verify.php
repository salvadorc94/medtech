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


if(!isset($_POST['inputUser']) && !isset($_POST['inputPass'])){
  header("Location: login.php");
}else{
  $encrypted_pass = hash_hmac('sha256',$_POST['inputPass'],'superman');
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
pg_free_result($result_login);
pg_close($con);

 ?>
