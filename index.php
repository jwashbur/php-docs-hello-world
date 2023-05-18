<?php
echo "Hello, World!";
$scan = scandir('/images/images/');
foreach($scan as $file) {
   if (!is_dir("/images/images/$file")) {
      echo $file , '<br>''
';
   }
}
?>
