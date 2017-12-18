<?php


require_once('sesion/sesion.php');
require_once('db/connect.php');
require_once('includes/funciones.php');

$query_stats = 'SELECT count(IdFoto) as numero, DATE(FRegistro) as dia FROM Fotos GROUP BY DAY(FRegistro) ORDER BY DAY(FRegistro) desc'; 

$result_query = mysqli_query($connectDB,$query_stats);

if(!$result_query)
    die(mysqli_error($connectDB));
else
    $rowscount = mysqli_num_rows($result_query);

if($rowscount>=1){
    $contador = 0;
    while( $stats = mysqli_fetch_assoc($result_query) and $contador<7 ){
        $numfotos[$contador] = $stats["numero"]; 
        $dia[$contador] = $stats["dia"];
        $contador++;
    }
}

// Tamaño de imagen final
$h = 500;
$w = 800;
// Colores
$im        = imagecreate($w,$h);
$gray      = imagecolorallocate ($im,0xcc,0xcc,0xcc);
$gray_lite = imagecolorallocate ($im,0xee,0xee,0xee);
$gray_dark = imagecolorallocate ($im,0x7f,0x7f,0x7f);
$white     = imagecolorallocate ($im,0xff,0xff,0xff);
$navy      = imagecolorallocate ($im,0x00,0x00,0x80); 
$darknavy  = imagecolorallocate ($im,0x00,0x00,0x50); 
$red       = imagecolorallocate ($im,0xFF,0x00,0x00); 
$darkred   = imagecolorallocate ($im,0x90,0x00,0x00); 
$bg        = imagecolorallocate ($im,117, 145, 26); 
$text_color = imagecolorallocate($im,0,0,0); 
imagefill($im, 0, 0, $bg); 

$distance = 150; // Distancia entre columnas
$bottom = 60;    // Distancia entre columnas y texto

// Cantidad de columnas
$cols = $contador;

// Tamaño de cada columna
$colw = $w / $cols;

// Calcular valor maximo a dibujar
$maximo = max($numfotos);

// Dibujamos columnas
for($i=0;$i<$cols;$i++){
    // Calculamos medidas de cada columna
    $colh = $h * $numfotos[$i] / $maximo;
    $x1 = $colw * $i;
    $x2 = $colw * $i+1 + $distance;
    $y1 = $h - $colh;
    $y2 = $h - $bottom;
    // Texto de cada columna   
    imagefilledrectangle($im,$x1,$y1,$x2,$y2,$gray);
  
    //imagerectangle($im, $x1, $y1, $x2, $y2, $red);   // Bordes desactivados

    // Texto de fechas
    imagefttext($im, 25, 0, $x1, $y2+40, $text_color, "/fonts/roboto.ttf", "".$dia[$i]); 

    // Texto de numero de fotos
    imagefttext($im, 20, 0, ($x1+$x2)/2, $y2 - ($colh/2), $text_color, "/fonts/roboto.ttf", "".$numfotos[$i]); 

    imagefttext($im, 20, 0, 25, 25, $text_color, "/fonts/roboto.ttf", "Fotos subidas en los últimos 7 días"); 
    
}
// Activa el almacenamiento en el buffer de salida 
ob_start(); 
imagepng($im); 
// ob_get_contents() devuelve el contenido del buffer de salida 
$img_src = "data:image/png;base64," . base64_encode(ob_get_contents()); 
// Limpia y deshabilita el buffer de salida 
ob_end_clean(); 

// Libera los recursos utilizados 
imagedestroy($im); 

echo '<div id="navstats">
<img style=" height: 200px;" src="' .  $img_src . '" style="width: 100px; height: 100px;" /> 
</div>';


?>