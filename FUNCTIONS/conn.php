<?php
  $servername = "192.168.15.11:3306";
  $username = "alfonso";
  $password = "";
  $dbname = "aproil";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_errno) {
    echo("Conexión erronea: ".$conn->connect_errno);
  }
?>