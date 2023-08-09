<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController as Story;
use App\Http\Controllers\TagController as Tag;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [Story::class, 'index'])->name('dashboard');

// middleware(['auth', 'verified'])->

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// STORIES

Route::prefix('stories')->name('stories-')->group(function () {

    Route::get('/', [Story::class, 'index'])->name('index');

    Route::get('/create',[Story::class, 'create'])->name('create');
    Route::post('/create', [Story::class, 'store'])->name('store');

    Route::get('/edit/{story}&{page}' ,[Story::class, 'edit'])->name('edit');
    Route::put('/{story}', [Story::class, 'update'])->name('update');

    // Route::get('/delete/{client}' ,[Story::class, 'delete'])->name('delete');
    // Route::delete('/{client}', [Story::class, 'destroy'])->name('destroy');

});

//TAGS
Route::prefix('tags')->name('tags-')->group(function () {

    Route::get('/{story}', [Tag::class, 'list'])->name('list');
    Route::get('/story-tags/{story}', [Tag::class, 'storyList'])->name('addlist');

    Route::post('/story-tags/{story}', [Tag::class, 'storyAddTag'])->name('addTag');
    Route::post('/storyRemoveTag/{story}&{tag}', [Tag::class, 'storyRemoveTag'])->name('removeTag');

    // Route::get('/{story}', [Tags::class, 'list'])->name('list');

    // Route::get('/create',[Stories::class, 'create'])->name('create');
    // Route::post('/create', [Stories::class, 'store'])->name('store');

    // Route::get('/edit/{client}&{page}' ,[Stories::class, 'edit'])->name('edit');
    // Route::put('/{client}&{page}', [Stories::class, 'update'])->name('update');

    // Route::get('/delete/{client}' ,[Stories::class, 'delete'])->name('delete');
    // Route::delete('/{client}', [Stories::class, 'destroy'])->name('destroy');

});


require __DIR__.'/auth.php';
