<?php

// Declare varibales
$target_dir = "uploads"; // upload directory
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]); // file path
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); /// return the file extension
?>
