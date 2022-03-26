
/*@

TASKS:

  - callbacks if set only

*/
function ajax(call, args, succcessCallback, errorCallback) /*@*/
{
  fetch(call, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(args)
  })
  .then(response => response.json())
  .then(response => successCallback(response))
  .catch((error) => errorCallback(response))
}
