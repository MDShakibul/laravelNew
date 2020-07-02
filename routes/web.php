<?php

use Illuminate\Support\Facades\Route;

Route::get('/','HelloController@Index');
Route::get('/about','HelloController@About')->name('about');
Route::get('/contact','HelloController@Contact')->name('contact');

//category
Route::get('all/category','BolloController@AllCategory')->name('all.category');
Route::get('add/category','BolloController@AddCategory')->name('add.category');
Route::post('store/category','BolloController@StoreCategory')->name('store.category');
Route::get('view/category/{id}','BolloController@ViewCategory');
Route::get('delete/category/{id}','BolloController@DeleteCategory');
Route::get('edit/category/{id}','BolloController@EditCategory');
Route::post('update/category/{id}','BolloController@UpdateCategory');

//Post
Route::get('write/post','PostController@WritePost')->name('write.post');
Route::post('store/post','PostController@StorePost')->name('store/post');
Route::get('all/post','PostController@AllPost')->name('all.post');
Route::get('view/post/{id}','PostController@ViewPost');
Route::get('delete/post/{id}','PostController@DeletePost');
Route::get('edit/post/{id}','PostController@EditPost');
Route::post('update/post/{id}','PostController@UpdatePost');

//Student
//Route::get('students','StudentController@Student')->name('student');
//Route::post('store/students','StudentController@Store')->name('store/studet');
//Route::get('all/students','StudentController@index')->name('all.student');
//Route::get('view/student/{id}','StudentController@show');
//Route::get('delete/student/{id}','StudentController@destroy');
//Route::get('edit/student/{id}','StudentController@edit');
//Route::post('update/student/{id}','StudentController@Update');
Route::resource('student','StudentController');




