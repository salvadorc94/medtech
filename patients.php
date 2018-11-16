<?php
session_start();
if(!isset($_SESSION['normal'])){
  header("Location: login.php");
}
//include("bdd/query.php");
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
<div id="myModal2" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" onclick="closeBox2();">&times;</span>
    <p style="font-size:1vw">Editar Usuario</p>
    <form id="EditMedicForm">
      <input type="text"  id="editUser" placeholder="Usuario" value="valor de la base"><br>
      <p>Dejar en blanco para no cambiar</p>
      <label style="font-size:1vw">Contraseña vieja: </label> <input type="password"  id="oldPass" /><br>
      <label style="font-size:1vw">Contraseña nueva: </label><input type="password"  id="newPass" /><br>
      <input type="text" id="editNumber" placeholder="Número" value="valor de la base"/><br>
      <input type="desc" id="editDesc" placeholder="Descripción" value="valor de la base"/><br>
      <button type="submit" id="Editar">Guardar</button>
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
    <a href="patients.php" class="active">INICIO</a>
    <a href="#" onclick="popBox2();">doctor_name</a>
  </div>

  <div class="main">
    <div class="padre">
    <div class="card">
      <div class="container">
        <h2>Nombre_paciente</h2>
        <p>Este paciente es chevere</p>
        <h3>Correo</h3>
          <div>Telefono1, Telefono2, Telefono3, Telefono4</div>
      </div>
    </div>
  </div>

</body>
</html>
