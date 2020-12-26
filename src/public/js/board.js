/*@-------------------------------------------------------
| Walter A. Jablonowski     walter-a-jablonowski.github.io
----------------------------------------------------------  
|
| Code
|
|
| Contents:  # (have fun)
|
|   - Init
|   - New
|   - Del
|   - Right menu
|   - Save
|
-------------------------------------------------------@*/


/*@-------------------------------------------------------
| Init
-------------------------------------------------------@*/

$( function() {

  $('.board-item').draggable({
    containment: "parent",
    handle: "span"
    // cancel: "p.ui-widget-header"
  });
    
  // $( "div, p" ).disableSelection();

  $('.board-item').resizable();

});


/*@-------------------------------------------------------
| Save
-------------------------------------------------------@*/

$( function() {

  $('#saveBoardBtn').click( function() {
    
    console.log( saveBoard() );

  });
});

function saveBoard() {

  var r = [];

  $('#board .board-item').each( function() {
    
    r[r.length] = {
      top:     $(this).css('top'),
      left:    $(this).css('left'),
      content: $(this).find('textarea').val()
    };
  });

  $.post( 'viewer/board/ajax/save.php',
    {
      name: '<?= $fil ?>',
      data: $('#edit').val()
    },

    function ( data ) {

      if( data['r'] == 'success')
      {
        $('.saved').fadeIn('fast').fadeOut('slow');
        $('.saved').fadeIn('fast').delay(1000).fadeOut('slow');
        // $('#' + uMessage).fadeIn("fast", function() { $(this).delay(1000).fadeOut("slow"); });
      }
    }
  );

  return r;
}
