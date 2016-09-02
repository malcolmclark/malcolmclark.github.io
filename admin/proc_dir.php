<?php

/**
 * Compiles .php src files to .htm
 * Copies over assest from src to dist.
 */

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

$files = glob('../src/*.php');
foreach ($files as $file) {

	// 'proc_dir' is passed as parameter to target script. Purpose is to make sure htm files saved in right directory; allows single .php src files to be processed in browser. See footer.htm.
	$output = shell_exec('php ' . $file . ' "proc_dir"');
	echo $file . "</br>";
}

$count = count($files);
echo "<p>";
echo $count . " files processed.";

// Copy files from src to dist

$str = exec('start /B copy_files.bat', $output, $return);

// Return will return non-zero upon an error

echo "<p>";

if (!$return) {
	echo "Files copied successfully";
} else {
	echo "Error copying files.";
}

// echo $return;
// echo $output;

// print_r($str);