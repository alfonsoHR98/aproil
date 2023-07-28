<?php 
  include '../FUNCTIONS/conn.php'; 

  $sql_proveedor = "SELECT * FROM provedores";
  $sql_almacen = "SELECT * FROM almacen;"
?>

<div class="container">
  <header>Lotes</header>
  <form action="../FUNCTIONS/Registrar/registroDeLotes.php" method="post" class="form" id="form">
    <div class="form first">
      <div class="details">
        <span class="title">Alta de lote</span>

        <div class="fields">

          <div class="input-field">
            <label>Lote</label>
            <input type="text" placeholder="ID del lote" id="id_lote" name="id_lote" required>
          </div>

          <div class="input-field">
            <label>Almacen</label>
            <select class="select" id="id_almacen" name="id_almacen" required>
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

        </div>

        <button type="submit">Registrar lote</button>
      </div>
    </div>
  </form>
</div>
