<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../STYLES/principal.css">
</head>
<body>
  <div class="principal">

    <?php include '../FUNCTIONS/menu.php'; ?>
    <?php
      if(isset($_GET['opcion'])){

        $opcion = $_GET['opcion'];

        switch ($opcion) {
          
          // CASOS PARA LOS CLIENTES
          case "RegistroClientes":
            include './Registros/registroClientes.php';
            break;

          case "EdicionClientes":
            include './EdicionDeRegistros/edicionClientes.php';
            break;

          
          // CASOS PARA LOS PROVEEDORES
          case "RegistroProveedores":
            include './Registros/registroProveedores.php';
            break;
            
          case "EdicionProveedores":
            include './EdicionDeRegistros/edicionProveedores.php';
            break;

          // CASOS PARA LOS PRODUCTOS 
          case "RegistroProductos":
            include './Registros/registroProductos.php';
            break;

          case "EdicionProductos":
            include './EdicionDeRegistros/edicionProductos.php';
            break;
          
          // CASOS PARA LOS LOTES
          case "RegistroLotes":
            include './Registros/registroLotes.php';
            break;
          
          case "EdicionLotes":
            include './Lotes/busquedaPorLotes.php';
            break;

          default:
            break;
        }

      }
    ?>
  </div>
</body>
</html>