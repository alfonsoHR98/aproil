<?php 
  require '../../FUNCTIONS/conn.php';
?>

<link rel="stylesheet" href="../../STYLES/principal.css">
<link rel="stylesheet" href="../../STYLES/tablas.css">
<main class="table">
  <section class="table_header">
    <h1>Edición y eliminación de productos</h1>
    
  </section>
  <section class="table_body">
    
    <a class="regresar" href="../../PAGES/principal.php?opcion=InventarioPorAlmacen">REGRESAR</a>
    <table>
      <thead>
        <tr>
          <th>Id producto</th>
          <th>Nombre</th>
          <th>Características</th>
          <th>Cantidad</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        $id_almacen = $_POST['id_almacen'];
        $sql_inventario = 
          "SELECT a.id_almacen, p.id_producto, p.nombre, p.caracteristicas, SUM(cl.cantidad) AS cantidad_existente 
          FROM almacen_lotes a
          JOIN registro_lotes cl ON a.id_lote = cl.id_lote
          JOIN productos p ON cl.id_producto = p.id_producto
          GROUP BY a.id_almacen, p.id_producto, p.nombre;";

        if ($inventario = $conn->query($sql_inventario)) {
          while ($row_inventario = $inventario->fetch_assoc()) {
            if ($row_inventario['id_almacen'] === $id_almacen)
              echo '
              <tr>
                <td>'.$row_inventario['id_producto'].'</td>
                <td>'.$row_inventario['nombre'].'</td>
                <td>'.$row_inventario['caracteristicas'].'</td>
                <td>'.$row_inventario['cantidad_existente'].'</td>
              </tr>
              ';
          }
        }
      ?>
      </tbody>
    </table>
    
  </section>
</main>
