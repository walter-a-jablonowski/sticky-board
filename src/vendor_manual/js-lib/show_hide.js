// TASK: (advanced) add fadeOut() fadeIn()

/*@

TASKS:

  - debug me

*/
HTMLElement.prototype.show = function() /*@*/
{
  this.style.display = 'block';
}


/*@

*/
HTMLElement.prototype.showInline = function() /*@*/
{
  this.style.display = 'inline-block';
}


/*@

*/
HTMLElement.prototype.hide = function() /*@*/
{
  this.style.display = 'none';
}
