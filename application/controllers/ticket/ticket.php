<?php

	# Incluyendo librerias necesarias #
    require "./code128.php";
    $id = $_GET["id"];
    $destino = $_GET["direccion"];
    $apodo = $_GET["cliente"];
    $dni = $_GET["dni"];
    $descripcionfruta = $_GET["descripcionfruta"];
    $descripcionjaba = $_GET["descripcionjaba"];
    $peso = $_GET["peso"];
    $cantjabas = $_GET["cantjabas"];
    $pdf = new PDF_Code128('P','mm',array(80,258));
    $pdf->SetMargins(4,10,4);
    $pdf->AddPage();
    
    # Encabezado y datos de la empresa #
    $pdf->SetFont('Arial','B',10);
    $pdf->SetTextColor(0,0,0);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1",strtoupper("procesadora kenko")),0,'C',false);
    $pdf->SetFont('Arial','',9);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","RUC: 0000000000"),0,'C',false);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Huaral"),0,'C',false);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Teléfono: 00000000"),0,'C',false);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Email: correo@ejemplo.com"),0,'C',false);

    $pdf->Ln(1);
    $pdf->Cell(0,5,iconv("UTF-8", "ISO-8859-1","------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Fecha: ".date("d/m/Y", NOW())." ".date("h:s A")),0,'C',false);
    //$pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Caja Nro: 1"),0,'C',false);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Cajero: Usuario"),0,'C',false);
    $pdf->SetFont('Arial','B',10);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1",strtoupper("Ticket Nro: ". $id)),0,'C',false);
    $pdf->SetFont('Arial','',9);

    $pdf->Ln(1);
    $pdf->Cell(0,5,iconv("UTF-8", "ISO-8859-1","------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Cliente: ". $apodo),0,'C',false);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Documento: DNI ". $dni),0,'C',false);
    //$pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Teléfono: 00000000"),0,'C',false);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Destino: ". $destino),0,'C',false);

    $pdf->Ln(1);
    $pdf->Cell(0,5,iconv("UTF-8", "ISO-8859-1","-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);

    # Tabla de productos #
    $pdf->Cell(10,5,iconv("UTF-8", "ISO-8859-1","Jaba"),0,0,'C');
    $pdf->Cell(19,5,iconv("UTF-8", "ISO-8859-1","Cant."),0,0,'C');
    $pdf->Cell(15,5,iconv("UTF-8", "ISO-8859-1","Desc."),0,0,'C');
    $pdf->Cell(28,5,iconv("UTF-8", "ISO-8859-1","Peso"),0,0,'C');

    $pdf->Ln(3);
    $pdf->Cell(72,5,iconv("UTF-8", "ISO-8859-1","-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);



    /*----------  Detalles de la tabla  ----------*/
    //$pdf->MultiCell(0,4,iconv("UTF-8", "ISO-8859-1","Nombre de producto a vender"),0,'C',false);
    $pdf->Cell(10,4,iconv("UTF-8", "ISO-8859-1", $descripcionjaba),0,0,'C');
    $pdf->Cell(19,4,iconv("UTF-8", "ISO-8859-1", $cantjabas),0,0,'C');
    $pdf->Cell(19,4,iconv("UTF-8", "ISO-8859-1", $descripcionfruta),0,0,'C');
    $pdf->Cell(28,4,iconv("UTF-8", "ISO-8859-1", $peso),0,0,'C');
    $pdf->Ln(4);
    //$pdf->MultiCell(0,4,iconv("UTF-8", "ISO-8859-1","Garantía de fábrica: 2 Meses"),0,'C',false);
    $pdf->Ln(7);
    /*----------  Fin Detalles de la tabla  ----------*/



    $pdf->Cell(72,5,iconv("UTF-8", "ISO-8859-1","-------------------------------------------------------------------"),0,0,'C');
 /*
        $pdf->Ln(5);
   
    # Impuestos & totales #
    $pdf->Cell(18,5,iconv("UTF-8", "ISO-8859-1",""),0,0,'C');
    $pdf->Cell(22,5,iconv("UTF-8", "ISO-8859-1","SUBTOTAL"),0,0,'C');
    $pdf->Cell(32,5,iconv("UTF-8", "ISO-8859-1","+ $70.00 USD"),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(18,5,iconv("UTF-8", "ISO-8859-1",""),0,0,'C');
    $pdf->Cell(22,5,iconv("UTF-8", "ISO-8859-1","IVA (13%)"),0,0,'C');
    $pdf->Cell(32,5,iconv("UTF-8", "ISO-8859-1","+ $0.00 USD"),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(72,5,iconv("UTF-8", "ISO-8859-1","-------------------------------------------------------------------"),0,0,'C');
    
    $pdf->Ln(5);

    $pdf->Cell(18,5,iconv("UTF-8", "ISO-8859-1",""),0,0,'C');
    $pdf->Cell(22,5,iconv("UTF-8", "ISO-8859-1","TOTAL A PAGAR"),0,0,'C');
    $pdf->Cell(32,5,iconv("UTF-8", "ISO-8859-1","$70.00 USD"),0,0,'C');

    $pdf->Ln(5);
    
    $pdf->Cell(18,5,iconv("UTF-8", "ISO-8859-1",""),0,0,'C');
    $pdf->Cell(22,5,iconv("UTF-8", "ISO-8859-1","TOTAL PAGADO"),0,0,'C');
    $pdf->Cell(32,5,iconv("UTF-8", "ISO-8859-1","$100.00 USD"),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(18,5,iconv("UTF-8", "ISO-8859-1",""),0,0,'C');
    $pdf->Cell(22,5,iconv("UTF-8", "ISO-8859-1","CAMBIO"),0,0,'C');
    $pdf->Cell(32,5,iconv("UTF-8", "ISO-8859-1","$30.00 USD"),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(18,5,iconv("UTF-8", "ISO-8859-1",""),0,0,'C');
    $pdf->Cell(22,5,iconv("UTF-8", "ISO-8859-1","USTED AHORRA"),0,0,'C');
    $pdf->Cell(32,5,iconv("UTF-8", "ISO-8859-1","$0.00 USD"),0,0,'C');
    */
    $pdf->Ln(10);

    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","*** Se hace entrega de este ticket como referencia al producto recibido ***"),0,'C',false);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(0,7,iconv("UTF-8", "ISO-8859-1","Gracias por su compra"),'',0,'C');

    $pdf->Ln(9);

    # Codigo de barras #
    $pdf->Code128(5,$pdf->GetY(),"COD000001V0001",70,20);
    $pdf->SetXY(0,$pdf->GetY()+21);
    $pdf->SetFont('Arial','',14);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","COD000001V0001"),0,'C',false);
    
    # Nombre del archivo PDF #
    $pdf->Output("I","Ticket.pdf",true);