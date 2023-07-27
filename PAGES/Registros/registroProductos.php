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
            <label>Características</label>
            <input type="text" placeholder="Características del producto" id="caracteristicas" name="caracteristicas" required>
          </div>

          <div class="input-field">
            <label>Unidad</label>
            <input type="text" placeholder="Unidad del producto" id="unidad" name="unidad" required>
          </div>

        </div>

        <button>Registrar</button>
      </div>
    </div>
  </form>
</div>

