<?php 
  include '../FUNCTIONS/conn.php'; 
  
  $query = "SELECT * FROM productos";

?>

<script type="text/javascript">
  function confirmar() {
    return confirm('¿Estas Seguro?, se eliminaran los datos');
  }
</script>

<link rel="stylesheet" href="../STYLES/tablas.css">

<main class="table">
  <section class="table_header">
    <h1>Edición y eliminación de productos</h1>
  </section>
  <section class="table_body">
    <table>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Caracteristicas</th>
          <th>Marca</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        if ($result = $conn->query($query)){
          while ($row = $result->fetch_assoc()){
            $id = $row["id_producto"];
            $nombre = $row["nombre"];
            $caracteristicas = $row["caracteristicas"];
            $marca = $row["marca"];

            echo '
            <tr>
              <td>'.$nombre.'</td>
              <td>'.$caracteristicas.'</td>
              <td>'.$marca.'</td>
              <td><a href="./EditarUnRegistro/editarProducto.php?id='.$id.'"><img src="../assets/edit.svg"></a></td>
              <td><a href="../FUNCTIONS/EliminarRegistro/eliminarProducto.php?id='.$id.'" onclick="return confirmar()"><img src="../assets/eliminar.svg"></a></td>
            </tr>
            ';
          }
        }
        $result->free();
      ?>
      </tbody>
    </table>
  </section>
</main>
