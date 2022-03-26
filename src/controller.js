/*@-------------------------------------------------------
| Walter A. Jablonowski     walter-a-jablonowski.github.io
----------------------------------------------------------  
|
| Code
|
|
| Contents:  # (have fun)
|
|   - Constructor
|   - Events
|
-------------------------------------------------------@*/


class AppController {

  constructor()
  {
    
    this.fld = document.body.dataset.fld

    this.update      = this.update.bind(this)
    this.saveLayout  = this.saveLayout.bind(this)
    // this.saveContent = this.saveContent.bind(this)


    this.errorCallback = function() {

      alert('Error')  // TASK: COULD use inline message
    }


    // jQuery UI

    $('.widg').draggable({
      containment: 'parent',
      handle:      'span'
      // cancel:   'p.ui-widget-header'
    })
    
    // $('div, p').disableSelection()

    $('.widg').resizable()


    // Fade in
    // TASK: COULD use pure js (js-lib)

    $('body').fadeIn()
  }


  update()
  {
    this.saveLayout()
    location.reload()
  }
  

  // TASK: save on each move

  saveLayout()
  {
    let layout = {}

    query('#view .widg').forEach( function() {
    
      layout[this.dataset.name] = {
        top:    this.style.top,
        left:   this.style.left,
        width:  this.style.width,
        height: this.style.height
      }
    })

    // TASK: COULD use ajax()

    fetch('ajax/save_layout.php', {
      method: 'POST',
      body: JSON.stringify({
        fld:    this.fld,
        layout: layout
      })
    })
    // .then(response => response.json())
    // .then(response =>  )
    .catch(error => this.errorCalback(error) )
  }


  // TASK: link this func from each widg
/*
  saveContent()
  {
    fetch('view/.../ajax/save_content.php', {
      method: 'POST',
      body: JSON.stringify({
        fld:     this.fld,
        name:      // is data-id
        content:   // TASK
      })
    })
    .then(response => response.json())
    .then(response =>  {

      if( response['r'] == 'success')
      {
        $('.saved').fadeIn('fast').fadeOut('slow')
        $('.saved').fadeIn('fast').delay(1000).fadeOut('slow')
        // $('#' + uMessage).fadeIn('fast', function() { $(this).delay(1000).fadeOut('slow') })
      }
    })
    .catch(error => this.errorCalback(error) )
  }
*/
}

// $( function() {
ready( function() {
  var crl = new AppController()
})
