<?php 
  include '../../FUNCTIONS/conn.php'; 
  $sql_productos = "SELECT * FROM productos";
  $id_lote = $_GET['id'];
?>
<link rel="stylesheet" href="../../STYLES/lotes.css">
<div class="lote-container">
  <div class="lote">
    <h1>Contenido por lotes</h1>
    <form class="form-lote" method="post" action="../../FUNCTIONS/Registrar/registroProductosPorLote.php">
      <input type="text" value="<?php echo $id_lote; ?>" id="lote" name="lote">
      <div class="Productos" id="productos">
        <div class="producto" id="producto">
          <label for="nombre_producto[]">Nombre del producto:</label>
          <select id="nombre_producto[]" name="nombre_producto[]">
            <?php 
              $resultado_productos = $conn->query($sql_productos);
              while ($row = $resultado_productos->fetch_assoc()) {
                echo '<option value="'.$row['id_producto'].'">'.$row['id_producto'].' - '.$row['nombre'].'</option>';  
              }
            ?>
          </select>
          <label for="cantidad_producto[]">Cantidad:</label>
          <input type="number" name="cantidad_producto[]" required>
          <label for="precio_producto[]">Precio:</label>
          <input type="number" name="precio_producto[]" required>
          <button type="button" onclick="eliminarProducto(this)">Eliminar</button>
        </div>
      </div>
      <button class="agregar" type="button" onclick="agregarProducto()">Agregar Producto</button>
      <button class="registrar" type="submit">Registrar Venta</button>
    </form>
  </div>
</div>

<script>
  function agregarProducto() {
      var productosDiv = document.getElementById("productos");
      var nuevoProductoDiv = document.createElement("div");
      nuevoProductoDiv.innerHTML = `
        <label for="nombre_producto[]">Nombre del producto:</label>
        <select id="nombre_producto[]" name="nombre_producto[]">
          <?php 
            $resultado_productos = $conn->query($sql_productos);
            while ($row = $resultado_productos->fetch_assoc()) {
              echo '<option value="'.$row['id_producto'].'">'.$row['id_producto'].' - '.$row['nombre'].'</option>';  
            }
          ?>
        </select>
        <label for="cantidad_producto[]">Cantidad:</label>
        <input type="number" name="cantidad_producto[]" required>
        <label for="precio_producto[]">Precio:</label>
        <input type="number" name="precio_producto[]" required>
        <button type="button" onclick="eliminarProducto(this)">Eliminar</button>
      `;
      productosDiv.appendChild(nuevoProductoDiv);
  }

  function eliminarProducto(elemento) {
      var productoDiv = elemento.parentElement;
      productoDiv.remove();
  }
</script>