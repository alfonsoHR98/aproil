<?php 
  include '../FUNCTIONS/conn.php'; 

  $sql_proveedor = "SELECT * FROM provedores";
  $sql_almacen = "SELECT * FROM almacen;";
  $sql_productos = "SELECT * FROM productos;";
?>
<link rel="stylesheet" href="../../STYLES/principal.css">


<div class="container">
  <header>Busqueda mediante Selección de almacen y producto</header>
  <form action="generarPdf.php" method="post" class="form" id="form">
    <div class="form first">
      <div class="details">
        <span class="title">Busqueda de formulario</span>
        <input type="hidden" name="oculto" value=5>
        <div class="fields">

        <div class="input-field">
            <label>Almacen</label>
            <select class="select" id="id_almacen" name="id_almacen" required>
            <option value="NULL"> - </option>
              <?php
                $result_almacen = $conn->query($sql_almacen);
                if ($result_almacen->num_rows > 0) {
                  while ($row = $result_almacen->fetch_assoc()) {
                    echo '<option value="'.$row['id_almacen'].'">'.$row['id_almacen'].' -'.$row['nombre'].'</option>';
                  }
                }
              ?>
            </select>
          </div>
        <div class="input-field">
            <label>Producto</label>
            <select class="select" id="id_producto" name="id_producto" required>
            <option value="NULL"> - </option>  
              <?php
                $result_producto = $conn->query($sql_productos);
                if ($result_producto->num_rows > 0) {
                  while ($row = $result_producto->fetch_assoc()) {
                    echo '<option value="'.$row['id_producto'].'">'.$row['id_producto'].' -'.$row['nombre'].'</option>';
                  }
                }
              ?>
            </select>
          </div>            
          <div class="input-field">
            <label>Fecha inicio</label>
            <input type="date" value="" id="date1" name="date1" >
          </div>

          <div class="input-field">
            <label>Fecha final</label>
            <input type="date" value="" id="date2" name="date2" >
          </div>
        </div>
        <input type="submit" name="enviar" value="Buscar" class="button"></input>
        <a href="../principal.php?opcion=EdicionClientes" class="return">Regresar</a>
      </div>
    </div>
  </form>
</div>


