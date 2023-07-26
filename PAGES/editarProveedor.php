<?php 
  include('../FUNCTIONS/conn.php');

  if (isset($_POST['enviar'])){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $rfc = $_POST['rfc'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];

    $sql = "UPDATE provedores SET nombre='$nombre', rfc='$rfc', telefono='$telefono', direccion='$direccion', correo='$email'
    WHERE id_provedor=$id";

    if($conn->query($sql) === TRUE) {
      echo "<script language='JavaScript'>
        alert('Se actualizo correctamente');
      </script>";
      header("Location: ../PAGES/principal.php?opcion=EdicionProveedores");
    }else{
      echo "<script language='JavaScript'>
        alert('Se actualizo correctamente');
      </script>";
      header("Location: ../PAGES/principal.php?opcion=EdicionProveedores");
    }

  }else{
    $id = $_GET['id'];
    $sql = "SELECT * FROM provedores WHERE id_provedor = $id";
    if ($result = $conn->query($sql)){
      $row = $result->fetch_assoc();
      $id = $row["id_provedor"];
      $nombre = $row["nombre"];
      $rfc = $row["rfc"];
      $telefono = $row["telefono"];
      $direccion = $row["direccion"];
      $correo = $row["correo"];
    }
    $conn->close();
?>
<?php include('../FUNCTIONS/menu.php'); ?>

<link rel="stylesheet" href="../STYLES/principal.css">
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
        <input type="submit" name="enviar" value="ACTUALIZAR" class="button"></input>
        <a href="../PAGES/principal.php?opcion=EdicionProveedores" class="return">Regresar</a>
      </div>
    </div>
  </form>
</div>

<?php } ?>