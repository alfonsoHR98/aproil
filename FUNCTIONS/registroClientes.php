<?php

  include('../FUNCTIONS/conn.php');
  if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $rfc = $_POST['rfc'];
    $correo = $_POST['email'];
    $telefono = $_POST['telefono'];

    $sql = "INSERT INTO clientes (nombre,direccion,rfc,correo,telefono) 
    VALUES ('$nombre','$direccion','$rfc','$correo','$telefono')";

    if ($conn->query($sql) === TRUE) {
      echo "
        <script languaje='JavaScript'>
          alert('Los datos se registraron correctamente de la base de datos');
        </script>
      ";
      header('Location: ../PAGES/principal.php?opcion=RegistroClientes');
    }else{
      echo "
        <script languaje='JavaScript'>
          alert('Los datos NO se registraron correctamente de la base de datos');
        </script>
      ";
      header('Location: ../PAGES/principal.php?opcion=RegistroClientes');
    }
  }
?>