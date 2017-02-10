<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/', function () {
    return redirect('/posts');
});

Route::auth();



Route::resource('posts', 'PostsController');

//// usage inside a laravel route
//Route::get('/', function()
//{
//
//    $img = Image::make(file_get_contents('https://pp.vk.me/c604730/v604730116/f72a/-rWxAJUHeM4.jpg'));
//
//
//    $file = 'faker.jpg';
//    $path = public_path() .'/images/';
//
//
//
//    $img->resize(null, 300, function ($constraint)
//    {$constraint->aspectRatio();})
//        ->save($path.$file)
//        ->save($path.'thumbnail-'.$file);
//
//
//    return $img->response('jpg');
//});


Route::get('/home', 'PostsController@index');
