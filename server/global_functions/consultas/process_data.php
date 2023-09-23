<?php

function ProcessLevel($nivel)
{
    $nivel = false;

    if($nivel === '1')
    {
       $nivel = 'Administrador';
    }

    if($nivel === '0')
    {
        $nivel = 'Usuario';
    }

    return $nivel;
}

function EmptyPage($contenido)
{
    $respuesta =
    "
    <div class='card notes-items' role='alert' aria-live='assertive' aria-atomic='true'>
    <div class=' text-center'>
       <strong class='me-auto'>$contenido</strong>    
   </div>
 </div>
 ";

 return $respuesta;
}

function ManifestTemplate($cliente, $items, $barco)
{
    require '../conexion.php';
    require '../../vendor/autoload.php';
    $userID = UserID($_SESSION['admin']);
    $fecha = Date('d/m/Y');
    $year = Date('Y');

    $word = new \PhpOffice\PhpWord\PhpWord();

    $section1 = $word->AddSection();

    $styleTable = array('size'=> 12, 'borderSize' => 6, 'borderColor' => '888888', 'cellMargin' => 20); 
    $styleFirstRow = array('borderBottomColor' => '0000FF', 'bgColor' => '901010');
    $styleHeader = array('bold'=>true);
    $word->addTableStyle('table1', $styleTable,$styleFirstRow);
    $celdas = array('align'=> 'center', 'spaceAfter'=>0);

    $section1->addImage('../../images/logos/documents/logo_seniat.png',
    [
        "width"=> 150,
        "heigth"=> 250,
    ]);
    $section1->addText("SNAT/INA/GAP/LGU/DCA/UCB/$year                                        Fecha: $fecha                                          NOMBRE DEL BUQUE: $barco", $styleHeader);
    $section1->addText("MANIFIESTO DE CARGA CABOTAJE",  $styleHeader,  array('bold'=> true, 'align'=> 'center'));
    $table1 = $section1->addTable("table1"); 
    $table1->addRow();
    $table1->addCell(3500)->addText("CANTIDAD", $styleHeader, $celdas); 
    $table1->addCell(8000)->addText("DESCRIPCIÓN DE MERCANCÍA", $styleHeader, $celdas); 
    $table1->addCell(4500)->addText("T/M", $styleHeader, $celdas); 

    $table1->addRow();
    $table1->addCell(3500)->addText("", $styleHeader, $celdas); 
    $table1->addCell(8000)->addText("$cliente",$styleHeader, $celdas); 
    $table1->addCell(4500)->addText("", $styleHeader, $celdas); 

    foreach($items as $article)
    {
       foreach($article as $item)
       {
        $cantidad = $item['Cantidad'];
        if($cantidad > 1)
        {
            $unidad = ProcessUnits($item['Tipo_unidad']);
        }
        else
        {
          $unidad = $item['Tipo_unidad'];
        }
        
        $unidad = strtoupper($unidad);
        $descripcion = strtoupper($item['Descripcion']);
        $kilos = $item['Kilos'].'KG.';
        $table1->addRow(); 
        $table1->addCell(3500)->addText("$cantidad", null, $celdas); 
        $table1->addCell(8000)->addText("$unidad DE $descripcion", null, array('spaceAfter'=>0)); 
        $table1->addCell(4500)->addText("$kilos", null, $celdas); 
       }
    };


    $word->setDefaultFontName('Times New Roman');
    $word->setDefaultFontSize(12);

    $cliente = str_replace(',', '', $cliente);

    $ruta = "../docs/manifiestos/user_$userID/";
    $fecha = Date('d-m-y');
    $filename = "Manifiesto de $cliente $fecha.docx"; 
    $word->save($filename,"Word2007");

    if(file_exists($filename))
    {
        if(!file_exists($ruta))
        {
           $dir = mkdir($ruta, 0777, true);
           copy($filename, $ruta.$filename);
           unlink($filename);
        }
        else
        {
            copy($filename, $ruta.$filename);
            unlink($filename);
        }

        return true;
    }
    else
    {
        return false;
    }

}

function PlanillaTemplate($cliente, $responsable, $items, $total_items, $vehiculo, $conductor)
{
    require '../conexion.php';
    require '../../vendor/autoload.php';
    $fecha = Date('d/m/Y');
    $year = Date('Y');

    $word = new \PhpOffice\PhpWord\PhpWord();

    $sectionStyle = array('orientation' => null, 'marginTop' => 250, 'marginRight'=> 250, 'marginLeft'=> 250, 'marginBottom'=> 90);
    $table_1_style = array('size'=> 9, 'borderSize'=> 6, 'borderColor'=> '000000', 'bgColor'=> 'b6b6b6', 'bold'=> true);
    $table_2_style = array('Size'=> 12, 'bold'=> true);
    $table_3_style = array('Size'=> 10, 'bold'=> true, 'borderSize'=> 6, 'borderColor'=> '000000', 'bgColor'=> 'b6b6b6');
    $table_4_style = array('Size'=> 12, 'bold'=> false, 'borderSize'=> 6, 'borderColor'=> '000000', 'bgColor'=> 'ffffff');
    $table_5_style = array('bold'=> true, 'size'=> 10);
 
    $word->addTableStyle('table1',$table_1_style);
    $word->addTableStyle('table2',$table_2_style);
    $word->addTableStyle('table3',$table_3_style);
    $word->addTableStyle('table4',$table_4_style);
    $word->addTableStyle('table5',$table_3_style);
    $word->addTableStyle('table9',$table_2_style);
    $word->addTableStyle('table10',$table_3_style);
    $word->addTableStyle('table11',$table_4_style);
    $word->addTableStyle('table12',$table_2_style);
    $word->addTableStyle('table13',$table_3_style);
    $word->addTableStyle('table14',$table_4_style);
    $word->addTableStyle('table16',$table_3_style);
    $word->addTableStyle('table17',$table_4_style);
 
 
 
    $section1 = $word->AddSection($sectionStyle);
    
    $section1->addImage('../../images/logos/documents/cabecera.png', array('width'=> 567, 'height'=> 130));
    $table1 = $section1->addTable("table1"); 
    $table1->addRow();
    $table1->addCell()->addText("De Conformidad con lo establecido en los Artículos 6, 7 y 8 del Decreto con Rango, valor y Fuerza de la Ley Orgánica de Aduanas; y con el Articulo 2, numerales 3, 4, 5, 7 y 8 de la Providencia Administrativa mediante la cual se reorganiza el Área de Resguardo Aduanero de las Gerencias de Aduanas Principales Nº SNAT-2013-0045 de fecha 15/07/2013, publicada en la Gaceta oficial Nº 40.207 de fecha 15/07/2013.", array('bold'=> true), array('bold'=> true, 'align'=> 'center')); 
  
    $table2 = $section1->addTable("table2");
    $table2->addRow();
    $table2->addCell()->addText('Datos del Solicitante:', $table_2_style, $table_2_style);
 
    $table3 = $section1->addTable("table3");
    $table3->addRow();
    $table3->addCell(11000)->addText(' 1. Nombre o Razón  Social: ', $table_5_style, $table_5_style);
    $table3->addCell(4500)->addText(' 2. RIF: ', $table_5_style, $table_5_style);
 
    $table4 = $section1->addTable("table4");
    $table4->addRow();
    $table4->addCell(11500)->addText('  '.$cliente['Nombre']);
    $table4->addCell(4500)->addText('  '.$cliente['Rif']);
 
    $table5 = $section1->addTable("table5");
    $table5->addRow();
    $table5->addCell(3600)->addText(' 3. Nombre y Apellido del Responsable:', $table_5_style, $table_5_style);
    $table5->addCell(2250)->addText(' 4. Cedula de Identidad:', $table_5_style, $table_5_style);
    $table5->addCell(2250)->addText(' 5. Fecha:', $table_5_style, $table_5_style);
    $table5->addCell(3311)->addText(' 6. Sello:', $table_5_style, $table_5_style);
    
    $table6 = $section1->addTable("table6");
    $table6->addRow();
    $table6->addCell(3600, $table_4_style)->addText('  '.$responsable['Razon_social']);
    $table6->addCell(2250, $table_4_style)->addText('  '.$responsable['Rif']);
    $table6->addCell(2250, $table_4_style)->addText('  '.$fecha);
    $sello = $table6->addCell(3311, array('Size'=> 10, 'bold'=> false, 'borderSize'=> false, 'borderColor'=> 'ffffff', 'bgColor'=> 'ffffff'));
    $sello->addImage($responsable['sello'], array(
     'width' => 162,
     'height' => 97,
     'wrappingStyle' => 'infront',
     'positioning' => 'absolute',
     'posHorizontalRel' => 'margin',
     'posVerticalRel' => 'line',
    ));
 
    $table7 = $section1->addTable("table7");
    $table7->addRow();
    $num_item_cell = $table7->addCell(3600,array('Size'=> 10, 'bold'=> true, 'borderSize'=>6, 'borderColor'=> '000000', 'bgColor'=> 'b6b6b6'));
    $num_item_cell->addText(' 7. Numero de Documento: ', $table_5_style, $table_5_style);
    $cant_item_cell = $table7->addCell(2250, array('Size'=> 10, 'bold'=> true, 'borderSize'=>6, 'borderColor'=> '000000', 'bgColor'=> 'b6b6b6'));
    $cant_item_cell->addText(' 8. Cantidad de Items: ', $table_5_style, $table_5_style);
    $table7->addCell(2250, array('Size'=> 10, 'bold'=> false, 'borderSize'=> false, 'borderColor'=> 'ffffff', 'bgColor'=> 'ffffff'));
    $table7->addCell(3311, array('Size'=> 10, 'bold'=> false, 'borderSize'=> false, 'borderColor'=> 'ffffff', 'bgColor'=> 'ffffff'));
 
    $table8 = $section1->addTable("table8");
    $table8->addRow();
    $num_item_cell = $table8->addCell(3600,array('Size'=> 10, 'bold'=> false, 'borderSize'=>6, 'borderColor'=> '000000', 'bgColor'=> 'ffffff'));
    $num_item_cell->addText(' 1 ', null, array('align'=> 'center', 'spaceAfter'=>0));
    $cant_item_cell = $table8->addCell(2250, array('Size'=> 10, 'bold'=> false, 'borderSize'=>6, 'borderColor'=> '000000', 'bgColor'=> 'ffffff'));
    $cant_item_cell->addText($total_items, null, array('align'=> 'center', 'spaceAfter'=>0));
    $table8->addCell(2250, array('Size'=> 10, 'bold'=> false, 'borderSize'=> false, 'borderColor'=> 'ffffff', 'bgColor'=> 'ffffff'));
    $table8->addCell(3311, array('Size'=> 10, 'bold'=> false, 'borderSize'=> false, 'borderColor'=> 'ffffff', 'bgColor'=> 'ffffff'));
 
    $table9 = $section1->addTable("table9");
    $table9->addRow();
    $table9->addCell()->addText('Identificación de Mercancía:  ', $table_2_style, $table_2_style);
 
    $table10 = $section1->addTable("table10");
    $table10->addRow();
    $table10->addCell(7512)->addText('9. Descripción del Rubro:  ', $table_5_style, $table_5_style);
    $table10->addCell(1560)->addText('10. Cantidad: ', $table_5_style, $table_5_style);
    $table10->addCell(2342)->addText('11. Unidad de Medida: ', $table_5_style, $table_5_style);
 
    $table11 = $section1->addTable("table11");
    $filas = count($items);
    $i =0;

     for($i=0; $i<=7; $i++)
     {

        if(isset($items[$i]['Descripcion']))
        {
          if($i != 7)
          {
            $unidad = ProcessUnits($items[$i]['Tipo_unidad']);
            $descripcion = $items[$i]['Descripcion'];
            $cantidad = $items[$i]['Cantidad'];
            $kilos = $items[$i]['Kilos'];

            $table11->addRow();
            $table11->addCell(7512)->addText(' '.$unidad .$descripcion);
            $table11->addCell(1560)->addText($cantidad, null, array('align'=> 'center', 'spaceAfter'=>0));
            $table11->addCell(2342)->addText($kilos.'KG.', null, array('align'=> 'center', 'spaceAfter'=>0));
          }
          else
          {
            $table11->addRow();
            $table11->addCell(7512)->addText('Ver Anexos');
            $table11->addCell(1560)->addText('');
            $table11->addCell(2342)->addText('');
          }
        }
        else
        {
            $table11->addRow();
            $table11->addCell(7512)->addText('');
            $table11->addCell(1560)->addText('');
            $table11->addCell(2342)->addText('');
        }
     }

    $table12 = $section1->addTable("table12");
    $table12->addRow();
    $table12->addCell()->addText('Medio de Transporte y Destino de la Mercancia: ', $table_2_style, $table_2_style);
 
    $table13 = $section1->addTable("table13");
    $table13->addRow();
    $table13->addCell(9200)->addText(' 12. Vehiculo: ', $table_5_style, $table_5_style);
    $table13->addCell(2000)->addText(' 13. Placa: ', $table_5_style, $table_5_style);
    $table13->addCell(4800)->addText(' 14. Tipo/Modelo: ', $table_5_style, $table_5_style);
 
    $table14 = $section1->addTable("table14");
    $table14->addRow();
    $table14->addCell(9200)->addText(' '.$vehiculo['Marca']);
    $table14->addCell(2000)->addText(' '.$vehiculo['Placa']);
    $table14->addCell(4800)->addText(' '.$vehiculo['Modelo']);
 
    $table15 = $section1->addTable("table15");
    $table15->addRow();
    $table15->addCell(3000, array('Size'=> 10, 'bold'=> true, 'borderSize'=>6, 'borderColor'=> '000000', 'bgColor'=> 'b6b6b6'))->addText(' 15. Destino de la Mercancía:', $table_5_style, $table_5_style);
    $table15->addCell(3000, array('Size'=> 10, 'bold'=> false, 'borderSize'=> false, 'borderColor'=> 'ffffff', 'bgColor'=> 'ffffff'))->addText('  Archipiélago de los Roques ');
    $table15->addCell(3000, array('Size'=> 10, 'bold'=> false, 'borderSize'=> false, 'borderColor'=> 'ffffff', 'bgColor'=> 'ffffff'));
 
    $table16 = $section1->addTable("table16");
    $table16->addRow();
    $table16->addCell(8000)->addText(' 16. Conductor del Vehículo:  ', $table_5_style, $table_5_style);
    $table16->addCell(8000)->addText(' 17. Funcionario del SENIAT (Control Anterior): ', $table_5_style, $table_5_style);
 
    $table17 = $section1->addTable("table17");
    $table17->addRow(1500); 
    $cell1 = $table17->addCell(8000);
    $cell1->addText(' Nombre y Apellido: '.$conductor['Nombre'].' '. $conductor['Apellido'], $table_5_style, $table_5_style);
    $cell1->addText(' C.I: '.$conductor['Cedula'], $table_5_style, $table_5_style);
    $cell2 = $table17->addCell(8000);
    $cell2->addText(' CONFORME:                    Si [____]   No [____]', $table_5_style, $table_5_style);
    $cell2->addText(' Fecha y Hora: ', $table_5_style, $table_5_style);
    $cell2->addText(' Nombre y Apellido:________________________ ', $table_5_style, $table_5_style);
    $cell2->addText(' C.I: ', $table_5_style, $table_5_style);
 
    $section1->addText('Anexo: Facturas de Compra/ Lista de empaques/ Documentos de Transporte y Conductor.', null, array('align'=> 'center', 'spaceAfter'=>0));
    $section1->addText('_______________________________________________________________________', null, array('align'=> 'center', 'spaceAfter'=>0));
    $section1->addText('"Av. Soublette, Edif. SENIAT. Aduana Principal La Guaira. Edo. Vargas. Telf. 0212-3033701" "Av. Soublette. Sector Pariata. División de Control Anterior, Frente al Destacamento 452 de la GNB" Telf. 0212-7095155 correo: ocadek@seniat.gob.ve', null, array('align'=> 'center', 'spaceAfter'=>0));
 
 
    $word->setDefaultFontName('Times New Roman');
 
    $cliente = str_replace(',', '', $cliente['Nombre']);

    $ruta = "../docs/planillas/user_$userID/";
    $fecha = Date('d-m-y');
    $filename = "Planilla de $cliente $fecha.docx"; 
    $word->save($filename,"Word2007");

    if(file_exists($filename))
    {
        if(!file_exists($ruta))
        {
           $dir = mkdir($ruta, 0777, true);
           copy($filename, $ruta.$filename);
           unlink($filename);
        }
        else
        {
            copy($filename, $ruta.$filename);
            unlink($filename);
        }
    }
 
}


function ProcessUnits($unidad)
{
    $respuesta = '';

    if($unidad)
    {
        if($unidad === 'Unidad')
        {
            $respuesta = 'Unidades';
        }
        if($unidad === 'Bulto')
        {
            $respuesta = 'Bultos';
        }
        if($unidad === 'Caja')
        {
            $respuesta = 'Cajas';
        }
        if($unidad === 'Saco')
        {
            $respuesta = 'Sacos';
        }
        if($unidad === 'Frasco')
        {
            $respuesta = 'Frascos';
        }
        if($unidad === 'Botella')
        {
            $respuesta = 'Botellas';
        }
        if($unidad === 'Kilo')
        {
            $respuesta = 'Kilos';
        }

        return $respuesta;
    }
    else
    {
        return false;
    }

}

function GeneratePassword()
{
   
  $comb = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
  $pass = array(); 
  $combLen = strlen($comb) - 1; 

  for ($i = 0; $i < 8; $i++)
  {
      $n = rand(0, $combLen);
      $pass[] = $comb[$n];
  }

  $clave = implode($pass);

  return $clave;
}

function UserRandom($username)
{
   
  $comb = '1234567890';
  $pass = array(); 
  $combLen = strlen($comb) - 1; 

  for ($i = 0; $i < 10; $i++)
  {
      $n = rand(0, $combLen);
      $pass[] = $comb[$n];
  }

  $username .= implode($pass);

  return $username;
}