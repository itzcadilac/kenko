<?php

	# Incluyendo librerias necesarias #
    require "./code128.php";
    require('../vendor/autoload.php');
    
    $dotenv = new Dotenv\Dotenv('../application/'); $dotenv->load();
    $DB_USER = getenv('DB_USER');    
    $DB_PASS = getenv('DB_PASS');    
    $DB_NAME = getenv('DB_NAME');    

    $conexion = new mysqli('localhost', $DB_USER, $DB_PASS, $DB_NAME);
    
    $id = $_GET["id"];
    $sqldetalle = "SELECT 
						mf.desctamfruta as desctamfruta1,
						sdt.cantjbs as cantjbs1,
						tj.nombcorto as nombcorto1, 
						sdt.peso as peso1 		
                        FROM 
                            serviciosdet sdt
						INNER JOIN medida_fruta mf ON sdt.idtamfruta = mf.idtamfruta 
						INNER JOIN tipo_jaba tj ON sdt.idtipjaba = tj.idtipjaba 
                        WHERE 
                            sdt.idservicio = '".$id."';";
                            $result= mysqli_query($conexion,$sqldetalle) or die(mysql_error());

    $sqltotaljabas = "SELECT 
						SUM(sdt.cantjbs) AS totaljabas
                        FROM 
                            serviciosdet sdt
                        WHERE 
                            sdt.idservicio = '".$id."';";
        $result1= mysqli_query($conexion,$sqltotaljabas) or die(mysql_error());
        while($row1=mysqli_fetch_array($result1))
        {
            $totaljabas = $row1['totaljabas'];
        }

$sqltotalpeso = "SELECT 
						SUM(sdt.peso) AS totalpeso
                        FROM 
                            serviciosdet sdt
                        WHERE 
                            sdt.idservicio = '".$id."';";
             $result2= mysqli_query($conexion,$sqltotalpeso) or die(mysql_error());
             while($row2=mysqli_fetch_array($result2))
             {
                 $totalpeso = $row2['totalpeso'];
             }                       

$sqldatosserv = "SELECT 
						*
                        FROM 
                            servicios serv
						INNER JOIN tipo_fruta tf ON serv.idtipfruta = tf.idtipfruta
						INNER JOIN cliente cl ON serv.idcliente = cl.idecliente                             
                        INNER JOIN tipo_servicio ts ON serv.idtipservicio = ts.idtipservicio
                        WHERE 
                            serv.idservicio = '".$id."';";
             $result3= mysqli_query($conexion,$sqldatosserv) or die(mysql_error());
             while($row3=mysqli_fetch_array($result3))
             {
                 $nombres = $row3['nombres'];
                 $direccion = $row3['direccion'];
                 $costo = $row3['costo'];
                 $montopapelblanco = $row3['montopapelblanco'];
                 $descripcionfruta = $row3['descripcionfruta'];
                 $descservicio = $row3['descservicio'];

             }     

    $numero3 = number_format($montopapelblanco, 2, '.', '');         
    $costofinalsinpapel = $costo * $totalpeso;
    $numero1 = number_format($costofinalsinpapel, 2, '.', '');
    $costofinalconpapel = $costofinalsinpapel + $montopapelblanco;
    $numero2 = number_format($costofinalconpapel, 2, '.', '');
                            
    $pdf = new PDF_Code128('P','mm',array(80,200));
    $pdf->SetMargins(4,10,4);
    $pdf->AddPage();
    
    # Encabezado y datos de la empresa #
    $pdf->SetFont('Arial','B',10);
    $pdf->SetTextColor(0,0,0);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1",strtoupper("procesadora")),0,'C',false);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1",strtoupper("kenko")),0,'C',false);
    $pdf->SetFont('Arial','',9);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","RUC: 20123456789"),0,'C',false);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Huaral"),0,'C',false);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Teléfono: 987654321"),0,'C',false);

    $pdf->Ln(1);
    $pdf->Cell(0,5,iconv("UTF-8", "ISO-8859-1","------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Fecha: ".date("d/m/Y")." ".date("h:s A")),0,'C',false);
    //$pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Caja Nro: 1"),0,'C',false);
    $pdf->SetFont('Arial','B',10);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1",strtoupper("Servicio Nro: ". $id)),0,'C',false);
    $pdf->SetFont('Arial','',9);

    $pdf->Ln(1);
    $pdf->Cell(0,5,iconv("UTF-8", "ISO-8859-1","------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Cliente: ". $nombres),0,'J',false);
    //$pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Teléfono: 00000000"),0,'C',false);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Destino: ". $direccion),0,'J',false);

    $pdf->Ln(1);
    $pdf->Cell(0,5,iconv("UTF-8", "ISO-8859-1","-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Producto: ". $descripcionfruta),0,'J',false);
    $pdf->Ln(1);
    $pdf->Cell(0,5,iconv("UTF-8", "ISO-8859-1","-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);

    # Tabla de productos #
    $pdf->Cell(10,5,iconv("UTF-8", "ISO-8859-1","Tam."),0,0,'R');
    $pdf->Cell(15,5,iconv("UTF-8", "ISO-8859-1","Cant."),0,0,'R');
    $pdf->Cell(20,5,iconv("UTF-8", "ISO-8859-1","Peso"),0,0,'R');

    $pdf->Ln(3);
    $pdf->Cell(72,5,iconv("UTF-8", "ISO-8859-1","-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);

    

    /*----------  Detalles de la tabla  ----------*/
    //$pdf->MultiCell(0,4,iconv("UTF-8", "ISO-8859-1","Nombre de producto a vender"),0,'C',false);
    

    while($row=mysqli_fetch_array($result))
                            {
                               
                            $pdf->Cell(10,5,iconv("UTF-8", "ISO-8859-1", $row[desctamfruta1]),0,0,'R');
                            $pdf->Cell(19,5,iconv("UTF-8", "ISO-8859-1", $row[cantjbs1] . " " . $row[nombcorto1]),0,0,'R');
                            $pdf->Cell(21,5,iconv("UTF-8", "ISO-8859-1", $row[peso1] ." Kgs."),0,0,'R');
                            //$pdf->MultiCell(0,4,iconv("UTF-8", "ISO-8859-1","Garantía de fábrica: 2 Meses"),0,'C',false);
                            $pdf->Ln(4);

                            }
    /*----------  Fin Detalles de la tabla  ----------*/
    $pdf->Cell(72,5,iconv("UTF-8", "ISO-8859-1","-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(4);
    $pdf->Cell(10,4,iconv("UTF-8", "ISO-8859-1", "Total"),0,0,'R');
    $pdf->Cell(19,4,iconv("UTF-8", "ISO-8859-1", $totaljabas . " Jbs."),0,0,'R');
    $pdf->Cell(21,4,iconv("UTF-8", "ISO-8859-1", $totalpeso . " Kgs."),0,0,'R');
    $pdf->Cell(7,4,iconv("UTF-8", "ISO-8859-1", "S/"),0,0,'R');
    $pdf->Cell(15,4,iconv("UTF-8", "ISO-8859-1", $numero1),0,0,'R');
    $pdf->Ln(4);
    $pdf->Cell(30,4,iconv("UTF-8", "ISO-8859-1", "P/Blanco"),0,0,'R');
    $pdf->Cell(20,4,iconv("UTF-8", "ISO-8859-1", " ----------> "),0,0,'R');
    $pdf->Cell(7,4,iconv("UTF-8", "ISO-8859-1", "S/"),0,0,'R');
    $pdf->Cell(15,4,iconv("UTF-8", "ISO-8859-1", $numero3),0,0,'R');
    $pdf->Ln(3);
    $pdf->Cell(72,5,iconv("UTF-8", "ISO-8859-1","------------------"),0,0,'R');
    $pdf->Ln(4);
    $pdf->Cell(30,4,iconv("UTF-8", "ISO-8859-1", ""),0,0,'R');
    $pdf->Cell(20,4,iconv("UTF-8", "ISO-8859-1", ""),0,0,'R');
    $pdf->Cell(7,4,iconv("UTF-8", "ISO-8859-1", "S/"),0,0,'R');
    $pdf->Cell(15,4,iconv("UTF-8", "ISO-8859-1", $numero2),0,0,'R');

    $pdf->Ln(8);

    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","*** Se hace entrega de este hoja como información del procesamiento realizado. ***"),0,'C',false);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(0,7,iconv("UTF-8", "ISO-8859-1","Gracias por su preferencia"),'',0,'C');

    $pdf->Ln(9);

    # Codigo de barras #
    $pdf->Code128(5,$pdf->GetY(),"COD000001V000".$id,70,10);
    $pdf->SetXY(0,$pdf->GetY()+10);
    $pdf->SetFont('Arial','',8);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","COD000001V000".$id),0,'C',false);
    
    # Nombre del archivo PDF #
    $pdf->Output("D","Servicio".$id.".pdf",true);