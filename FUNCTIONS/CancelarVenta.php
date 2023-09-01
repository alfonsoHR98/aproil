<?php 
  include '../FUNCTIONS/conn.php'; 

  $sql_venta = "SELECT v.id_venta, v.id_producto, p.nombre AS producto
  FROM registro_ventas v
  JOIN productos p ON v.id_producto = p.id_producto
  WHERE v.estado = 'Activo'";
  
?>
<link rel="stylesheet" href="../../STYLES/principal.css">

<div class="container">
  <header>Busqueda mediante Selección de almacen y producto</header>
  <form action="cancelaciones.php" method="post" class="form" id="form">
    <div class="form first">
      <div class="details">
        <span class="title">Busqueda de formulario</span>
        <input type="hidden" name="oculto" value=5>
        <div class="fields">

        <div class="input-field">
            <label>ID-Venta</label>
            <input type="text" name="id_venta" id="id_venta" list="venta" required>
            <datalist  id="venta"  >  
                <?php
                    $result_almacen = $conn->query($sql_venta);
                    if ($result_almacen->num_rows > 0) {
                        while ($row = $result_almacen->fetch_assoc()) {
                            echo '<option value="'.$row['id_venta'].'">'.$row['id_venta'].' - '.$row['id_producto'].' - '.$row['producto'].'</option>';
                        }
                    }
                ?>
            </datalist>
        </div>          
        
        

          
        </div>
        <input type="submit" name="enviar" value="Buscar" class="button"></input>
        <a href="../principal.php?opcion=EdicionClientes" class="return">Regresar</a>
      </div>
    </div>
  </form>
</div>




