<?php
  require '../../FUNCTIONS/conn.php';
  $id_lote = $_GET['id'];

  $sql_lote_registro = "SELECT * FROM registro_lotes WHERE id_lote = $id_lote";
?>

<link rel="stylesheet" href="../../STYLES/principal.css">
<link rel="stylesheet" href="../../STYLES/tablas.css">

<main class="table">
  <section class="table_header">
    <h1>Lote ID: <?php echo $id_lote; ?></h1>
  </section>
  
  <section class="table_body">
  <a class="regresar" href="../../PAGES/principal.php?opcion=EdicionLotes">REGRESAR</a>
    <table>
      <thead>
        <tr>
          <th>ID Producto</th>
          <th>Nombre Producto</th>
          <th>Cantidad comprada</th>
          <th>Precio unitario</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        if ($result_lote = $conn->query($sql_lote_registro)){
          while ($row_lote = $result_lote->fetch_assoc()){
            $id_producto = $row_lote['id_producto'];
            $sql_info_producto = "SELECT * FROM productos WHERE id_producto = $id_producto";
            $result_producto = $conn->query($sql_info_producto);
            $producto = $result_producto->fetch_assoc();

            echo '
            <tr>
              <td>'.$row_lote['id_producto'].'</td>
              <td>'.$producto['nombre'].'</td>
              <td>'.$row_lote['cantidad'].'</td>
              <td>'.$row_lote['precio'].'</td>
            </tr>
            ';
          }
        }
      ?>
      </tbody>
    </table>
  </section>
</main>
