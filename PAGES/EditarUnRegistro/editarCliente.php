<?php 
  include '../../FUNCTIONS/conn.php';

  if (isset($_POST['enviar'])){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $rfc = $_POST['rfc'];
    $correo = $_POST['email'];
    $telefono = $_POST['telefono'];

    $sql = "UPDATE clientes SET nombre='$nombre', direccion='$direccion', rfc='$rfc', correo='$correo', telefono='$telefono'
    WHERE id_cliente=$id";

    if($conn->query($sql) === TRUE) {
      echo "<script>
        alert('Se actualizo correctamente');
      </script>";
      header("Location: ../principal.php?opcion=EdicionClientes");
    }else{
      echo "<script>
        alert('No se actualizo correctamente');
      </script>";
      header("Location: ../principal.php?opcion=EdicionClientes");
    }

  }else{
    $id = $_GET['id'];
    $sql = "SELECT * FROM clientes WHERE id_cliente = $id";
    if ($result = $conn->query($sql)){
      $row = $result->fetch_assoc();

      $id = $row["id_cliente"];
      $nombre = $row["nombre"];
      $direccion = $row["direccion"];
      $rfc = $row["rfc"];
      $correo = $row["correo"];
      $telefono = $row["telefono"];
    }
    $conn->close();
?>

<link rel="stylesheet" href="../../STYLES/principal.css">
<div class="container">
  <header>Clientes</header>
  <form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="form" id="form">
    <div class="form first">
      <div class="details">
        <span class="title">Edición de cliente</span>

        <div class="fields">

          <div class="input-field">
            <label>Nombre</label>
            <input type="text" value="<?php echo $nombre; ?>" id="nombre" name="nombre" required>
          </div>

          <div class="input-field">
            <label>Dirección</label>
            <input type="text" value="<?php echo $direccion; ?>" id="direccion" name="direccion" required>
          </div>

          <div class="input-field">
            <label>RFC</label>
            <input type="text" value="<?php echo $rfc; ?>" id="rfc" name="rfc" required>
          </div>

          <div class="input-field">
            <label>Email</label>
            <input type="text" value="<?php echo $correo; ?>" id="email" name="email" required>
          </div>

          <div class="input-field">
            <label>Teléfono</label>
            <input type="text" value="<?php echo $telefono; ?>" id="telefono" name="telefono" required>
          </div>

        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <input type="submit" name="enviar" value="Buscar" class="button"></input>
        <a href="../principal.php?opcion=EdicionClientes" class="return">Regresar</a>
      </div>
    </div>
  </form>
</div>

<?php } ?>