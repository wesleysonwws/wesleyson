<?php

use Illuminate\Support\Facades\Route;
#Controllers
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\LancamentoController;
use App\Http\Controllers\CategoriaController;

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
    return redirect()->route('dashboard');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
| Wesleyson - 03-10-2022
*/
Route::prefix('dashboard')
    ->middleware(['auth'])
    ->group( function(){
        Route::get('/', function () { 
            return view('dashboard');
        })->name('dashboard');

});

/*
|--------------------------------------------------------------------------
| TIPOS
|--------------------------------------------------------------------------
| Wesleyson - 03-10-2022
*/
//Metodo Prefixo Facilitar Rotas, Middleware(Definir Tipos de Acesso), Quando uso o prefixo, utilizar GROUP de rotas
Route::prefix('categoria')->middleware(['auth'])->controller(CategoriaController::class)
->group(function ()
{
    Route::get('/', 'index')->                name('categoria.index');
    Route::get('/novo', 'create')->           name('categoria.create');
    Route::get('/editar/{id}', 'edit')->      name('categoria.edit');
    Route::get('/mostrar/{id}', 'show')->     name('categoria.show');
    Route::post('/cadastrar', 'store')->      name ('categoria.store');
    Route::post('/atualizar/{id}', 'update')->name ('categoria.update');
    Route::post('/deletar/{id}', 'destroy')-> name ('categoria.delete');
});
/*
|--------------------------------------------------------------------------
| Pagamento
|--------------------------------------------------------------------------
| Wesleyson - 03-10-2022
*/
Route::prefix('pagamento')->middleware(['auth'])->controller(PagamentoController::class)
->group(function ()
{
    Route::get('/', 'index')->                name('pagamento.index');
    Route::get('/novo', 'create')->           name('pagamento.create');
    Route::get('/editar/{id}', 'edit')->      name('pagamento.edit');
    Route::get('/mostrar/{id}', 'show')->     name('pagamento.show');
    Route::post('/cadastrar', 'store')->      name ('pagamento.store');
    Route::post('/atualizar/{id}', 'update')->name ('pagamento.update');
    Route::post('/deletar/{id}', 'destroy')-> name ('pagamento.delete');
});
/*
|--------------------------------------------------------------------------
| Periodo
|--------------------------------------------------------------------------
| Wesleyson - 03-10-2022
*/
Route::prefix('Periodo')->middleware(['auth'])->controller(PeriodoController::class)
->group(function ()
{
    Route::get('/', 'index')->                name('Periodo.index');
    Route::get('/novo', 'create')->           name('Periodo.create');
    Route::get('/editar/{id}', 'edit')->      name('Periodo.edit');
    Route::get('/mostrar/{id}', 'show')->     name('Periodo.show');
    Route::post('/cadastrar', 'store')->      name ('Periodo.store');
    Route::post('/atualizar/{id}', 'update')->name ('Periodo.update');
    Route::post('/deletar/{id}', 'destroy')-> name ('Periodo.destroy');
});
/*
|--------------------------------------------------------------------------
| RELATORIOS
|--------------------------------------------------------------------------
| Wesleyson - 03-10-2022
*/



require __DIR__.'/auth.php';
