<?php
// This is a class for ImageEditor which provides the Optimaze function to optimize the image file
class ImageEditor {
    // Creating variables
    public array $file;
    public int $limitSize;
    public int $quility;
    public string $destination;

    // Filling variables
    public function __construct(array $file, int $limitSize, int $quility, string $destination){
        $this->file = $file;
        $this->limitSize = $limitSize;
        $this->quility = $quility;
        $this->destination = $destination;
    }

    // Main function to optimaze picture
    public function Optimaze(){
        $image = $this->file;

        // Cheking file size
        if($this->checkSize($image)){
            $type = getimagesize($image['tmp_name']);
            // Checking file type 
            if($type){
                // Saving file
                $saved_img = $this->save($image);
                // Optimazing picture
                $this->createOptimazed($type, $saved_img, $this->quility);
                return $saved_img;
            }else{
                return "Type is not png or jpeg or gif";
            }
        }else {
            return "Size is too large";
        }

        
    }
    
    // Private method for checking file size for not exceeding
    private function checkSize($file): bool {
        if($file['size'] > $this->limitSize) return false;    
        else return true;
    }

    // Private method for creating optimazed picture
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
        // Removing original file
        unlink($source);
        imagejpeg($image, $source, $quility);
    }
    // Private function to save image
    private function save($image){
        while (true) {
            // Generating picture name
            $target_file = $this->destination.hash('ripemd160', strval(rand(0, 999999))).$image['name'];
            // Checking is exists file with this name
            if(file_exists($target_file)) continue;
            else {
                // Saving
                move_uploaded_file($image['tmp_name'], $target_file);
                return $target_file;
                break;
            }
        }

    }
    
}