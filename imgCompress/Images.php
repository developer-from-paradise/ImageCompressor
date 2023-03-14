<?php

class ImageEditor {
    public array $file;
    public int $limitSize;
    public int $quility;
    public string $destination;


    public function __construct(array $file, int $limitSize, int $quility, string $destination){
        $this->file = $file;
        $this->limitSize = $limitSize;
        $this->quility = $quility;
        $this->destination = $destination;
    }

    public function Optimaze(){
        $image = $this->file;

        if($this->checkSize($image)){
            $type = getimagesize($image['tmp_name']);
            if($type){
                $saved_img = $this->save($image);
                $this->createOptimazed($type, $saved_img, $this->quility);
                return $saved_img;
            }else{
                return "Type is not png or jpeg or gif";
            }
        }else {
            return "Size is too large";
        }

        
    }
    

    private function checkSize($file): bool {
        if($file['size'] > $this->limitSize) return false;    
        else return true;
    }


    private function createOptimazed($type, $source, $quility){
        switch ($type['mime']){
            case 'image/jpeg':
                $image = imagecreatefromjpeg($source);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($source);
                break;
            case 'image/png':
                $image = imagecreatefrompng($source);
                break;
        }
        unlink($source);
        imagejpeg($image, $source, $quility);
    }

    private function save($image){
        while (true) {
            $target_file = $this->destination.hash('ripemd160', strval(rand(0, 999999))).$image['name'];
            if(file_exists($target_file)) continue;
            else {
                move_uploaded_file($image['tmp_name'], $target_file);
                return $target_file;
                break;
            }
        }

    }
    
}