<?php
  require '../FUNCTIONS/conn.php';
  $sql_lotes = "SELECT * FROM lotes";
?>
<link rel="stylesheet" href="../STYLES/tablas.css">

<main class="table">
  <section class="table_header">
    <h1>Lotes</h1>
  </section>
  
  <section class="table_body">
    <div class="search">
      <label><img src="./../assets/search.svg" alt=""></label>
      <input type="text" id="busqueda" placeholder="">
    </div>
    <table>
      <thead>
        <tr>
          <th>ID lote</th>
          <th>Fecha del lote</th>
          <th>Proveedor</th>
          <th>Almacén</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        if ($result_lotes = $conn->query($sql_lotes)){
          while ($row_lotes = $result_lotes->fetch_assoc()){
            $id_lote = $row_lotes['id_lote'];
            $fecha_compra_lote = $row_lotes['fecha_compra'];
            $id_provedor = $row_lotes['id_provedor'];
            
            $sql_proveedor = "SELECT * FROM provedores WHERE id_provedor = $id_provedor";
            $result_proveedor = $conn->query($sql_proveedor);
            $nombre_proveedor = $result_proveedor->fetch_assoc();

            $sql_obtener_id_almacen = "SELECT * FROM almacen_lotes WHERE id_lote = $id_lote";
            $result_id_almacen = $conn->query($sql_obtener_id_almacen);
            $id_almacen_obtenido = $result_id_almacen->fetch_assoc();
            $id_almacen = $id_almacen_obtenido['id_almacen'];

            $sql_almacen = "SELECT * FROM almacen WHERE id_almacen = $id_almacen";
            $result_almacen = $conn->query($sql_almacen);
            $almacen = $result_almacen->fetch_assoc();

            echo '
            <tr>
              <td>'.$id_lote.'</td>
              <td>'.$fecha_compra_lote.'</td>
              <td>'.$nombre_proveedor['nombre'].'</td>
              <td>'.$almacen['nombre'].'</td>
              <td><a href="../PAGES/Lotes/detallesDeLote.php?id='.$id_lote.'"><img src="../assets/edit.svg"></a></td>
              <td><a href="" onclick="return confirmar()"><img src="../assets/eliminar.svg"></a></td>
            </tr>
            ';
            $result_proveedor->free();
            $result_id_almacen->free();
            $result_almacen->free();
          }
        }
        $result_lotes->free();
      ?>
      </tbody>
    </table>
  </section>
</main>

