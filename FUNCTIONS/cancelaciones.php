<?php 
  include 'conn.php';

  $id_venta = $_POST['id_venta'];

  $sql_ventas = "SELECT id_venta, id_producto, cantidad, id_lote, unidad FROM movimientos_lotes WHERE id_venta = $id_venta ";
  $result = $conn->query($sql_ventas);  
  echo $id_venta;
  while ($row = $result->fetch_assoc()) {   
      echo $id_venta;
      $update_sql = "UPDATE registro_lotes SET cantidad_descontar = (cantidad_descontar + {$row['cantidad']}) WHERE id_lote = {$row['id_lote']} AND id_producto = {$row['id_producto']} AND unidad = '{$row['unidad']}'";
      echo $update_sql;

      $conn->query($update_sql);
      $update_sql = "UPDATE registro_ventas SET Estado = 'Cancelado' WHERE id_venta = '" . $row['id_venta'] . "'";
      $conn->query($update_sql);
      echo $row['id_venta']; 
  }
                    
 

?>