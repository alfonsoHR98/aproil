<div class="container">
  <header>Lotes</header>
  <form action="../FUNCTIONS/registroDeLotes.php" method="post" class="form" id="form">
    <div class="form first">
      <div class="details">
        <span class="title">Alta de lote</span>

        <div class="fields">

          <div class="input-field">
            <label>ID</label>
            <input type="text" placeholder="ID del lote" id="id_lote" name="id_lote" required>
          </div>

          <div class="input-field">
            <label>Proveedor</label>
            <input type="text" placeholder="ID del proveedor" id="id_proveedor" name="id_proveedor" required>
          </div>

        </div>

        <span class="title">Productos del lote</span>

        <div class="fields" id="productos">

          <div class="input-field">
            <label for="id_producto[]">ID</label>
            <input type="text" placeholder="ID del producto" id="id_producto[]" name="id_producto[]" required>
          </div>

          <div class="input-field">
            <label for="cantidad_producto[]">Cantidad</label>
            <input type="text" placeholder="Cantidad de producto" id="cantidad_producto[]" name="cantidad_producto[]" required>
          </div>

          <div class="input-field">
            <label for="precio_producto[]">Precio</label>
            <input type="text" placeholder="Precio del producto (unitario)" id="precio_producto[]" name="precio_producto[]" required>
          </div>

          <button type="button" onclick="eliminarProducto(this)">Eliminar</button>
        </div>

        <button type="submit">Registrar lote</button>
        <button type="button" onclick="agregarProducto()">Agregar producto</button>
      </div>
    </div>
  </form>
</div>

<script>
  function agregarProducto() {
    var productosDiv = document.getElementById("productos");
    var nuevoProductoDiv = document.createElement("div");
    nuevoProductoDiv.innerHTML = `
    <div class="fields"> 
      <div class="input-field">
        <label for="id_producto[]">ID</label>
        <input type="text" placeholder="ID del producto" id="id_producto[]" name="id_producto[]" required>
      </div>

      <div class="input-field">
        <label for="cantidad_producto[]">Cantidad</label>
        <input type="text" placeholder="Cantidad de producto" id="cantidad_producto[]" name="cantidad_producto[]" required>
      </div>

      <div class="input-field">
        <label for="precio_producto[]">Precio</label>
        <input type="text" placeholder="Precio del producto (unitario)" id="precio_producto[]" name="precio_producto[]" required>
      </div>

      <button type="button" onclick="eliminarProducto(this)">Eliminar</button>
    </div>  
    `;
    productosDiv.appendChild(nuevoProductoDiv);
  }

  function eliminarProducto(elemento) {
      var productoDiv = elemento.parentElement;
      productoDiv.remove();
  }
</script>
