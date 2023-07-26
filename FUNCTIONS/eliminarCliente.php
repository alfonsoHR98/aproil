<?php 
  $id = $_GET['id'];

  include('../FUNCTIONS/conn.php');

  $sql = "DELETE FROM clientes WHERE id_cliente = $id";

  if ($conn->query($sql) == TRUE) {
    echo "
      <script languaje='JavaScript'>
        alert('Los datos se eliminaron correctamente de la base de datos');
      </script>
    ";
    header('Location: ../PAGES/principal.php?opcion=EdicionClientes');
  }else{
    echo "
      <script languaje='JavaScript'>
        alert('Los datos NO se eliminaron correctamente de la base de datos');
      </script>
    ";
    header('Location: ../PAGES/principal.php?opcion=EdicionClientes');
  }
?>