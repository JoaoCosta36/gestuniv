<?php
Route::get('ajax',function() {
   return view('message');
});
Route::post('/getmsg','AjaxController@index');
?>