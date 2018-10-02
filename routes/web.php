<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $data = [
        'banners' => [
            [
                'tag' => 'World',
                'tag-color' => 'primary',
                'thumbnail' => 'holder.js/200x250?theme=thumb',
                'title' => 'Featured post',
                'date' => 'Nov 12',
                'text' => 'This is a wider card with supporting text below as a natural lead-in to additional content.'
            ],
            [
                'tag' => 'Design',
                'tag-color' => 'success',
                'thumbnail' => 'holder.js/200x250?theme=thumb',
                'title' => 'Post title',
                'date' => 'Nov 11',
                'text' => 'This is a wider card with supporting text below as a natural lead-in to additional content.'
            ]
        ]
    ];
    return view('home.home', $data);
});

Route::get('/post{id?}', function ($id=null) {

    return view('posts.post');
})->where(['id'=>'[0-9]+']);

Route::resource('/projects', 'ProjectsController');