<?php 
  $id = $_GET['id'];

  include '../conn.php';

  $sql = "DELETE FROM provedores WHERE id_provedor = $id";

  if ($conn->query($sql) == TRUE) {
    echo "
      <script languaje='JavaScript'>
        alert('Los datos se eliminaron correctamente de la base de datos');
      </script>
    ";
    header('Location: ../../PAGES/principal.php?opcion=EdicionProveedores');
  }else{
    echo "
      <script languaje='JavaScript'>
        alert('Los datos NO se eliminaron correctamente de la base de datos');
      </script>
    ";
    header('Location: ../../PAGES/principal.php?opcion=EdicionProveedores');
  }
?>