<?php
session_start();
if(!isset($_SESSION['normal'])){
  header("Location: login.php");
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
    <link href="css/modalBox.css" rel="stylesheet" type="text/css"/>
</head>
<body>
  <!-- The Modal -->
  <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <span class="close" onclick="closeBox();">&times;</span>
      <h1 style="font-size:3vw">Crear paciente</h1>
      <form id="AddMedicForm" action="verify.php" method="POST">
        <input type="text"  name="addUser" placeholder="Usuario" required><br>
        <input type="desc" name="addDesc" placeholder="Descripción" required/><br>
        <input type="text" name="addNumber" placeholder="Número" required/><br>
        <input type="text" name="addMail" placeholder="Correo" required/><br>
        <button type="submit" id="Guardar" name="add_paciente">Guardar</button>
      </form>
    </div>
  </div>
<!-- The Modal -->
<div id="myModal2" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" onclick="closeBox2();">&times;</span>
    <p style="font-size:1vw">Editar Usuario</p>
    <form id="EditMedicForm" action="verify.php" method="POST">
      <input type="text"  name="editUser" placeholder="Usuario" value="valor de la base" required/><br>
      <p>Dejar en blanco para no cambiar</p>
      <label style="font-size:1vw">Contraseña vieja: </label> <input type="password"  name="oldPass" /><br>
      <label style="font-size:1vw">Contraseña nueva: </label><input type="password"  name="newPass" /><br>
      <input type="text" name="editNumber" placeholder="Número" value="valor de la base" required/><br>
      <input type="text" name="editDesc" placeholder="Descripción" value="valor de la base" required/><br>
      <input type="text" name="editMail" placeholder="E-mail" value="valor de la base" required/>
      <button type="submit" id="Editar" name="editar_usuario">Guardar</button>
    </form>
  </div>
</div>

    <script>
    // Get the modal
    var modal = document.getElementById('myModal');
    var modal2 = document.getElementById('myModal2');
    function popBox(){
      modal.style.display = "block";
    }
    function closeBox(){
      modal.style.display = "none";
      document.getElementById('AddMedicForm').reset();
    }
    function popBox2(){
      modal2.style.display = "block";
    }
    function closeBox2(){
      modal2.style.display = "none";
      document.getElementById('EditMedicForm').reset();
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal || event.target == modal2) {
            modal.style.display = "none";
            modal2.style.display = "none";
            document.getElementById('AddMedicForm').reset();
            document.getElementById('EditMedicForm').reset();
        }
    }
    </script>
  <div class="topnav">
    <a href="logout.php">SALIR</a>
    <a href="doctors.php">DOCTORES</a>
    <a href="#" onclick="popBox();">AÑADIR PACIENTE</a>
    <a href="patients.php" class="active">INICIO</a>
    <a href="#" onclick="popBox2();"><?php echo $user[0];  ?></a>
  </div>

  <?php
    while ($row = pg_fetch_row($result_normal)) {
    echo '
    <div class="main">
      <div class="padre">
      <div class="card">
        <div class="container">
          <h2>'.$row[2].'</h2>
          <p>'.$row[3].'</p>
          <h3>'.$row[5].'</h3>
            <div>'.$row[4].'</div>
        </div>
      </div>
    </div>
    </div>
    ';
  }
  pg_free_result($result_normal);
  pg_close($con);
   ?>

</body>
</html>
