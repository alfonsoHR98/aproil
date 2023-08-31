<?php 
  include '../FUNCTIONS/conn.php'; 

  $sql_proveedor = "SELECT * FROM provedores";
  $sql_almacen = "SELECT * FROM almacen;";
  $sql_productos = "SELECT * FROM productos;";
  $sql_clientes = "SELECT * FROM clientes;";
?>
<link rel="stylesheet" href="../../STYLES/principal.css">


<div class="container">
  <header>Busqueda de clientes</header>
  <form action="generarPdf.php" method="post" class="form" id="form1">
    <div class="form first">
      <div class="details">
        <input type="hidden" name="oculto" value=7></input>
        <div class="fields">

        <div class="input-field">
            <label>Nombre</label>
            <select class="select" id="id_cliente" name="id_cliente" required>
              <option value="NULL"> - </option>
              <?php
                $result_clientes = $conn->query($sql_clientes);
                if ($result_clientes->num_rows > 0) {
                  while ($row = $result_clientes->fetch_assoc()) {
                    echo '<option value="'.$row['id_cliente'].'">'.$row['id_cliente'].' -'.$row['nombre'].'</option>';
                  }
                }
              ?>
            </select>
          </div>

          
        </div>



        <input type="submit" name="enviar" value="Buscar" class="button"></input>
        <a href="../principal.php?opcion=EdicionClientes" class="return">Regresar</a>
      </div>
    </div>
  </form>
</div>


<div class="container">
  <header>Busqueda de clientes - Compras</header>
  <form action="generarPdf.php" method="post" class="form" id="form1">
    <div class="form first">
      <div class="details">
        <input type="hidden" name="oculto" value=8></input>
        <div class="fields">

        <div class="input-field">
            <label>Nombre</label>
            <select class="select" id="id_cliente" name="id_cliente" required>
              <option value="NULL"> - </option>
              <?php
                $result_clientes = $conn->query($sql_clientes);
                if ($result_clientes->num_rows > 0) {
                  while ($row = $result_clientes->fetch_assoc()) {
                    echo '<option value="'.$row['id_cliente'].'">'.$row['id_cliente'].' -'.$row['nombre'].'</option>';
                  }
                }
              ?>
            </select>
          </div>

          
        </div>



        <input type="submit" name="enviar" value="Buscar" class="button"></input>
        <a href="../principal.php?opcion=EdicionClientes" class="return">Regresar</a>
      </div>
    </div>
  </form>
</div>

