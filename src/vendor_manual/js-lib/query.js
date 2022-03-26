/*@

is query all

RETURNS:
  single if id

*/
function query( sel ) /*@*/
{
  if( sel.charAt(0) == '#')
    return document.querySelector( sel );
  else
    return document.querySelectorAll( sel );
}


/*@

*/
function queryOne( sel ) /*@*/
{
  return document.querySelector( sel );
}


/*@

old, use query

ˋˋˋ
var byId = function( id ) { return document.getElementById( id ); };
ˋˋˋ

*/
function byId( id ) /*@*/
{
  while( id.charAt(0) == '#')  // # is optional
    id = id.substring(1);

  return document.getElementById( id );
}
