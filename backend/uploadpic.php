<?php

//require_once('../config.php');
//require_once('../include/db.php');

/*$temp = fopen('/tmp/omtemp.jpg', 'wb');
fwrite($temp, file_get_contents("php://input"));

$exif = exif_read_data("/tmp/omtemp.jpg", 0, true);

$tabla = $exif['IFD0']['ImageDescription'];

$datos = explode ("/", $tabla);

$sql = "INSERT INTO imagenes_" . $datos[0] .  "(" . $datos[0] . "_id, image, thumbmedium, thumbsmall) values($datos[1], '" . addslashes(file_get_contents("php://input")) . "', '" . addslashes(file_get_contents("php://input")) . "', '" . addslashes(file_get_contents("php://input")) . "')";

$fp = fopen("/tmp/culo.txt", "w");
fwrite($fp, $sql);
fclose($fp); */

function getFilesFromDir($dir) {
  $files = array();
  if ($handle = opendir($dir)) {
    do {
        $file = readdir($handle);
 if ($file != "." && $file != "..") {
            if(is_dir($dir.'/'.$file)) {
            } else {
              $files[] = $dir.'/'.$file;
            }
        }
    } while ($file);
    closedir($handle);
  }

  return $files;
}






$parse = "<?xml version='1.0' standalone='yes'?>\n" . $_POST['contenido'];

$xml = simplexml_load_string($parse);


/*$imagen = base64_decode($xml->image);

$thumbm = imagecreatetruecolor(100, 100);
//$thumbs = imagecreatetruecolor($new_width, $new_height);

imagecopyresampled($thumbm,$image,0,0,0,0,100,100,700,450); 

imagejpeg($thumbm, '/tmp/culo2.jpg');
*/

mkdir("../imagenes/" . $xml->tabla . "/" . $xml->ident);
mkdir("../imagenes/" . $xml->tabla . "/" . $xml->ident . "/tm");
mkdir("../imagenes/" . $xml->tabla . "/" . $xml->ident . "/tp");


$imagenes = getFilesFromDir('../imagenes/' . $xml->tabla . '/' . $xml->ident);

/*
if (sizeof($imagenes) == 0) {
	$num = 0;
} else {
	for ($i = 0; $i < sizeof($imagenes); $i++) {
		$imagenes[$i] = str_replace('.jpg', '', $imagenes[$i]);
	}
	$num = $imagenes(sizeof($imagenes));
}
*/



$f1 = fopen(dirname(__FILE__) . '/../imagenes/' . $xml->tabla . '/' . $xml->ident . '/' . $xml->identimg . '.jpg', "w");
fwrite($f1, base64_decode($xml->image));
fclose($f1);

$f1 = fopen(dirname(__FILE__) . '/../imagenes/' . $xml->tabla . '/' . $xml->ident . '/tm/' . $xml->identimg . '.jpg', "w");
fwrite($f1, base64_decode($xml->thumbm));
fclose($f1);

$f1 = fopen(dirname(__FILE__) . '/../imagenes/' . $xml->tabla . '/' . $xml->ident . '/tp/' . $xml->identimg . '.jpg', "w");
fwrite($f1, base64_decode($xml->thumbs));
fclose($f1);



//$sql = "INSERT INTO imagenes_" . $xml->tabla .  "(" . $xml->tabla . "_id, image, thumbmedium, thumbsmall) values($xml->ident, '" . addslashes(base64_decode($xml->image)) . "', '" . addslashes(base64_decode($xml->thumbm)) . "', '" . addslashes(base64_decode($xml->thumbs)) . "')";


//$db->query($sql);


?>


