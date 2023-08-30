<?php 
  include '../FUNCTIONS/conn.php'; 

  $sql_proveedor = "SELECT * FROM provedores";
  $sql_almacen = "SELECT * FROM almacen;";
  $sql_productos = "SELECT * FROM productos;";
  $sql_unidades = "SELECT * FROM unidades_de_compra;";
  
?>
<link rel="stylesheet" href="../../STYLES/principal.css">

<div class="container">
  <header>Busqueda mediante Selección de almacen y producto</header>
  <form action="RegistroVenta2.php" method="post" class="form" id="form">
    <div class="form first">
      <div class="details">
        <span class="title">Busqueda de formulario</span>
        <input type="hidden" name="oculto" value=5>
        <div class="fields">

        <div class="input-field">
            <label>Producto</label>
            <select class="select" id="id_producto" name="id_producto" required>
                <?php
                    $result_almacen = $conn->query($sql_productos);
                    if ($result_almacen->num_rows > 0) {
                        while ($row = $result_almacen->fetch_assoc()) {
                            echo '<option value="'.$row['id_producto'].'">'.$row['id_producto'].' - '.$row['nombre'].'</option>';
                        }
                    }
                ?>
            </select>
        </div>
        <div class="input-field">
            <label>Presentacion</label>
            <select class="select" id="id_presentacion" name="id_presentacion" required>
                <?php
                    $result_producto = $conn->query($sql_unidades);
                    if ($result_producto->num_rows > 0) {
                        while ($row = $result_producto->fetch_assoc()) {
                            echo '<option value="'.$row['unidad'].'">'.$row['unidad'].' </option>';
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




