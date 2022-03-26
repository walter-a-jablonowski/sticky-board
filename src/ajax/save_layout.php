<?php

chdir('../');

$args = json_decode( file_get_contents('php://input'), true);

file_put_contents( "$args[fld]/.view-config.json", json_encode( $args['layout'], JSON_PRETTY_PRINT));

echo '{"r": "success"}';

//

?>
