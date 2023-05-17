<?PHP
  // Original PHP code by Chirp Internet: www.chirpinternet.eu
  // Please acknowledge use of this code by including this header.

  function getFileList($dir, $recurse = FALSE)
  {
    $retval = [];

    // add trailing slash if missing
    if(substr($dir, -1) != "/") {
      $dir .= "/";
    }

    // open pointer to directory and read list of files
    $d = @dir($dir) or die("getFileList: Failed opening directory {$dir} for reading");

    while(FALSE !== ($entry = $d->read())) {

      // skip hidden files
      if($entry{0} == ".") {
        continue;
      }

      if(is_dir("{$dir}{$entry}")) {

        $retval[] = [
          'name' => "{$dir}{$entry}/",
          'type' => filetype("{$dir}{$entry}"),
          'size' => 0,
          'lastmod' => filemtime("{$dir}{$entry}")
        ];

        if($recurse && is_readable("{$dir}{$entry}/")) {
          $retval = array_merge($retval, getFileList("{$dir}{$entry}/", $recurse));
        }

      } elseif(is_readable("{$dir}{$entry}")) {

        $retval[] = [
          'name' => "{$dir}{$entry}",
          'type' => mime_content_type("{$dir}{$entry}"),
          'size' => filesize("{$dir}{$entry}"),
          'lastmod' => filemtime("{$dir}{$entry}")
        ];

      }

    } // for each file

    $d->close();

    return $retval;
  }
?>
