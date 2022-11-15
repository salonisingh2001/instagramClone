<?php
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\StoryController;
use App\Models\posts;




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
    return view('welcome');
});

Auth::routes();
Route::post('/follow/{user}', [App\Http\Controllers\followscontroller::class, 'store']);

Route::get('/',[App\Http\Controllers\PostsController::class, 'index'])->name('posts.index');
Route::get('/posts/create',[App\Http\Controllers\PostsController::class, 'create'])->name('posts.create');
Route::post('/posts',[App\Http\Controllers\PostsController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}',[App\Http\Controllers\PostsController::class, 'show'])->name('posts.show');
Route::delete('/delete/posts/{id}',[App\Http\Controllers\PostsController::class, 'delete'])->name('posts.delete');
Route::get('/explore',[App\Http\Controllers\PostsController::class,'explore'])->name('posts.explore');

Route::post('like/{like}', [App\Http\Controllers\LikeController::class,'update2'])->name('like.create');
Route::post('comments', [App\Http\Controllers\CommentsController::class ,'store']);


Route::any('/search', [App\Http\Controllers\ProfilesController::class, 'search'])->name('profile.search');
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');

Route::get('chat', [App\Http\Controllers\ChatController::class, 'chat'])->name('chat');
Route::get('messages', [App\Http\Controllers\ChatController::class, 'messages'])->name('messages');
Route::post('messages', [App\Http\Controllers\ChatController::class, 'messageStore'])->name('messageStore');

Route::get('/stories/create', [App\Http\Controllers\StoryController::class, 'create'])->name('story.create');
Route::get('/stories/{user}', [App\Http\Controllers\StoryController::class, 'show'])->name('story.show');
Route::post('/stories', [App\Http\Controllers\StoryController::class, 'store'])->name('story.store');
   