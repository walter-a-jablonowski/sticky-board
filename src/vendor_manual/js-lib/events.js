/*@ 

 Sources

 - http://youmightnotneedjquery.com/#ready
 - http://stackoverflow.com/questions/9899372/pure-javascript-equivalent-to-jquerys-ready-how-to-call-a-function-when-the
 - https://www.sitepoint.com/jquery-document-ready-plain-javascript
 - or just use code from jquery

@*/


/*@

```javascript
ready( function() { ... } )
```

DEV-COMMENTS:

  - see kb for more alternatives
  - youmightnotneedjquery.com version

*/
function ready( fn ) /*@*/
{
  if( document.readyState !== 'loading' )  // completed = fully loaded, see https://www.w3schools.com/jsref/prop_doc_readystate.asp
    fn();
  else
    document.addEventListener('DOMContentLoaded', fn);
  	// window.addEventListener( 'load', fn );
}


/*@

ˋˋˋjavascript
query('#myId').event('click', (event) => ...)  // see https://developer.mozilla.org/en-US/docs/Web/API/EventTarget/addEventListener
ˋˋˋ

TASKS:

  - debug me
  - maybe limit for buttons ~HTMLButtonElement and similar

*/
HTMLElement.prototype.event = function( type, fn ) /*@*/
{
  this.addEventListener(type, fn);
}
