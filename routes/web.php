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

/*Route::get('/', function () {
    return view('welcome',['website'=>'pine']);
});*/
Route::get('/hello', function () {
    return 'hello，pine！';
});

Route::match(['get', 'post'], 'foo', function () {
    return 'This is a request from get or post';
});

Route::any('bar', function () {
    return 'This is a request from any HTTP verb';
});

Route::view('/', 'welcome',['website'=>'pine']);

/*Route::get('user/{id}', function ($id) {
    return 'User ' . $id;
});*/


Route::get('posts/{id}/comments/{comment}', function ($postId, $commentId) {
    return $postId . '-' . $commentId;
});

/*Route::get('user/profile', function () {
    // 通过路由名称生成 URL
    return 'my url: ' . route('profile');
})->name('profile');*/

/*Route::get('user/profile', 'UserController@showProfile')->name('profile');

Route::get('redirect', function() {
    // 通过路由名称进行重定向
    return redirect()->route('profile');
});*/

Route::get('user/{id}/profile', function ($id) {
    $url = route('profile', ['id' => $id]);
    return $url;
})->name('profile');

Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        // Matches The "/admin/users" URL
        return 'User admin';
    });
});
Route::get('users/{user}', function (App\User $user) {
    return $user;
});
