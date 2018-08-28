<?php

Route::group(['prefix' => '/v1'], function () {
// ทำเวอร์ชั่นอื่นๆ 
});
Route::resource('editpass', 'Api\EditpassController');
Route::resource('Passexam', 'Api\PassexamController');
Route::get('masterschool', 'Api\PassexamController@masterschool');
