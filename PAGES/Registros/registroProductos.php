<div class="container">
  <header>Productos</header>
  <form action="../FUNCTIONS/Registrar/registroProductos.php" method="post" class="form" id="form">
    <div class="form first">
      <div class="details">
        <span class="title">Alta de producto</span>

        <div class="fields">

          <div class="input-field">
            <label>Nombre</label>
            <input type="text" placeholder="Nombre del producto" id="nombre" name="nombre" required>
          </div>

          <div class="input-field">
            <label>Marca</label>
            <input type="text" placeholder="Marca del producto" id="marca" name="marca" required>
          </div>

          <div class="input-field">
            <label>Características</label>
            <input type="text" placeholder="Características del producto" id="caracteristicas" name="caracteristicas" required>
          </div>

          <div class="input-field">
            <label>Unidad de producto</label>
            <select id="unidad" name="unidad" required>
              <option value="pieza">Pieza</option>
              <option value="kilogramo">Kilogramo</option>
              <option value="litro">Litro</option>
            </select>
          </div>

        </div>

        <button>Registrar</button>
      </div>
    </div>
  </form>
</div>

