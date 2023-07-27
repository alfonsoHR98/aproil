<?php

  include('../conn.php');
  if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $nombre = $_POST['nombre'];
    $caracteristicas = $_POST['caracteristicas'];
    $unidad = $_POST['unidad'];

    $sql = "INSERT INTO productos (nombre,caracteristicas,unidad) 
    VALUES ('$nombre','$caracteristicas','$unidad')";

    if ($conn->query($sql) === TRUE) {
      echo "
        <script languaje='JavaScript'>
          alert('Los datos se registraron correctamente de la base de datos');
        </script>
      ";
      header('Location: ../../PAGES/principal.php?opcion=RegistroProductos');
    }else{
      echo "
        <script languaje='JavaScript'>
          alert('Los datos NO se registraron correctamente de la base de datos');
        </script>
      ";
      header('Location: ../../PAGES/principal.php?opcion=RegistroProductos');
    }
  }
?>