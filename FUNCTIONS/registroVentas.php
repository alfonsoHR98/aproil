<?php

include 'conn.php';
  if ($_SERVER["REQUEST_METHOD"] === "POST"){
    
    $unidad = $_POST['id_presentacion'];
    $producto = $_POST['id_producto'];
    $cliente = $_POST['id_cliente'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $sql = "INSERT INTO ventas (id_cliente) VALUES ('$cliente')";

    if ($conn->query($sql) === TRUE) {
      $sql_ventas = "SELECT MAX(id_venta) AS max_id FROM ventas";
      $result_almacen = $conn->query($sql_ventas);
      $max_id = $result_almacen->fetch_assoc()['max_id'];
      $sql_regventas = "INSERT INTO registro_ventas (id_venta,id_producto,cantidad,precio_venta,unidad) VALUES ('$max_id','$producto','$cantidad','$precio','$unidad')";
      if ($conn->query($sql_regventas) === TRUE) {
        
        $sql = "SELECT l.id_lote, l.cantidad_descontar,l.id_producto,l.unidad_compra, r.fecha_compra
        FROM registro_lotes l
        JOIN lotes r ON l.id_lote = r.id_lote
        WHERE l.cantidad_descontar > 0 and l.id_producto = $producto and l.unidad_compra = '$unidad'
        ORDER BY r.fecha_compra ASC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $lote_id = $row["id_lote"];
              $producto_id = $row["id_producto"];
              $lote_cantidad = $row["cantidad_descontar"];
              $unidades = $row["unidad_compra"];
              echo $lote_id."\n";
              echo $producto_id."\n";
              echo $unidades."\n";
              if ($cantidad > 0) {
                  if ($lote_cantidad >= $cantidad) {
                    
                      // Restar la cantidad de venta al lote y salir del bucle
                      $update_sql = "UPDATE registro_lotes SET cantidad_descontar = (cantidad_descontar - $cantidad) WHERE id_lote = $lote_id AND id_producto = $producto 
                      AND unidad_compra = '$unidad'";
                      $conn->query($update_sql);

                      // Registrar el movimiento en la tabla movimientos
                      $insert_sql = "INSERT INTO movimientos_lotes (id_venta,id_producto, cantidad, id_lote, unidad) VALUES ($max_id, $producto_id,$cantidad, '$lote_id', '$unidades')";
                      $conn->query($insert_sql);
                      $cantidad = 0;
                  } else {
                      // Restar la cantidad del lote y continuar con el siguiente lote
                      $update_sql = "UPDATE registro_lotes SET cantidad_descontar = 0 WHERE id_lote = $lote_id AND id_producto = $producto 
                      AND unidad_compra = '$unidad'";
                      $conn->query($update_sql);
                      $insert_sql = "INSERT INTO movimientos_lotes (id_venta,id_producto, cantidad, id_lote, unidad) VALUES ($max_id, $producto_id,$lote_cantidad, '$lote_id', '$unidades')";
                      $conn->query($insert_sql);
                      $cantidad -= $lote_cantidad;
                  }
              } else {
                  
              }
          }
      }
      echo "<script language='JavaScript'>
      alert('La venta ha sido registrada');
      window.location.href = '../../aproil/FUNCTIONS/RegistroVenta.php';
  </script>";
      }     
      
      
    }else{
      echo "
        <script languaje='JavaScript'>
          alert('No se concreto la venta');
          window.location.href = '../../aproil/FUNCTIONS/RegistroVenta.php';
          </script>";
    }
  }
?>