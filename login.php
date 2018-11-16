<?php
session_start();

if(isset($_SESSION['normal'])){
  header("Location: patients.php");
}

if(isset($_SESSION['admin'])){
  header("Location: admin.php");
}

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Bienvenido</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="css/styles.css" rel="stylesheet" type="text/css"/>
</head>
<body>
  <div class="padre">
  <div class="card">
    <div class="container">
      <h1 class="texto1" style="font-size:3vw">Iniciar Sesión</h1>
      <form id="LoginForm" action="verify.php" method="POST">
        <input type="text"  id="inputUser" placeholder="Usuario" name="inputUser" required><br>
        <input type="password"  id="inputPass" placeholder="Contraseña" name="inputPass" required><br>
        <button type="submit" id="Acceder">Acceder</button>
      </form>
    </div>
  </div>
</div>

</body>
</html>
