<?php

include("connect.php");
session_start();

if(isset($_POST['guest'])){
  $token = bin2hex(openssl_random_pseudo_bytes(64));
  $_SESSION['invitado'] = $token;
  header("Location: guest.php");
}else{
  header("Location: index.php");
}

pg_close($con);

 ?>
