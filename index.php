<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Compressor</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  


<form class="form" id="file-upload-form" enctype="multipart/form-data">
  <label for="file-upload" class="file" id="file-drag">
    <input type="file" id='file-upload' class="hidden" name="file" required>
    <img id="file-image" src="#" alt="Preview" class="hidden">
    <div id="start">
      <i class="fa fa-download" aria-hidden="true"></i>
      <div class="description">Select a file or drag here</div>
      <div id="notimage" class="hidden">Please select an image</div>
      <div class="file_select" id="file-upload-btn">Select an image</div>
    </div>
    <div class="description">Quility</div>
    <input type="range" value="70" min="0" max="100" name="quality">
    <div id="h4-container"><div id="h4-subcontainer"><h4>70<span></span></h4></div></div>
    <label id="file-name"></label>
   
    <img src="" id="image-compressed" class="hidden">

    <a href="" id="download-btn" class="hidden" download>Download</a>
  </label>
  <input type="submit" value="Compress" id='submit-button'>
</form>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/script.js"></script>
</body>
</html>