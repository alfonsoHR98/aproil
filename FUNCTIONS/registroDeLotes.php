<?php 
  include '../FUNCTIONS/conn.php';

  $id_lote = $_POST['id_lote'];
  $id_proveedor = $_POST['id_proveedor'];
  $id_productos = $_POST['id_producto'];
  $cantidad_productos = $_POST['cantidad_producto'];
  $precio_productos = $_POST['precio_producto'];

  $sql_lote = "INSERT INTO lotes (id_lote, id_provedor) VALUES ('$id_lote','$id_proveedor')";

  if ($conn->query($sql_lote) === TRUE) {
    for ($i = 0; $i < count($id_productos); $i++) {
      $id_producto = $id_productos[$i];
      $cantidad_producto = $cantidad_productos[$i];
      $precio_producto = $precio_productos[$i];

      $sql_venta = "INSERT INTO registro_lotes (id_lote,id_producto,cantidad,precio) VALUES ('$id_lote','$id_producto','$cantidad_producto','$precio_producto')";
      $conn->query($sql_venta);
    }
  }

?>