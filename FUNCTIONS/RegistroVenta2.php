<?php 
  include '../FUNCTIONS/conn.php'; 
  $idProducto = $_POST['id_producto'];
  $idPresentacion = $_POST['id_presentacion'];


// Consulta SQL para obtener la cantidad total
  $sql_monto = "SELECT SUM(cantidad_descontar) as CantidadTotal 
          FROM registro_lotes
          WHERE id_producto = '$idProducto' AND unidad_compra = '$idPresentacion'
          GROUP BY id_producto, unidad_compra";  
  $result = $conn->query($sql_monto);

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $cantidadTotal = $row['CantidadTotal'];
      echo "Se encontraron: ".$cantidadTotal." unidades del producto solicitado ";
  } else {
      echo "No se encontraron Unidades del producto solicitado.";
  }
  

         
?>
<link rel="stylesheet" href="../../STYLES/principal.css">

<div class="container">
  <form action="registroVentas.php"  method="post" class="form" id="form">
    <div class="form first">
      <div class="details">
        <span class="title">Registro de Venta</span>
        <input type="hidden" name="oculto" value=5>
        <?php
          
            echo '<input type="hidden" name="id_producto" value='.$idProducto.'>' ;
            echo '<input type="hidden" name="id_presentacion" value='.$idPresentacion.'>' ;
            echo '<input type="hidden" name="id_cliente" value=7>' ;    #cambiar esta linea    
        ?>
        
        <div class="fields">

        <div class="input-field">
            <label>Cantidad</label>
            <select class="select" id="cantidad" name="cantidad" required>
                <?php
                    for ($i = 1; $i <= $cantidadTotal; $i++) {
                      echo '<option value="' . $i . '">' . $i . '</option>';
                  }
                    
                ?>
            </select>
        </div>         
        <div class="input-field">
            <label>Precio de venta</label>
            <input type="text" id="precio" name="precio" required>
        </div>
        

          
        </div>
        <input type="submit" name="enviar" value="Buscar" class="button"></input>
        <a href="../principal.php?opcion=EdicionClientes" class="return">Regresar</a>
      </div>
    </div>
  </form>
</div>




