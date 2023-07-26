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
<<<<<<< HEAD
          case "EdicionClientes":
            include '../PAGES/edicionClientes.php';
            break;  
          case "RegistroProveedor":
=======
          case "RegistroProveedores":
>>>>>>> 733104fff386fb67710d533cbb3d8e1dddeb8842
            include '../PAGES/registroProveedores.php';
            break;
          case "EdicionProveedores":
            include '../PAGES/edicionProveedores.php';
            break;
          case "RegistroProductos":
            include '../PAGES/registroProductos.php';
            break;
<<<<<<< HEAD
          case "RegistroLotes":
            include '../PAGES/registroLotes.php';
=======
          case "EdicionClientes":
            include '../PAGES/edicionClientes.php';
            break;
          case "EdicionProductos":
            include '../PAGES/edicionProductos.php';
            break;
>>>>>>> 733104fff386fb67710d533cbb3d8e1dddeb8842
          default:
            break;
        }

      }
    ?>
  </div>
</body>
</html>