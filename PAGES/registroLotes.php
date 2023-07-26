<div class="container">
  <header>Lotes</header>
  <form action="../FUNCTIONS/registroClientes.php" method="post" class="form" id="form">
    <div class="form first">
      <div class="details">
        <span class="title">Alta de lote</span>

        <div class="fields">

          <div class="input-field">
            <label>Nombre</label>
            <input type="text" placeholder="Nombre del cliente" id="nombre" name="nombre" required>
          </div>

          <div class="input-field">
            <label>Dirección</label>
            <input type="text" placeholder="Dirección del cliente" id="direccion" name="direccion" required>
          </div>

          <div class="input-field">
            <label>RFC</label>
            <input type="text" placeholder="RFC del cliente" id="rfc" name="rfc" required>
          </div>

          <div class="input-field">
            <label>Email</label>
            <input type="text" placeholder="Email del cliente" id="email" name="email" required>
          </div>

          <div class="input-field">
            <label>Teléfono</label>
            <input type="text" placeholder="Teléfono del cliente" id="telefono" name="telefono" required>
          </div>

        </div>

        <button>Registrar</button>
      </div>
    </div>
  </form>
</div>

