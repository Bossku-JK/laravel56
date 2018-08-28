<?php
// Route::get('/', function () { return redirect('/'); });
Route::resource('editpass', 'front\editpassController');
Route::resource('staff', 'MembersController');

Route::get('/', 'PagesController@getIndex')->name('home');
Route::get('show-case', 'PagesController@getShowCase');
Route::get('services', 'PagesController@getServices');
Route::get('contact', 'PagesController@getContact');

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');





Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('pages', 'PagesController');
    Route::resource('posts', 'PostsController');
    Route::resource('tags', 'Admin\TagsController');
    Route::resource('categories', 'Admin\CategoriesContoller');
    Route::post('posts_mass_destroy', ['uses' => 'PostsController@massDestroy', 'as' => 'posts.mass_destroy']);
    Route::get('/home', 'HomeController@index');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('users_gongtham', 'Admin\MemberController');
    Route::resource('passexam', 'PassexamController');
    Route::get('inbox', 'PassexamController@inbox');
});
