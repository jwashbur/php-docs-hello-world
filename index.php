<?php
$directory = "/images";

if (is_dir($directory)){
  if ($opendirectory = opendir($directory)){
    while (($file = readdir($opendirectory)) !== false){
      $image = "<a href='https://imagesprocess02.blob.core.windows.net/container1/" . "$file' target='_blank'>$file</a>";
      $imagick = new Imagick($image);
  
      // Function to set the background color
      $imagick->setbackgroundcolor('rgb(64, 64, 64)');

      // Use thumbnailImage function
      $imagick->thumbnailImage(100, 100, true, true);
      header("Content-Type: image/jpg");

      // Display the output image    
      echo $imagick->getImageBlob();
    }
    closedir($opendirectory);
  }
}
?>
