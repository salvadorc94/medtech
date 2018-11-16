<?php
session_start();
if(!isset($_SESSION['invitado'])){
  header("Location: index.php");
}
include("bdd/query.php");
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Invitado</title>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="css/guestStyle.css" rel="stylesheet" type="text/css"/>
</head>
<body>

  <div class="topnav">
    <a href="logout.php" class="active">SALIR</a>
  </div>

<?php
  while ($row = pg_fetch_row($result)) {
  echo '
  <div class="main">
    <div class="padre">
    <div class="card">
      <div class="container">
        <h2>'.$row[0].'</h2>
        <p>'.$row[1].'</p>
        <h3>'.$row[2].'</h3>
          <div>'.$row[3].'</div>
      </div>
    </div>
  </div>
  </div>
  ';
}
pg_free_result($result);
pg_close($con);
 ?>

</body>
</html>
