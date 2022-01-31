<?php

use App\Http\Livewire\EditCharacter;
use App\Http\Livewire\ListCharacters;
use App\Http\Livewire\ViewCharacter;
use Illuminate\Support\Facades\Route;

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

Route::get('', ListCharacters::class)->name('home');
Route::prefix('characters')->name('characters.')->group(function () {
    Route::get('show/{character}', ViewCharacter::class)->name('show');
    Route::get('edit/{character}', EditCharacter::class)->name('edit');
});
