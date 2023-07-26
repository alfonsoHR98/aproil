<?php
  // se incluye el archivo que realiza la conexión
  include 'conn.php';

  //Se obtienen los valore del formulario
  $usuario = $_POST["user"];
  $password = $_POST["password"];
  
  // Se crea la inyección SQL
  $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'";
  //Se hace la consulta a la base de datos con la conexión y la sentencia
  $result = mysqli_query($conn, $sql);

  //Se valida que existan registros en la base de datos en la tabla usuarios
  if ($result->num_rows == 1) {
    header('Location: ../PAGES/principal.php');
    exit();
  }else{
    header('Location: ../index.html');
    exit();
  }

  //Se cierra la conexión
  mysqli_close($conn);
?>