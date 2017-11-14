<?php

// Declare varibales
$target_dir = "uploads"; // upload directory
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]); // file path
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); /// return the file extension

// check for file validity

if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["dummy_name"]);

  if($check !== false){
    echo "Valid image file.".$check["mime"].".";
    $uploadOk = 1;

  } else {
    echo "File is invalid.";

    $uploadOk = 0;
  }
}
?>
