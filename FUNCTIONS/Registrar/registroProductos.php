<?php

  require '../conn.php';

  if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $nombre = $_POST['nombre'];
    $caracteristicas = $_POST['caracteristicas'];
    $unidad = $_POST['unidad'];
    $marca = $_POST['marca'];

    $sql = "INSERT INTO productos (nombre,caracteristicas,unidad,marca) 
    VALUES ('$nombre','$caracteristicas','$unidad','$marca')";

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