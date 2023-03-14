<?php
require_once('imgCompress/Images.php');



if(isset($_FILES['file'])){
    // Sendig array to module
    $PATH = "localhost".str_replace(basename(__FILE__), '', $_SERVER['REQUEST_URI']).'upload/';
    $PATH = getcwd().'/upload/';
    $image = new ImageEditor($_FILES['file'], 10000000, intval($_POST['quility']), $PATH);
    $compressed = $image->Optimaze();
    print('upload/'.basename($compressed, '/'));

} else{
    echo "Empty file or corrupted";
}
