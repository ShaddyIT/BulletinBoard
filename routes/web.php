<?php

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
use App\Http\Controllers\PostController;
use App\Http\Controllers\BbsController;
use App\Http\Controllers\HomeController;

Auth::routes();
// Главная страница с лентой объявлений
Route::get('/', [BbsController::class, 'index'])->name('index'); 
// Страница аутенфикации
Route::get('/home', [HomeController::class, 'index'])->name('home'); 
// Роут вывода страницы для добавления объявления
Route::get('/home/add', [HomeController::class, 'showAddBbForm'])->name('bb.add');
// Для вывода странички с объявлением
Route::get('/{bb}', [BbsController::class, 'detail'])->name('detail');
// Роут на контроллер который выводит странциу с формой изменения объявления
Route::get('/home/{bb}/edit',[HomeController::class, 'showEditBbForm'])->name('bb.edit')->middleware('can:update,bb');
// Обновляет данные в таблице БД
Route::patch('/home/{bb}', [HomeController::class, 'updateBb'])->name('bb.update')->middleware('can:update,bb');
// Отправляет на контроллер который выводит страницу с удалением товара
Route::get('/home/{bb}/delete',[HomeController::class, 'showDeleteBbForm'])->name('bb.delete')->middleware('can:delete,bb');
// удаляет данные в таблице БД
Route::delete('/home/{bb}', [HomeController::class, 'destroyBb'])->name('bb.destroy')->middleware('can:delete,bb');
// Роут с методом post для добавления записи в БД
Route::post('/home', [HomeController::class, 'storeBb'])->name('bb.store');




