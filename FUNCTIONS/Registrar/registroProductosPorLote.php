<?php
  require '../conn.php';
  
  $id_lote = $_POST['lote'];
  $id_productos = $_POST['nombre_producto'];
  $cantidad_productos = $_POST['cantidad_producto'];
  $precio_productos = $_POST['precio_producto'];
  $unidades_producto = $_POST['unidad_producto'];

  if ($id_lote !== "") {
    for ($i = 0; $i < count($id_productos); $i++) {
      $id_producto = $id_productos[$i];
      $cantidad_producto = $cantidad_productos[$i];
      $precio_producto = $precio_productos[$i];
      $unidad_producto = $conn->real_escape_string($unidades_producto[$i]);

      $sql = "INSERT INTO registro_lotes (id_lote, id_producto, cantidad, precio, unidad_compra) VALUES ('$id_lote','$id_producto','$cantidad_producto','$precio_producto','$unidad_producto')";
      $conn->query($sql);
    }
    echo '<script>alert("Registro de productos exitoso");</script>';
    header('Location: ../../PAGES/principal.php?opcion=RegistroLotes');
  }
?>