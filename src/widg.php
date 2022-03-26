<?php

extract($args);

?><div class="widg ui-widget-content" data-tyoe="<?= $type ?>" data-id="<?= $file ?>" style="position: replative; top: <?= $args['y'] ?>px; left: <?= $args['x'] ?>px; width: <?= $args['width'] ?>px; height: <?= $args['height'] ?>px;">
  <div class="container px-1">
          
    <div class="row">
        
      <div class="col-7">
        <span class="ui-widget-header"><?= $name ?></span>  <!-- float-left -->
        <!-- <input type="text" placeholder="Headline"> -->
      </div>
      <div class="col text-right">

        <div class="color-picker dropdown d-inline-block ml-2">

          <!-- TASK: picker -->

          <a href="#" class="dropdown-toggle small" role="button" id="dropdownMenuButton" data-toggle="dropdown">Color</a>
          <div class="dropdown-menu" style="background-color: #000;">
            <a class="dropdown-item" href="#" style="background-color: #ffa351;">&nbsp;</a>
            <a class="dropdown-item" href="#" style="background-color: #eee657;">&nbsp;</a>
            <a class="dropdown-item" href="#" style="background-color: #81de76;">&nbsp;</a>
            <a class="dropdown-item" href="#" style="background-color: #fc6042;">&nbsp;</a>
            <a class="dropdown-item" href="#" style="background-color: #ddd;">&nbsp;</a>
          </div>

        </div>
              
        <div class="d-inline-block">&nbsp;</div>

        <button class="del-item-btn btn btn-sm mr-1 pb-1 d-inline-block" type="button">x</button>  <!-- float-right -->

      </div>
    </div>

    <div class="row">
      <div class="content col-12">
            
        <?= $content ?>

     </div>
    </div>

  </div>      
</div>
