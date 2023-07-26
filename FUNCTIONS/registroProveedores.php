<?php

  include('../FUNCTIONS/conn.php');
  if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $nombre = $_POST['nombre'];
    $rfc = $_POST['rfc'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];

    $sql = "INSERT INTO provedores (nombre,rfc,telefono,direccion,correo) 
    VALUES ('$nombre','$rfc','$telefono','$direccion','$email')";

    if ($conn->query($sql) === TRUE) {
      echo "
        <script languaje='JavaScript'>
          alert('Los datos se registraron correctamente de la base de datos');
        </script>
      ";
      header('Location: ../PAGES/principal.php?opcion=RegistroProveedores');
    }else{
      echo "
        <script languaje='JavaScript'>
          alert('Los datos NO se registraron correctamente de la base de datos');
        </script>
      ";
      header('Location: ../PAGES/principal.php?opcion=RegistroProveedores');
    }
  }
?>