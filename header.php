<?php
// cache to create static htm pages
$url = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $url);
$file = $break[count($break) - 1];
// $cachefile = 'cached-' . substr_replace($file, "", -4) . '.html';
$cachefile = substr_replace($file, "", -8) . '.htm';
$cachetime = 0; // eg 18000 for site caching. Here we just want to compile into HTML for github static html web site.

// Serve from the cache if it is younger than $cachetime
if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
	echo "<!-- Cached copy, generated " . date('H:i', filemtime($cachefile)) . " -->\n";
	include $cachefile;
	exit;
}
ob_start(); // Start the output buffer
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $title; ?></title>
  <meta charset="utf-8" />
  <style type="text/css">
  #toc-wrapper {
    height: 100%;
  }

  </style>
  <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.7.4/polyfill.js"></script>
  <link type="text/css" rel="stylesheet" href="bootstrap.css" />
  <link type="text/css" rel="stylesheet" href="styles.css" />
  <link type="text/css" rel="stylesheet" href="./prettify/prettify.css" />
  <link type="text/css" rel="stylesheet" href="jquery.tocify.css" />
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
  <script src="./prettify/prettify.js?lang=js&amp;"></script>
  <script src="./jquery.tocify.min.js"></script>
  <script>
  $(document).ready(function() {

    // Table o Contents for LH Sidebar. What to display
    $("#toc").tocify({
      selectors: "h1,h2,h3,h4"
    });

    codeApp.doInit()

  });
  </script>
</head>