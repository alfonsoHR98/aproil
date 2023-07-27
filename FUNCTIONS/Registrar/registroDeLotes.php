<?php 
  include '../conn.php';

  $id_lote = $_POST['id_lote'];
  $id_proveedor = $_POST['id_provedor'];

  $sql_lote = "INSERT INTO lotes (id_lote, id_provedor) VALUES ('$id_lote','$id_proveedor')";

  if ($conn->query($sql_lote) === TRUE) {
    header('Location: ../../PAGES/Registros/registrarLoteProductos.php?id='.$id_lote.'');
  }else{
    echo '<script>alert("No se registro correctamente el lote");</script>';
    header('Location: ../../PAGES/principal.php?opcion=RegistroLotes');
  }

?>