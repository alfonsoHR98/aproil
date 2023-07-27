
<div class="container">
  <header>Lotes</header>
  <form action="../FUNCTIONS/registroDeLotes.php" method="post" class="form" id="form">
    <div class="form first">
      <div class="details">
        <span class="title">Alta de lote</span>

        <div class="fields">

          <div class="input-field">
            <label>Lote</label>
            <input type="text" placeholder="ID del lote" id="id_lote" name="id_lote" required>
          </div>

          <div class="input-field">
            <label>Proveedor</label>
            <select id="id_provedor" name="id_provedor" required>

            </select>
          </div>

        </div>

        <button type="submit">Registrar lote</button>
      </div>
    </div>
  </form>
</div>
