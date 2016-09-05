<?php

/**
 * Compiles .php src files to .htm
 * Copies over assest from src to dist.
 */

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

$files = glob('../src/*.php');
foreach ($files as $file) {

	// DEPRECATED - 'batch' is passed as parameter to target script. Purpose is to make sure htm files saved in right directory; allows single .php src files to be processed in browser. See footer.htm.
	// $output1 = shell_exec('php ' . $file . ' "batch" 2>&1;  echo $?;');
	exec('php ' . $file . ' "batch" ', $out, $ret);
	echo $file . "</br>";
}

// echo "START OUT <p>" . print_r($out) . " <p> END OUT";

if ($ret) {
	// if error...
	echo "<pre>";
	foreach ($out as $key => $value) {
		echo $value . "</br>";
	}
	echo "</pre>";
} else {

	$count = count($files);
	echo "<p>";
	echo $count . " .php files compiled to .htm";
}

// Copy files from src to dist
// return will be non-zero upon an error
exec('start /B copy_files.bat', $out2, $ret2);

echo "<pre>";
foreach ($out2 as $key => $value) {
	echo $value . "</br>";
}
echo "</pre>";

echo "<p>";

if (!$ret2) {
	echo "Files copied successfully";
} else {
	echo "Error copying files.";
}

// print_r($str);
