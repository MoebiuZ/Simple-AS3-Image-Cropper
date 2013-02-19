<?php

$uploadDir = "../temp/";

$uploadFile = $uploadDir . $_FILES['Filedata']['name'];	
move_uploaded_file($_FILES['Filedata']['tmp_name'], $uploadFile);  

?>
