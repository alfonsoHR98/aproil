<?php 
  include '../FUNCTIONS/conn.php'; 

  $sql = "SELECT * FROM provedores";
  $result = $conn->query($sql);
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
            <label>Proveedor</label>
            <select class="select" id="id_provedor" name="id_provedor" required>
              <?php
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
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
