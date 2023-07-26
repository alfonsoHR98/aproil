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
          case "RegistroClientes":
            include '../PAGES/registroClientes.php';
            break;
          case "EdicionClientes":
            include '../PAGES/edicionClientes.php';
            break;  
          case "RegistroProveedor":
            include '../PAGES/registroProveedores.php';
            break;
          case "RegistroProductos":
            include '../PAGES/registroProductos.php';
            break;
          case "RegistroLotes":
            include '../PAGES/registroLotes.php';
          default:
            break;
        }

      }
    ?>
  </div>
</body>
</html>