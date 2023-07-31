<?php 
  include '../FUNCTIONS/conn.php'; 
  
  $query = "SELECT * FROM provedores";

?>

<script type="text/javascript">
  function confirmar() {
    return confirm('¿Estas Seguro?, se eliminaran los datos');
  }
</script>

<link rel="stylesheet" href="../STYLES/tablas.css">

<main class="table">
  <section class="table_header">
    <h1>Edición y eliminación de proveedores</h1>
  </section>
  <section class="table_body">
    <table>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>RFC</th>
          <th>Teléfono</th>
          <th>Dirección</th>
          <th>Email</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        if ($result = $conn->query($query)){
          while ($row = $result->fetch_assoc()){
            $id = $row["id_provedor"];
            $nombre = $row["nombre"];
            $rfc = $row["rfc"];
            $telefono = $row["telefono"];
            $direccion = $row["direccion"];
            $email = $row["correo"];

            echo '
            <tr>
              <td>'.$nombre.'</td>
              <td>'.$rfc.'</td>
              <td>'.$telefono.'</td>
              <td>'.$direccion.'</td>
              <td>'.$email.'</td>
              <td><a href="./EditarUnRegistro/editarProveedor.php?id='.$id.'"><img src="../assets/edit.svg"></a></td>
              <td><a href="../FUNCTIONS/EliminarRegistro/eliminarProveedor.php?id='.$id.'" onclick="return confirmar()"><img src="../assets/eliminar.svg"></a></td>
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
