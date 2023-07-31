<?php 
  include '../conn.php';

  $id_lote = $_POST['id_lote'];
  $id_proveedor = $_POST['id_provedor'];
  $id_almacen = $_POST['id_almacen'];

  $sql_lote = "INSERT INTO lotes (id_lote, id_provedor) VALUES ('$id_lote','$id_proveedor')";
  $sql_almacen = "INSERT INTO almacen_lotes (id_almacen, id_lote) VALUES ('$id_almacen','$id_lote')";

  if ($conn->query($sql_lote) === TRUE AND $conn ->query($sql_almacen) === TRUE) {
    header('Location: ../../PAGES/Registros/registrarLoteProductos.php?id='.$id_lote.'');
  }else{
    echo '<script>alert("No se registro correctamente el lote");</script>';
    header('Location: ../../PAGES/principal.php?opcion=RegistroLotes');
  }

?>