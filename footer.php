<script src="./codeApp.js"></script>

</html>

<?php
// Cache the contents to a file
$cached = fopen($cachefile, 'w');
// $cached = fopen('./dist/' . $cachefile, 'w');
fwrite($cached, ob_get_contents());
fclose($cached);
ob_end_flush(); // Send the output to the browser