<?php

use Mpdf\Tag\Table;

$pagina = '
<body>
    <div class="container">
        <div class="header">
            <div class="title">Nombre de la Empresa</div>
        </div>
        <div class="subtitle">Subtítulo de la empresa</div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de producto</th>
                    <th>Descripción</th>
                    <th>Unidad</th>
                    <th>Marca</th>
                </tr>
            </thead>
        <tbody>
';        
    include '../FUNCTIONS/conn.php';

    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM productos";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $pagina .=' 
            <tr>
            <td>' .$row["id_producto"]. '</td>
            <td>' .$row["nombre"]. '</td>
            <td>' .$row["caracteristicas"]. '</td>
            <td>' .$row["unidad"]. '</td>
            <td>' .$row["marca"]. '</td>
            </tr>
            ';
        }
    }
    // Cerrar la conexión
    mysqli_close($conn);
 
$pagina.='        
            </tbody>
        </table>
    </div>
</body>
';

$css = '
<style>
        /* Estilos para el diseño de la página */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            position: absolute;
            top: 50px;
            
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 10px;
        }
        
        .logo {
            width: 150;
            height: auto;
        }
        
        .title {
            position: absolute;
            right: 0;
            font-size: 24px;
            font-weight: bold;
        }
        
        .subtitle {
            margin-top: 10px;
            font-size: 18px;
            color: #888;
        }
        
        .table {
            margin-top: 30px;
            width: 100%;
            border-collapse: collapse;
        }
        
        .table th, .table td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        
        .table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        
        .table td img {
            max-width: 50px;
            max-height: 50px;
        }
    </style>
';

$cssh = '
<style>
    .header {
        position: fixed;
        top: 0cm;
        left: 0cm;
        right: 0cm;
        height: 3cm;
    }
</style>
';

$header = '<div style="position: absolute; top: 0; left: 0; right: 0; height: 50px;">
<img src="../PDF/resources/header4.png" alt="Encabezado" style="width: 100vw; height: 100%;">
</div>';


require_once '../PDF/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();   
$mpdf->SetHeader("Tacos");
$mpdf->SetHTMLHeader($header,'\Mpdf\HTMLParserMode::HTML_BODY','E',true);
$mpdf->SetHTMLHeader($header,'\Mpdf\HTMLParserMode::HTML_BODY','O',true);
$mpdf->SetHTMLFooter('<div align="center">{PAGENO}/{nbpg}','\Mpdf\HTMLParserMode::HTML_BODY','O',true);
$mpdf->SetHTMLFooter('<div align="center">{PAGENO}/{nbpg}','\Mpdf\HTMLParserMode::HTML_BODY','E',true);
$mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($pagina,\Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->Output('Reporte de PDF','I');
?>