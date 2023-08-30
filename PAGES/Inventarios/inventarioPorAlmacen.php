<?php 
  include '../FUNCTIONS/conn.php'; 
  $sql_almacen = "SELECT * FROM almacen;"
?>

<div class="container">
  <header>Inventario de almacenes</header>
  <form action="../PAGES/Inventarios/inventarioAlmacen.php" method="post" class="form" id="form">
    <div class="form first">
      <div class="details">
        <span class="title">Selecciona el almacén a buscar</span>

        <div class="fields">

          <div class="">
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

        </div>

        <button type="submit">Ver inventario</button>
      </div>
    </div>
  </form>
</div>
