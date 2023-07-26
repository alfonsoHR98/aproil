<?php 
  include('../FUNCTIONS/conn.php'); 
  
  $query = "SELECT * FROM clientes";

?>

<script type="text/javascript">
  function confirmar() {
    return confirm('¿Estas Seguro?, se eliminaran los datos');
  }
</script>

<link rel="stylesheet" href="../STYLES/tablas.css">

<main class="table">
  <section class="table_header">
    <h1>Edición y eliminación de clientes</h1>
  </section>
  <section class="table_body">
    <table>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Dirección</th>
          <th>RFC</th>
          <th>Correo</th>
          <th>Teléfono</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        if ($result = $conn->query($query)){
          while ($row = $result->fetch_assoc()){
            $id = $row["id_cliente"];
            $nombre = $row["nombre"];
            $direccion = $row["direccion"];
            $rfc = $row["rfc"];
            $correo = $row["correo"];
            $telefono = $row["telefono"];

            echo '
            <tr>
              <td>'.$nombre.'</td>
              <td>'.$direccion.'</td>
              <td>'.$rfc.'</td>
              <td>'.$correo.'</td>
              <td>'.$telefono.'</td>
              <td><a href="#"><img src="../assets/edit.svg"></a></td>
              <td><a href="../FUNCTIONS/eliminarCliente.php?id='.$id.'" onclick="return confirmar()"><img src="../assets/eliminar.svg"></a></td>
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
