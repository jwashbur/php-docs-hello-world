<?php
$directory = "/images";

if (is_dir($directory)){
  if ($opendirectory = opendir($directory)){
    while (($file = readdir($opendirectory)) !== false){
      echo "<a href='https://imagesprocess02.blob.core.windows.net/container2/" . "$file' target='_blank'>$file</a>"."<br><br>";
    }
    closedir($opendirectory);
  }
}
?>
