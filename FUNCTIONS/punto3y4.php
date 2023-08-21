<?php 
  include '../FUNCTIONS/conn.php'; 

  $sql_proveedor = "SELECT * FROM provedores";
  $sql_almacen = "SELECT * FROM almacen;"
?>
<link rel="stylesheet" href="../../STYLES/principal.css">
<div class="container">
  <header>Busqueda Por Proveedor</header>
  <form action="generarPdf.php" method="post" class="form" id="form3">
    <div class="form first">
      <div class="details">
        <div class="input-field">
          <label>Proveedor</label>
          <select class="select" id="id_provedor" name="id_provedor" required>
            <?php
              $result_proveedor = $conn->query($sql_proveedor);
              if ($result_proveedor->num_rows > 0) {
                while ($row = $result_proveedor->fetch_assoc()) {
                  echo '<option value="'.$row['id_provedor'].'">'.$row['id_provedor'].' -'.$row['nombre'].'</option>';
                }
              }
            ?>
          </select>
        </div>

        <div class="input-field">
            <label>Fecha inicio</label>
            <input type="date" value="" id="date1" name="date1" required>
          </div>

          <div class="input-field">
            <label>Fecha final</label>
            <input type="date" value="" id="date2" name="date2" required>
          </div>

        <input type="hidden" name="oculto" value=3></input>
        <input type="submit" name="enviar" value="Buscar" class="button"></input>
        <a href="../principal.php?opcion=EdicionClientes" class="return">Regresar</a>
      </div>
    </div>
  </form>
</div>

<div class="container">
  <header>Busqueda mediante Selección de almacen</header>
  <form action="generarPdf.php" method="post" class="form" id="form">
    <div class="form first">
      <div class="details">
        <span class="title">Busqueda de formulario</span>
        <input type="hidden" name="oculto" value=2>
        <div class="fields">


        </div>
        <input type="submit" name="enviar" value="Buscar" class="button"></input>
        <a href="../principal.php?opcion=EdicionClientes" class="return">Regresar</a>
      </div>
    </div>
  </form>
</div>