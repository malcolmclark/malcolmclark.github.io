
</div>
</div>
</div>
<script src="./assets/js/codeApp.js"></script>
</body>

</html>
<?php
// print_r($argv); // Contains an array of all the arguments passed to the script when running from the command line.

// DEPRECATED 03Sep16 - Kept, cos this is code we can use to fork to diff paths.
// $save_file_path = ($argv[1] === 'batch') ? '../dist/' : './dist/';

// Now same relative file path root. Notes V1.6
$save_file_path = '../dist/';

// Cache the contents to a file. If not created, will create file.
$cached = fopen($save_file_path . $cachefile, 'w');
fwrite($cached, ob_get_contents());
fclose($cached);
ob_end_flush(); // Send the output to the browser
?>

