<?php

require 'config.php';
require 'vendor_manual/inc.php';

// TASK: COULD upgrade 2 a simple PHP controller

$fld = ! empty($_GET['fld']) ? BASE_DIR . '/' . trim($_GET['fld'], "/ ") : BASE_DIR;

// var_dump($fld);
// exit();

if( ! is_dir($fld) )
  exit("URL arg 'fld' missing or given folder is no dir");

$cache = file_exists("$fld/.free-view.json")
       ? json_decode( file_get_contents("$fld/.free-view.json"), true)
       : null;

$entities = [];
$files = scandir($fld);

foreach( $files as $file )
{
  $entity = [];
  $ext = pathinfo("$fld/$file")['extension'] ?? null;

  if( is_dir("$fld/$file") & ! in_array($file, ['.', '..']))
   $entity['type'] = 'folder';
 
  elseif( is_file("$fld/$file") && $ext === 'md')
   $entity['type'] = 'text';

  elseif( is_file("$fld/$file") && in_array($ext, ['png', 'jpg', 'jpeg']))
   $entity['type'] = 'image';

  if( $entity )
  {
    $entities[] = array_merge( $entity, [

      'name' => basename($file, ".$ext"),
      'file' => $file,
      'full' => "$fld/$file"
    ]);
  }
}

// var_dump( $headline );
// exit();

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>View</title>

  <!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
  <!-- fontawesome 4 -->

  <!-- fontawesome 6 -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
  <!-- free icons: https://fontawesome.com/v6/search?m=free -->

  <link rel="stylesheet" href="styles/app.css">
  <link rel="stylesheet" href="styles/widg.css">

  <?php
    
    foreach($entities as $entity)
    {
      if( is_file("view/$entity[type]/styles.css"))
        print "<link rel=\"stylesheet\" href=\"view/$entity[type]/styles.css\">";
    }
  
  ?>

</head>
<body style="display: none;" data-fld="<?= $fld ?>">


<!-- Nav -->

<nav class="navbar navbar-light bg-light py-0">
  <a class="navbar-brand" href="#"><b>View</b> <?= basename($fld) ?></a>
  <form class="form-inline">
    <button class="btn btn-sm btn-secondary my-2 my-sm-0 mr-2" type="button">Tools here</button>
<!--
    <button onclick="crl.update()" class="btn btn-sm btn-secondary my-2 my-sm-0 mr-2" type="button">Update</button>
    <button onclick="crl.saveLayout()" class="btn btn-sm btn-secondary my-2 my-sm-0 mr-2" type="button">Save</button>
-->
  </form>
</nav>


<!-- Content -->

<div class="container-fluid h-100">
  <div class="row justify-content-center h-100">

    <!-- Area full width -->
    <div id="view" class="col-md-12 h-100">

      <!-- Widg -->

      <?php

        $i = 1;
      
        foreach($entities as $entity)
        {
          $content = inc("view/$entity[type]/view.php", $entity);
          
          print inc('widg.php', [
            'type'    => $entity['type'],
            'name'    => $entity['name'],
            'file'    => $entity['file'],
            'content' => $content,
            'x'       => ! $cache || ! isset( $cache[ $entity['file'] ])  ?  11 + $i * 100  :  $cache[ $entity['file'] ]['x'],
            'y'       => ! $cache || ! isset( $cache[ $entity['file'] ])  ?  11             :  $cache[ $entity['file'] ]['y'],
            'width'   => ! $cache || ! isset( $cache[ $entity['file'] ])  ?  100            :  $cache[ $entity['file'] ]['width'],
            'height'  => ! $cache || ! isset( $cache[ $entity['file'] ])  ?  100            :  $cache[ $entity['file'] ]['height']
          ]);

          if( ! $cache || ! isset( $cache[ $entity['file'] ]))
            $i++;
        }
      
      ?>

    </div>

  </div>
</div>


<!-- Footer -->

<footer class="footer">
  <div class="container text-muted small">
    powered by &copy; <a href="http://walter-a-jablonowski.github.io" target="_blank">Walter A. Jablonowski</a> 2020-2022
    &nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="https://pngtree.com/free-backgrounds">free background photos from pngtree.com</a>
  </div>
</footer>


<!-- jquery ui (sample https://jqueryui.com/draggable/#handle) -->

<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-1.13.1.js"></script> -->
<!-- <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- TASK; SHOULD figure out how we can use some simple native js import -->
<script src="vendor_manual/js-lib/events.js"></script>
<script src="vendor_manual/js-lib/query.js"></script>
<script src="vendor_manual/js-lib/ajax.js"></script>
<script src="vendor_manual/js-lib/show_hide.js"></script>
<script src="controller.js"></script>

</body>
</html>
