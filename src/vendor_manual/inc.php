<?php

/*@

inc()

ARGS:
  args: single array or object
RETURNS: '' if no view

*/
function inc( string $INC_VIEW, $args = null ) : string  /*@*/
{
  if( ! is_file($INC_VIEW) )  return '';  // TASK

  ob_start();                   // Alternative: $s = require()
  require($INC_VIEW);
  $INC_STR_R = ob_get_clean();  // var has unusual name

  $INC_STR_R .= "\n";

  return $INC_STR_R;
}


/*@

Variant like inc(), just uses text replacement

*/
function inc2( string $view, $args = null ) : string  /*@*/
{
  if( ! is_file($view) )  return '';

  $s = file_get_contents($view);

  foreach($args as $name => $arg)
    $s = str_replace("{$name}", $arg, $s);

  $s .= "\n";

  return $s;
}


/*@

DEPR

Variant of inc() -> output buffer
$view would incb() subview

*/
function incb( string $INC_VIEW, $args = null ) : string  /*@*/
{
  if( ! is_file($INC_VIEW) )  return '';

  require($INC_VIEW);
  print "\n";
}

?>