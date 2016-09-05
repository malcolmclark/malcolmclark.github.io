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
    <title>
      <?php echo $title; ?>
    </title>
    <meta charset="utf-8" />
    <style type="text/css">
    #toc-wrapper {
      height: 100%;
    }

    </style>
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.7.4/polyfill.js"></script>
    <link type="text/css" rel="stylesheet" href="./libs-3rd/bootstrap-4a3/css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="./assets/css/styles.css" />
    <link type="text/css" rel="stylesheet" href="./libs-3rd/prettify/prettify.css" />
    <link type="text/css" rel="stylesheet" href="./libs-3rd/jquery.tocify.css" />
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./libs-3rd/bootstrap-4a3/js/bootstrap.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
    <script src="./libs-3rd/prettify/prettify.js?lang=js&amp;"></script>
    <script src="./libs-3rd/jquery.tocify.min.js"></script>
    <script>
    $(document).ready(function() {

      // Table o Contents for LH Sidebar. What to display
      $("#toc").tocify({
        theme: "bootstrap", // Added as per
        selectors: "h1,h2,h3,h4"
      });

      codeApp.doInit()

      $("a[href^='http://'], a[href^='https://']").attr("target", "_blank")

    });

    </script>
  </head>

  <body>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="col-sm-3">
          <div id="toc-wrapper">
            <div id="toc"></div>
          </div>
          <div id="output"></div>
        </div>
        <div class="col-sm-9">

          <header>
            <img src="./assets/images/<?php echo $header_img; ?>" class="img-fluid m-x-auto img-circle" alt="">
          </header>
          <nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Navbar</a>
    <ul class="nav navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
    <form class="form-inline pull-xs-right">
      <input class="form-control" type="text" placeholder="Search">
      <button class="btn btn-outline-secondary" type="submit">Search</button>
    </form>
  </nav>

