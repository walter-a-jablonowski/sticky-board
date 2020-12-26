<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Board</title>

  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <link rel="stylesheet" href="public/styles/app.css">
  <link rel="stylesheet" href="public/styles/board.css">

  <!-- Head JS -->

  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  <!-- jquery ui (sample https://jqueryui.com/draggable/#handle) -->
  <!-- sample was <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body style="display: none;">


<!-- Nav -->

<nav class="navbar navbar-light bg-light py-0">
  <a class="navbar-brand" href="#">Board</a>
  <form class="form-inline">
    <button id="saveBoardBtn" class="btn btn-sm btn-secondary my-2 my-sm-0 mr-2" type="button">Save layout</button>
  </form>
</nav>


<!-- Content -->

<div class="container-fluid h-100">
  <div class="row justify-content-center h-100">

    <!-- Area full width -->

    <div id="board" class="col-md-12 h-100">

      <!-- Board item -->

      <div class="board-item ui-widget-content">
        <div class="container h-100 px-1">
          
          <div class="row">
        
            <div class="col-7">
              <span class="ui-widget-header">Text</span>  <!-- float-left -->
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
          
          <div class="row h-100">
            <div class="col-12 h-100">
              <textarea placeholder="Details"></textarea>
            </div>
          </div>

        </div>      
      </div>

    </div>

  </div>
</div>


<!-- Footer -->

<footer class="footer">
  <div class="container">
    <span class="text-muted small">powered by &copy; <a href="http://walter-a-jablonowski.github.io" target="_blank" class="text-info">Walter A. Jablonowski</a> 2020</span>
  </div>
</footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="public/js/board.js"></script>

<script>
  $(function() {

    $('body').fadeIn();

  });
</script>

</body>
</html>
