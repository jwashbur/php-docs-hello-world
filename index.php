<?php
$directory = "images";

if (is_dir($directory)){
  if ($opendirectory = opendir($directory)){
    while (($file = readdir($opendirectory)) !== false){
      echo "<a href='https://imagesprocessapp02.azurewebsites.net/$directory" . "$file'>$file</a>"."<br>";
    }
    closedir($opendirectory);
  }
}
?>
