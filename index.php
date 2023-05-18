<?php
echo "Hello, World!";
$scan = scandir('/images');
foreach($scan as $file) {
   if (!is_dir("/images/$file")) {
      echo $file.'
';
   }
}
?>
