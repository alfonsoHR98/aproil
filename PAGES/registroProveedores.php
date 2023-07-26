<div class="container">
  <header>Proveedores</header>
  <form action="../FUNCTIONS/registroProveedores.php" method="post" class="form" id="form">
    <div class="form first">
      <div class="details">
        <span class="title">Alta de proveedor</span>

        <div class="fields">

          <div class="input-field">
            <label>Nombre</label>
            <input type="text" placeholder="Nombre del proveedor" id="nombre" name="nombre" required>
          </div>

          <div class="input-field">
            <label>RFC</label>
            <input type="text" placeholder="RFC del proveedor" id="rfc" name="rfc" required>
          </div>

          <div class="input-field">
            <label>Teléfono</label>
            <input type="text" placeholder="Teléfono del proveedor" id="telefono" name="telefono" required>
          </div>

          <div class="input-field">
            <label>Dirección</label>
            <input type="text" placeholder="Dirección del proveedor" id="direccion" name="direccion" required>
          </div>

          <div class="input-field">
            <label>Email</label>
            <input type="text" placeholder="Email del proveedor" id="email" name="email" required>
          </div>

        </div>

        <button>Registrar</button>
      </div>
    </div>
  </form>
</div>

