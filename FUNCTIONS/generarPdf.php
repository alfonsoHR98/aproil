<?php
    
    use Mpdf\Tag\Table;
    

    $pagina = '
    <body>
        <div class="container">
            <div class="header">
                <div class="title">Aproil Manufactura de aceites industriales</div>
            </div>
    ';        
    
    include '../FUNCTIONS/conn.php';
    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $datos = $_POST["oculto"];
    

    switch($datos){
        case 1:
            $pagina .=' 
                <div class="subtitle">Inventario General Productos</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Almacen</th>
                            <th>Caracteristica</th>
                            <th>Presentación</th>
                            <th>Cantidad total</th>
                        </tr>
                    </thead>
                <tbody>
            ';

            $sql=" SELECT a.id_almacen, al.nombre AS nombrealma, p.id_producto, p.nombre, p.caracteristicas, cl.unidad_compra, SUM(cl.cantidad) AS cantidad_existente
            FROM almacen_lotes a
            JOIN almacen al ON a.id_almacen = al.id_almacen
            JOIN registro_lotes cl ON a.id_lote = cl.id_lote
            JOIN productos p ON cl.id_producto = p.id_producto
            GROUP BY a.id_almacen, p.id_producto, p.nombre " ;

            
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $pagina .=' 
                    <tr>
                    <td>' .$row["id_producto"]. '</td>
                    <td>' .$row["nombre"]. '</td>
                    <td>' .$row["nombrealma"]. '</td>
                    <td>' .$row["caracteristicas"]. '</td>
                    <td>' .$row["unidad_compra"]. '</td>
                    <td>' .$row["cantidad_existente"]. '</td>
                    </tr>
                    ';
                    }
                }
            

        break;

        case 2:

            $nombre = $_POST["id_almacen"];
            $fecha = $_POST["date1"];
            $fecha2 = $_POST["date2"];
            $id = $nombre;
            $sql = "SELECT nombre FROM almacen WHERE id_almacen = $nombre";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                        $nombre = $row["nombre"];
                    }
                }


            $pagina .=' 
                <div class="subtitle">Inventario General Del '.$nombre.'</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Caracteristica</th>
                            <th>Fecha de compra</th>
                            <th>Cantidad Existente</th>
                            <th>Cantidad total litros</th>
                        </tr>
                    </thead>
                <tbody>
            ';

            $sql=" SELECT a.id_almacen, p.id_producto, p.nombre, p.caracteristicas, DATE(l.fecha_compra) AS fecha_compra, CONCAT(cl.unidad_compra,' ',(SUM(cl.cantidad))) AS cantidad_existente, ROUND((SUM(cl.cantidad) * (SELECT valor FROM unidades_de_compra WHERE cl.unidad_compra = unidad )),2) AS unidadcompra2
            FROM almacen_lotes a
            JOIN lotes l ON a.id_lote = l.id_lote
            JOIN registro_lotes cl ON a.id_lote = cl.id_lote
            JOIN productos p ON cl.id_producto = p.id_producto
            WHERE a.id_almacen = $id AND (DATE(l.fecha_compra) BETWEEN '$fecha' AND '$fecha2')
            GROUP BY a.id_almacen, cl.id_lote, p.id_producto, p.nombre ";
            
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $pagina .=' 
                    <tr>
                    <td>' .$row["id_producto"]. '</td>
                    <td>' .$row["nombre"]. '</td>
                    <td>' .$row["caracteristicas"]. '</td>
                    <td>' .$row["fecha_compra"]. '</td>
                    <td>' .$row["cantidad_existente"]. '</td>
                    <td>' .$row["unidadcompra2"]. '</td>
                    </tr>
                    ';
                }
            }

        break;

        case 3:

            $nombre = $_POST["id_provedor"];
            $fecha = $_POST["date1"];
            $fecha2 = $_POST["date2"];
            $id = $nombre;
            $sql = "SELECT nombre FROM provedores WHERE id_provedor = $nombre";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                        $nombre = $row["nombre"];
                    }
                }


            $pagina .=' 
                <div class="subtitle">Inventario General Del Proveedor '.$nombre.'</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Caracteristica</th>
                            <th>Fecha de compra</th>
                            <th>Cantidad total</th>
                        </tr>
                    </thead>
                <tbody>
            ';

            $sql = " SELECT pr.id_provedor, pr.nombre, a.nombre, p.nombre, p.caracteristicas, DATE(l.fecha_compra) AS fecha_compra, CONCAT(cl.unidad_compra,' ',(SUM(cl.cantidad))) AS cantidad, ROUND((SUM(cl.cantidad) * (SELECT valor FROM unidades_de_compra WHERE cl.unidad_compra = unidad )),2) AS unidadcompra2
            FROM provedores pr
            JOIN lotes l ON pr.id_provedor = l.id_provedor
            JOIN almacen_lotes al ON l.id_lote = al.id_lote
            JOIN almacen a ON al.id_almacen = a.id_almacen
            JOIN registro_lotes cl ON al.id_lote = cl.id_lote
            JOIN productos p ON cl.id_producto = p.id_producto
            WHERE pr.id_provedor = $id AND (DATE(l.fecha_compra) BETWEEN '$fecha' AND '$fecha2')
            GROUP BY pr.id_provedor, p.id_producto, p.nombre
            ";

            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $pagina .=' 
                    <tr>
                    <td>' .$row["id_provedor"]. '</td>
                    <td>' .$row["nombre"]. '</td>
                    <td>' .$row["caracteristicas"]. '</td>
                    <td>' .$row["fecha_compra"]. '</td>
                    <td>' .$row["cantidad"]. '</td>
                    <td>' .$row["unidadcompra2"]. '</td>
                    </tr>
                    ';
                }
            }

        break;

        case 4:
            $pagina .=' 
                
            ';
        break;

        case 5:
            $pagina .=' 
                
            ';
        break;

        default:
            $pagina .=' 
                <td>No deberias estar aqui</td>
            ';
            
        break;

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

    $mpdf->SetHeader("APROIL");
    $mpdf->SetHTMLHeader($header,'\Mpdf\HTMLParserMode::HTML_BODY','E',true);
    $mpdf->SetHTMLHeader($header,'\Mpdf\HTMLParserMode::HTML_BODY','O',true);
    $mpdf->SetHTMLFooter('<div align="center">{PAGENO}/{nbpg}','\Mpdf\HTMLParserMode::HTML_BODY','O',true);
    $mpdf->SetHTMLFooter('<div align="center">{PAGENO}/{nbpg}','\Mpdf\HTMLParserMode::HTML_BODY','E',true);
    $mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($pagina,\Mpdf\HTMLParserMode::HTML_BODY);

    $mpdf->Output('Reporte de PDF','I');
?>