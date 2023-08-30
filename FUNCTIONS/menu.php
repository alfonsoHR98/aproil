<link rel="stylesheet" href="../STYLES/menu.css">
<header class="header">

  <div class="logo">Aproil</div>
  <input type="checkbox" id="toggle">
  <label for="toggle"><img class="menu" src="../assets/menu.svg" alt="menu"></label>

  <nav class="navigation">

    <ul>
      <li><a href="./principal.php">Inicio</a></li>
      <li><a href="#">Ventas</a>
        <ul>
          <li><a href="../PAGES/principal.php?opcion=RegistrarVenta">Registrar venta</a></li>
          <li><a href="../PAGES/principal.php?opcion=ConsultarVenta">Consultar ventas</a></li>
        </ul>
      </li>
      <li><a href="#">Productos</a>
        <ul>
          <li><a href="../PAGES/principal.php?opcion=RegistroProductos">Registro</a></li>
          <li><a href="../PAGES/principal.php?opcion=EdicionProductos">Modificación y eliminación</a></li>
        </ul>
      </li>
      <li><a href="#">Clientes</a>
        <ul>
          <li><a href="../PAGES/principal.php?opcion=RegistroClientes">Registro</a></li>
          <li><a href="../PAGES/principal.php?opcion=EdicionClientes">Modificación y eliminación</a></li>
        </ul>
      </li>
      <li><a href="#">Proveedores</a>
        <ul>
          <li><a href="../PAGES/principal.php?opcion=RegistroProveedores">Registro</a></li>
          <li><a href="../PAGES/principal.php?opcion=EdicionProveedores">Modificación y eliminación</a></li>
        </ul>
      </li>
      <li><a href="#">Inventario</a>
        <ul>
          <li><a href="#">Lotes</a>
            <ul>
              <li><a href="../PAGES/principal.php?opcion=RegistroLotes">Registrar lote</a>
              <li><a href="../PAGES/principal.php?opcion=EdicionLotes">Información de lote</a>
            </ul>
          </li>
          <li><a href="#">Almacenes</a>
            <ul>
              <li><a href="../PAGES/principal.php?opcion=InventarioPorAlmacen">Inventario de almacén</a>
              <li><a href="../PAGES/principal.php?opcion=TraspasoDeMercancia">Traspaso de mercancía</a>
            </ul>
          </li>
        </ul>
      </li>
      <li><a href="#">Reportes</a>
        <ul>
          <li><a href="#">Ventas</a>
            <ul>
              <li><a href="../PAGES/principal.php?opcion=ReporteVentasPorProducto">Reporte por producto</a></li>
              <li><a href="../PAGES/principal.php?opcion=ReporteVentasPorLote">Reporte por lote</a></li>
              <li><a href="../PAGES/principal.php?opcion=ReporteVentasPorAlmacen">Reporte por almacén</a></li>
              <li><a href="../PAGES/principal.php?opcion=ReporteVentasPorCliente">Reporte por cliente</a></li>
            </ul>
          </li>
          <li><a href="#">Compras</a>
            <ul>
              <li><a href="../PAGES/principal.php?opcion=ReporteComprasPorProducto">Reporte por producto</a></li>
              <li><a href="../PAGES/principal.php?opcion=ReporteComprasPorLote">Reporte por lote</a></li>
              <li><a href="../PAGES/principal.php?opcion=ReporteComprasPorAlmacen">Reporte por almacén</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li><a href="#">Salir</a></li>
    </ul>

  </nav>

</header>