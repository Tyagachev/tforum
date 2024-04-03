<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

/**
 * Routing
 */
Auth::routes();
//Auth::routes(['verify' => true]);
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');

/**
 * Welcome
 */
Route::namespace(RouteServiceProvider::NAMESPACE . 'Welcome')->group(function() {
    Route::get('/','IndexController')->name('welcome');
});
Route::get('/f', function () {
    $comment = \App\Models\User::query()->where();
    dd($comment->likes->count());
});

/**
 * Home
 */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Avatar
 */
Route::namespace(RouteServiceProvider::NAMESPACE . 'Avatar')->group(function() {
    Route::middleware(['middleware' => 'auth'])->group(function () {
        Route::post('/avatar/store','StoreController')->name('avatar.store');
        Route::delete('avatar/delete', 'DestroyController')->name('delete.avatar');
    });
});

/**
 * Raiting
 */
Route::namespace(RouteServiceProvider::NAMESPACE . 'Raiting')->group(function() {
    Route::get('/raiting/posts/user/{user}','ShowController')->name('raiting.posts');
});

/**
 * Profile
 */
Route::namespace(RouteServiceProvider::NAMESPACE . 'Profile')->group(function() {
    Route::get('/profile/{user}','IndexController')->name('profile.index');
    Route::delete('/profile/user/delete', 'DestroyController')
        ->name('profile.user.delete')->middleware('auth');
});

/**
 * News
 */
Route::namespace(RouteServiceProvider::NAMESPACE . 'News')->group(function() {
    Route::get('/news', 'IndexController')->name('index.news');
    Route::get('/news/show/{news}', 'ShowController')->name('show.news');
        Route::middleware(['middleware' => 'admin'])->group(function() {
            Route::get('/news/create', 'CreateController')->name('create.news');
            Route::get('/news/edit/{news}', 'EditController')->name('edit.news');
            Route::patch('/news/update', 'UpdateController')->name('update.news');
            Route::delete('/news/delete', 'DestroyController')->name('delete.news');
            Route::post('/news/store', 'StoreController')->name('store.news');
        });
});

/**
 * Theme
 */
Route::namespace(RouteServiceProvider::NAMESPACE . 'Theme')->group(function () {
    Route::get('/theme/show/{theme}', 'ShowController')->name('show.theme');
    Route::middleware(['middleware' => 'admin'])->group(function () {
        Route::get('/theme/create', 'CreateController')->name('create.theme');
        Route::post('/theme/store', 'StoreController')->name('store.theme');
        Route::get('/theme/edit/{theme}', 'EditController')->name('edit.theme');
        Route::patch('/theme/update', 'UpdateController')->name('update.theme');
        Route::delete('/theme/delete', 'DestroyController')->name('delete.theme');
    });
});

/**
 * Topic
 */
Route::namespace(RouteServiceProvider::NAMESPACE . 'Topic')->group(function () {
    Route::get('/topic/show/{topic}', 'ShowController')->name('show.topic');
    Route::get('/topic/search', 'TagSearchController')->name('topic.tag.search');
    Route::get('/topic/search/input', 'InputSearchController')->name('topic.search.input');
    Route::middleware(['middleware' => 'auth'])->group(function () {
        Route::get('/topic/create/{id}', 'CreateController')->name('create.topic');
        Route::get('/topic/edit/{topic}', 'EditController')->name('edit.topic');
        Route::patch('/topic/update', 'UpdateController')->name('update.topic');
        Route::delete('/topic/delete', 'DestroyController')->name('delete.topic');
        Route::post('/topic/store', 'StoreController')->name('store.topic');
    });
});

/**
 * Comments
 */
Route::namespace(RouteServiceProvider::NAMESPACE . 'Comment')->group(function () {
    Route::post('/comment/store', 'StoreController')->name('comment.store');
    Route::delete('/comment/delete', 'DestroyController')->name('comment.delete');
});

/**
 * Admin
 */
Route::middleware(['middleware' => 'admin'])->group(function () {
    Route::namespace(RouteServiceProvider::NAMESPACE . 'Admin')->group(function() {
        Route::get('/admin','IndexController')->name('admin.index');
    });
});

/**
 * Admin\UserList
 */
Route::middleware(['middleware' => 'admin'])->group(function () {
    Route::namespace(RouteServiceProvider::NAMESPACE . 'Admin\UserList')->group(function() {
        Route::prefix('admin')->group(function (){
            Route::get('/user-list','IndexController')->name('admin.user-list');
            Route::get('/user-list/search','SearchUserController')->name('admin.user-list.search');
            Route::get('/user-list/show/{user}','ShowController')->name('admin.user-list.show');
            Route::get('/user-list/create', 'CreateController')->name('admin.user-list.create');
            Route::post('/user-list/store', 'StoreController')->name('admin.user-list.store');
            Route::delete('/user-list/delete', 'DestroyController')->name('admin.user-list.delete');
        });
    });
});

/**
 * Admin\Tag
 */
Route::middleware(['middleware' => 'admin'])->group(function () {
    Route::namespace(RouteServiceProvider::NAMESPACE . 'Admin\Tag')->group(function() {
        Route::prefix('admin')->group(function (){
            Route::get('/tag','IndexController')->name('admin.tag.index');
            Route::post('/tag/store','StoreController')->name('admin.tag.store');
            Route::delete('/tag/delete','DestroyController')->name('admin.tag.delete');
        });
    });
});

/**
 * Admin\CommentList
 */
Route::middleware(['middleware' => 'admin'])->group(function () {
    Route::namespace(RouteServiceProvider::NAMESPACE . 'Admin\CommentList')->group(function() {
        Route::prefix('admin')->group(function (){
            Route::get('/comment-list','IndexController')->name('admin.comment-list.index');
            Route::get('/comment-list/show','ShowController')->name('admin.comment-list.show');
            Route::delete('/comment-list/delete','DestroyController')->name('admin.comment-list.delete');
        });
    });
});

/**
 * Admin\WordCheck
 */
Route::middleware(['middleware' => 'admin'])->group(function () {
    Route::namespace(RouteServiceProvider::NAMESPACE . 'Admin\WordCheck')->group(function() {
        Route::prefix('admin')->group(function (){
            Route::get('/word-check','IndexController')->name('admin.word-check.index');
            Route::post('/word-check/store','StoreController')->name('admin.word-check.store');
            Route::delete('/word-check/delete','DestroyController')->name('admin.word-check.delete');
        });
    });
});

/**
 * Admin\SiteRule
 */
Route::middleware(['middleware' => 'admin'])->group(function () {
    Route::namespace(RouteServiceProvider::NAMESPACE . 'Admin\SiteRule')->group(function() {
        Route::prefix('admin')->group(function (){
            Route::get('/rule','IndexController')->name('admin.rule.index');
            Route::post('/rule/store','CreateController')->name('admin.rule.store');
            Route::delete('/rule/delete','DestroyController')->name('admin.rule.delete');
        });
    });
});

Route::namespace(RouteServiceProvider::NAMESPACE . 'Admin\SiteRule')->group(function() {
        Route::get('/rule/show','ShowController')->name('admin.rule.show');
});

/**
 * Создание storage:link
 */
Route::get('/foo', function () {
    Artisan::call('storage:link');
    return redirect()->back();
});

