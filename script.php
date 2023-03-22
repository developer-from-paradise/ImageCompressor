<?php
// Importing module
require_once('imgCompress/Images.php');


// Checking is file was uploaded into a server
if(isset($_FILES['file'])){
    // Initializing path for uploaded file for webpage
    $localPATH = str_replace("\\", "/", $_SERVER['REQUEST_URI']); // For windows path
    $PATH = "localhost".str_replace(basename(__FILE__), '', $localPATH).'upload/';
    // Initializing path for uploaded file for server
    $anotherPATH = str_replace("\\", "/", getcwd()); // For windows path
    $PATH = $anotherPATH.'/upload/';
    // Creating object and setting pararmeters
    $image = new ImageEditor($_FILES['file'], 10000000, intval($_POST['quility']), $PATH);
    // Compressed file name
    $compressed = $image->Optimaze();
    // Printing path to a compressed file
    print('upload/'.basename($compressed, '/'));

} else{
    echo "Empty file or corrupted";
}
