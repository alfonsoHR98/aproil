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
                            <th>Cantidad existente</th>
                            <th>Cantidad total en litros</th>
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
            GROUP BY pr.id_provedor,al.id_lote,cl.unidad_compra, pr.nombre,a.nombre, p.id_producto, p.nombre
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
            $fecha = $_POST["date1"];
            $fecha2 = $_POST["date2"];
            $id_producto = $_POST["id_producto"];
            $id_almacen = $_POST["id_almacen"];
            $pagina .=' 
            <div class="subtitle">Inventario General Productos</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Almacen</th>
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
                if($id_producto != "NULL" && $id_almacen != "NULL" && $fecha ==NULL&& $fecha2 ==NULL){
                    
                    $sql=" SELECT a.id_almacen, al.nombre AS nombrealma, p.id_producto, p.nombre, p.caracteristicas, DATE(l.fecha_compra) AS fecha_compra, CONCAT(cl.unidad_compra,' ',(SUM(cl.cantidad))) AS cantidad_existente, ROUND((SUM(cl.cantidad) * (SELECT valor FROM unidades_de_compra WHERE cl.unidad_compra = unidad )),2) AS unidadcompra2
                    FROM almacen_lotes a
                    JOIN almacen al ON a.id_almacen = al.id_almacen
                    JOIN lotes l ON a.id_lote = l.id_lote
                    JOIN registro_lotes cl ON a.id_lote = cl.id_lote
                    JOIN productos p ON cl.id_producto = p.id_producto
                    WHERE a.id_almacen = $id_almacen AND p.id_producto = $id_producto
                    GROUP BY a.id_almacen, cl.unidad_compra, cl.id_lote, p.id_producto, p.nombre ";
                 
                    
                }   
            
                if($id_producto != "NULL" && $id_almacen == "NULL" && $fecha ==NULL && $fecha2 ==NULL){
                    $sql=" SELECT a.id_almacen, al.nombre AS nombrealma, p.id_producto, p.nombre, p.caracteristicas, DATE(l.fecha_compra) AS fecha_compra, CONCAT(cl.unidad_compra,' ',(SUM(cl.cantidad))) AS cantidad_existente, ROUND((SUM(cl.cantidad) * (SELECT valor FROM unidades_de_compra WHERE cl.unidad_compra = unidad )),2) AS unidadcompra2
                    FROM almacen_lotes a
                    JOIN almacen al ON a.id_almacen = al.id_almacen
                    JOIN lotes l ON a.id_lote = l.id_lote
                    JOIN registro_lotes cl ON a.id_lote = cl.id_lote
                    JOIN productos p ON cl.id_producto = p.id_producto
                    WHERE p.id_producto = $id_producto
                    GROUP BY a.id_almacen, cl.unidad_compra, cl.id_lote, p.id_producto, p.nombre "; 
                }
                if($id_producto == "NULL" && $id_almacen == "NULL" && $fecha ==NULL && $fecha2 ==NULL){
                    $sql=" SELECT a.id_almacen, al.nombre AS nombrealma, p.id_producto, p.nombre, p.caracteristicas, DATE(l.fecha_compra) AS fecha_compra, CONCAT(cl.unidad_compra,' ',(SUM(cl.cantidad))) AS cantidad_existente, ROUND((SUM(cl.cantidad) * (SELECT valor FROM unidades_de_compra WHERE cl.unidad_compra = unidad )),2) AS unidadcompra2
                    FROM almacen_lotes a
                    JOIN almacen al ON a.id_almacen = al.id_almacen
                    JOIN lotes l ON a.id_lote = l.id_lote
                    JOIN registro_lotes cl ON a.id_lote = cl.id_lote
                    JOIN productos p ON cl.id_producto = p.id_producto
                    GROUP BY a.id_almacen, cl.unidad_compra, cl.id_lote, p.id_producto, p.nombre ";
                }
                if($id_producto == "NULL" && $id_almacen != "NULL" && $fecha ==NULL && $fecha2 ==NULL){
                    $sql=" SELECT a.id_almacen, al.nombre AS nombrealma, p.id_producto, p.nombre, p.caracteristicas, DATE(l.fecha_compra) AS fecha_compra, CONCAT(cl.unidad_compra,' ',(SUM(cl.cantidad))) AS cantidad_existente, ROUND((SUM(cl.cantidad) * (SELECT valor FROM unidades_de_compra WHERE cl.unidad_compra = unidad )),2) AS unidadcompra2
                    FROM almacen_lotes a
                    JOIN almacen al ON a.id_almacen = al.id_almacen
                    JOIN lotes l ON a.id_lote = l.id_lote
                    JOIN registro_lotes cl ON a.id_lote = cl.id_lote
                    JOIN productos p ON cl.id_producto = p.id_producto
                    WHERE a.id_almacen = $id_almacen 
                    GROUP BY a.id_almacen, cl.unidad_compra, cl.id_lote, p.id_producto, p.nombre ";
                }

                #-----------------------------------------------------------------------------------

                if($id_producto != "NULL" && $id_almacen != "NULL" && $fecha !=NULL&& $fecha2 !=NULL){
                    
                    $sql=" SELECT a.id_almacen, al.nombre AS nombrealma, p.id_producto, p.nombre, p.caracteristicas, DATE(l.fecha_compra) AS fecha_compra, CONCAT(cl.unidad_compra,' ',(SUM(cl.cantidad))) AS cantidad_existente, ROUND((SUM(cl.cantidad) * (SELECT valor FROM unidades_de_compra WHERE cl.unidad_compra = unidad )),2) AS unidadcompra2
                    FROM almacen_lotes a
                    JOIN almacen al ON a.id_almacen = al.id_almacen
                    JOIN lotes l ON a.id_lote = l.id_lote
                    JOIN registro_lotes cl ON a.id_lote = cl.id_lote
                    JOIN productos p ON cl.id_producto = p.id_producto
                    WHERE a.id_almacen = $id_almacen AND p.id_producto = $id_producto AND (DATE(l.fecha_compra) BETWEEN '$fecha' AND '$fecha2')
                    GROUP BY a.id_almacen, cl.unidad_compra, cl.id_lote, p.id_producto, p.nombre ";
                 
                    
                }   
            
                if($id_producto != "NULL" && $id_almacen == "NULL" && $fecha !=NULL && $fecha2 !=NULL){
                    $sql=" SELECT a.id_almacen, al.nombre AS nombrealma, p.id_producto, p.nombre, p.caracteristicas, DATE(l.fecha_compra) AS fecha_compra, CONCAT(cl.unidad_compra,' ',(SUM(cl.cantidad))) AS cantidad_existente, ROUND((SUM(cl.cantidad) * (SELECT valor FROM unidades_de_compra WHERE cl.unidad_compra = unidad )),2) AS unidadcompra2
                    FROM almacen_lotes a
                    JOIN almacen al ON a.id_almacen = al.id_almacen
                    JOIN lotes l ON a.id_lote = l.id_lote
                    JOIN registro_lotes cl ON a.id_lote = cl.id_lote
                    JOIN productos p ON cl.id_producto = p.id_producto
                    WHERE p.id_producto = $id_producto AND (DATE(l.fecha_compra) BETWEEN '$fecha' AND '$fecha2')
                    GROUP BY a.id_almacen, cl.unidad_compra, cl.id_lote, p.id_producto, p.nombre "; 
                }
                if($id_producto == "NULL" && $id_almacen == "NULL" && $fecha !=NULL && $fecha2 !=NULL){
                    $sql=" SELECT a.id_almacen, al.nombre AS nombrealma, p.id_producto, p.nombre, p.caracteristicas, DATE(l.fecha_compra) AS fecha_compra, CONCAT(cl.unidad_compra,' ',(SUM(cl.cantidad))) AS cantidad_existente, ROUND((SUM(cl.cantidad) * (SELECT valor FROM unidades_de_compra WHERE cl.unidad_compra = unidad )),2) AS unidadcompra2
                    FROM almacen_lotes a
                    JOIN almacen al ON a.id_almacen = al.id_almacen
                    JOIN lotes l ON a.id_lote = l.id_lote
                    JOIN registro_lotes cl ON a.id_lote = cl.id_lote
                    JOIN productos p ON cl.id_producto = p.id_producto
                    WHERE  (DATE(l.fecha_compra) BETWEEN '$fecha' AND '$fecha2')
                    GROUP BY a.id_almacen, cl.unidad_compra, cl.id_lote, p.id_producto, p.nombre ";
                }
                if($id_producto == "NULL" && $id_almacen != "NULL" && $fecha !=NULL && $fecha2 !=NULL){
                    $sql=" SELECT a.id_almacen, al.nombre AS nombrealma, p.id_producto, p.nombre, p.caracteristicas, DATE(l.fecha_compra) AS fecha_compra, CONCAT(cl.unidad_compra,' ',(SUM(cl.cantidad))) AS cantidad_existente, ROUND((SUM(cl.cantidad) * (SELECT valor FROM unidades_de_compra WHERE cl.unidad_compra = unidad )),2) AS unidadcompra2
                    FROM almacen_lotes a
                    JOIN almacen al ON a.id_almacen = al.id_almacen
                    JOIN lotes l ON a.id_lote = l.id_lote
                    JOIN registro_lotes cl ON a.id_lote = cl.id_lote
                    JOIN productos p ON cl.id_producto = p.id_producto
                    WHERE a.id_almacen = $id_almacen AND (DATE(l.fecha_compra) BETWEEN '$fecha' AND '$fecha2')
                    GROUP BY a.id_almacen, cl.unidad_compra, cl.id_lote, p.id_producto, p.nombre ";
                }




                $result = mysqli_query($conn, $sql);
            
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $pagina .=' 
                        <tr>
                        <td>' .$row["nombrealma"]. '</td>
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

        
        
        case 7:
            
            $id_cliente = $_POST["id_cliente"];
            $pagina .=' 
                <div class="subtitle">Inventario General Productos</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>RFC</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                        </tr>
                    </thead>
                <tbody>
            ';
            if($id_cliente != "NULL"){
                $sql=" SELECT c.id_cliente, c.nombre, c.direccion , c.rfc, c.telefono, c.correo
                FROM clientes c 
                WHERE c.id_cliente = $id_cliente" ;

                
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $pagina .=' 
                        <tr>
                        <td>' .$row["id_cliente"]. '</td>
                        <td>' .$row["nombre"]. '</td>
                        <td>' .$row["direccion"]. '</td>
                        <td>' .$row["rfc"]. '</td>
                        <td>' .$row["telefono"]. '</td>
                        <td>' .$row["correo"]. '</td>
                        </tr>
                        ';
                        }
                    } 

            }else{
                $sql=" SELECT c.id_cliente, c.nombre, c.direccion , c.rfc, c.telefono, c.correo
                FROM clientes c " ;

                
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $pagina .=' 
                        <tr>
                        <td>' .$row["id_cliente"]. '</td>
                        <td>' .$row["nombre"]. '</td>
                        <td>' .$row["direccion"]. '</td>
                        <td>' .$row["rfc"]. '</td>
                        <td>' .$row["telefono"]. '</td>
                        <td>' .$row["correo"]. '</td>
                        </tr>
                        ';
                        }
                    }
            }
            
            

        break;
        case 8:            
            $id_cliente = $_POST["id_cliente"];
            $pagina .=' 
                <div class="subtitle">Inventario General Productos</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Cliente</th>
                            <th>ID-Venta</th>
                            <th>Fecha Venta</th>
                            <th>IMPORTE</th>
                        </tr>
                    </thead>
                <tbody>
            ';

            if($id_cliente != "NULL"){
                $sql="SELECT 
                c.id_cliente, c.nombre AS nombre_cliente, cp.id_venta, cp.fecha_venta, rv.precio_venta AS importe
                FROM clientes c
                JOIN ventas cp ON c.id_cliente = cp.id_cliente
                JOIN registro_ventas rv ON cp.id_venta = rv.id_venta
                WHERE c.id_cliente = $id_cliente
                GROUP BY c.id_cliente, c.nombre, cp.id_venta, cp.fecha_venta" ;

                

                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $pagina .=' 
                        <tr>
                        <td>' .$row["id_cliente"]. '</td>
                        <td>' .$row["nombre_cliente"]. '</td>
                        <td>' .$row["id_venta"]. '</td>
                        <td>' .$row["fecha_venta"]. '</td>
                        <td>' .$row["importe"]. '</td>
                        </tr>
                        ';
                        }
                    } 

            }else{
                $sql="SELECT 
                c.id_cliente, c.nombre AS nombre_cliente, cp.id_venta, cp.fecha_venta, rv.precio_venta AS importe
                FROM clientes c
                JOIN ventas cp ON c.id_cliente = cp.id_cliente
                JOIN registro_ventas rv ON cp.id_venta = rv.id_venta 
                GROUP BY c.id_cliente, c.nombre, cp.id_venta, cp.fecha_venta" ;

                
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $pagina .=' 
                        <tr>
                        <td>' .$row["id_cliente"]. '</td>
                        <td>' .$row["nombre_cliente"]. '</td>
                        <td>' .$row["id_venta"]. '</td>
                        <td>' .$row["fecha_venta"]. '</td>
                        <td>' .$row["importe"]. '</td>
                        </tr>
                        ';
                        }
                    }
            }
            
            

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