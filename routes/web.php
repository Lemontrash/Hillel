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

Auth::routes();                                                 //Создалить аусом

//новые

Route::get('/signIn', function () {
    return view('signIn');
})->name('signIn');

Route::get('/SignUp', function () {
    return view('SignUp');
})->name('signUp');

Route::get('/ContactUs', function () {
    return view('ContactUs');
})->name('ContactUs');

Route::get('/Post', function () {
    return view('SinglePost');
})->name('single');

Route::get('/Admin', function () {
    return view('admin.home');
})->name('admin');

Route::get('/', 'PostController@show' )->name('home');

Route::get('post/{id}', 'PostController@showOne')->name('singlePost');

Route::get('post/{id}/createComment', 'CommentController@create')->name('addComment');

Route::get('post/{id}/like', 'PostLikesController@store')->name('addLikeToPost');

Route::get('comment/{id}/like', 'CommentLikesController@store')->name('addLikeToPost');

Route::get('user/{id}', 'UserConrtoller@show')->name('showUser');

Route::post('/createPost', 'PostController@userCreatePost')->name('userCreatePostToDb');

Route::get('/createPost', 'PostController@showFormForNewPost')->name('userCreatePost');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::post('messages', 'MessageController@store')->name('message');

Route::post('signUp', 'SignUpController@store')->name('SignUp');

Route::post('/changePersonalInformation', 'UserConrtoller@editPersonalInfo')->name('changePersonalInformationToDb');
Route::get('/changePersonalInformation', 'UserConrtoller@showPersonalInfoPage')->name('changePersonalInformation');

Route::post('/deletePost', 'UserConrtoller@deletePost')->name('showDeletePostToDb');
Route::get('/deletePost', 'UserConrtoller@showDeletePost')->name('showDeletePost');

Route::post('/deleteComment', 'UserConrtoller@deleteComment')->name('showDeleteCommentToDb');
Route::get('/deleteComment', 'UserConrtoller@showDeleteComment')->name('showDeleteComment');

Route::post('/changePost', 'UserConrtoller@changePost')->name('showChangePostToDb');
Route::get('/changePost', 'UserConrtoller@showChangePost')->name('showChangePost');

Route::post('/changeComment', 'UserConrtoller@changeComment')->name('showChangeCommentToDb');
Route::get('/changeComment', 'UserConrtoller@showChangeComment')->name('showChangeComment');

Route::get('/allPosts', 'UserConrtoller@showAllPosts')->name('allPosts');

Route::post('searchResults', 'SearchController@findPostByTitle')->name('search');


//admin

//Route::get('/admin/changePost', function () { - вроде это то что я давным давно сломал
//    return view('newPost');
//})->name('userCreatePost');

Route::get('/admin', 'AdminController@show')->name('admin');

Route::get('/admin/changePost', 'AdminController@showChangePost')->name('changePost');
Route::get('/admin/deletePost', 'AdminController@showDeletePost')->name('deletePost');
Route::get('/admin/changeComment', 'AdminController@showChangeComment')->name('changeComment');
Route::get('/admin/deleteComment', 'AdminController@showDeleteComment')->name('deleteComment');

Route::post('/admin/changePost', 'AdminController@ChangePost')->name('changePostToDb');
Route::post('/admin/deletePost', 'AdminController@DeletePost')->name('deletePostToDb');
Route::post('/admin/changeComment', 'AdminController@ChangeComment')->name('changeCommentToDb');
Route::post('/admin/deleteComment', 'AdminController@DeleteComment')->name('deleteCommentToDb');



