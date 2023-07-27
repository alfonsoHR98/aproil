<?php 
  include('../FUNCTIONS/conn.php');

  if (isset($_POST['enviar'])){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $caracteristicas = $_POST['caracteristicas'];
    $unidad = $_POST['unidad'];

    $sql = "UPDATE productos SET nombre='$nombre', caracteristicas='$caracteristicas', unidad='$unidad'
    WHERE id_producto=$id";

    if($conn->query($sql) === TRUE) {
      echo "<script language='JavaScript'>
        alert('Se actualizo correctamente');
      </script>";
      header("Location: ../PAGES/principal.php?opcion=EdicionProductos");
    }else{
      echo "<script language='JavaScript'>
        alert('Se actualizo correctamente');
      </script>";
      header("Location: ../PAGES/principal.php?opcion=EdicionProductos");
    }

  }else{
    $id = $_GET['id'];
    $sql = "SELECT * FROM productos WHERE id_producto = $id";
    if ($result = $conn->query($sql)){
      $row = $result->fetch_assoc();
      $id = $row["id_producto"];
      $nombre = $row["nombre"];
      $caracteristicas = $row['caracteristicas'];
      $unidad = $row['unidad'];
    }
    $conn->close();
?>
<?php include('../FUNCTIONS/menu.php'); ?>

<link rel="stylesheet" href="../STYLES/principal.css">
<div class="container">
  <header>Productos</header>
  <form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="form" id="form">
    <div class="form first">
      <div class="details">
        <span class="title">Edición de producto</span>

        <div class="fields">

          <div class="input-field">
            <label>Nombre</label>
            <input type="text" value="<?php echo $nombre; ?>" id="nombre" name="nombre" required>
          </div>

          <div class="input-field">
            <label>Caracteristicas</label>
            <input type="text" value="<?php echo $caracteristicas; ?>" id="caracteristicas" name="caracteristicas" required>
          </div>

          <div class="input-field">
            <label>Unidad</label>
            <input type="text" value="<?php echo $unidad; ?>" id="unidad" name="unidad" required>
          </div>

        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <input type="submit" name="enviar" value="ACTUALIZAR" class="button"></input>
        <a href="../PAGES/principal.php?opcion=EdicionProductos" class="return">Regresar</a>
      </div>
    </div>
  </form>
</div>

<?php } ?>