<?php

use App\Http\Controllers\AdmController;
use App\Http\Controllers\AjudaController;
use App\Http\Controllers\CaixaEntradaController;
use App\Http\Controllers\CategoriaAjudaController;
use App\Http\Controllers\FaturamentoController;
use App\Http\Controllers\FormularioPassageiroControler;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinhasController;
use App\Http\Controllers\LoginController;
use App\Mail\RespostaSuporteMail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassageiroController;
use App\Http\Controllers\PedidoBilheteController;
use App\Http\Controllers\PrecoController;
use App\Http\Controllers\ReajusteController;
use App\Models\Passageiro;
use App\Models\PedidoBilhete;
use Illuminate\Support\Facades\Mail;

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
 

Route::group(['middleware' => 'adm'], function(){
Route::put('/carros/status/update', [LinhasController::class, 'updateStatusCarro'])->name('carros.status.update'); 
Route::post('/linhas/store',[LinhasController::class, 'store'])->name('linhas.store');
Route::post('/linhas/{idLinha}/carros/store', [LinhasController::class, 'storeCarro'])->name('carros.store');
Route::put('/linhas/{id}/status/update', [LinhasController::class, 'updateStatus'])->name('linhas.status.update');

Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/passageiros',[PassageiroController::class, 'passageiroIndex'])->name('passageiros.index');
Route::get('/passageiros/form', [PassageiroController::class, 'form'])->name('passageiros.form');
Route::get('/linhas',[LinhasController::class, 'index'])->name('linhas.index');
Route::get('/linhas/register',[LinhasController::class, 'register'])->name('linhas.register');
Route::get('/linhas/results', [LinhasController::class, 'search'])->name('linhas.search');
Route::get('/caixaEntrada',[CaixaEntradaController::class, 'caixaIndex'])->name('caixaEntrada.index');
Route::get('/caixaEntrada/{id}/show', [CaixaEntradaController::class, 'show'])->name('caixaEntrada.show');
Route::get('/caixaEntrada/results', [CaixaEntradaController::class, 'search'])->name('caixaEntrada.search');


// Route::get('/preco', [PrecoController::class, 'edit'])->name('preco.index');
// Route::put('/preco/{id}/update', [PrecoController::class, 'update'])->name('preco.update');
Route::post('/preco/create', [PrecoController::class, 'store'])->name('preco.store');
// Route::post('/reajuste', [ReajusteController::class, 'store'])->name('reajuste.store');
Route::get('/faturamento', [FaturamentoController::class, 'index'])->name('faturamento.index');
Route::get('/passageirosP/{id}/',[PassageiroController::class, 'perfilPassageiro'])->name('perfilPassageiro.index');
Route::get('/linhas/{id}/show', [LinhasController::class, 'show'])->name('linhas.show');
Route::post('/passageiros/store', [PassageiroController::class, 'store'])->name('passageiro.store');
Route::put('/linhas/{id}/update', [LinhasController::class, 'update'])->name('linhas.update');
Route::get('passageiros/AddBilhete/{id}', [PassageiroController::class, 'addBilhete'])->name('passageiros.addBilhete');
Route::post('passageiros/{id}/bilhetes/store', [PassageiroController::class, 'bilheteStore'])->name('passageiros.bilhetes.store');
Route::get('/passageiros/results', [PassageiroController::class, 'search'])->name('passageiro.search');
// Route::get('/email', function(){
//     Mail::to('carvalhohugo425@gmail.com')
//     ->send(new RespostaSuporteMail());
// });
Route::post('/caixaEntrada/{id}/{idSuporte}/email', [CaixaEntradaController::class, 'sendMail'])->name('caixaEntrada.mail');
Route::post('passageiros/bilhetes/passagens/store', [PassageiroController::class, 'storePassagens'])->name('passageiro.passagens.store');
Route::put('passageiros/bilhetes/passagens/update', [PassageiroController::class, 'updatePassagens'])->name('passageiro.passagens.update');
Route::put('/caixaEntrada/{id}/update', [CaixaEntradaController::class, 'update'])->name('caixaEntrada.suporte.update');
Route::get('/adm',[AdmController::class,	'index'])->name('adm.index');
Route::get('/adm/form',[AdmController::class,	'form'])->name('adm.form');
Route::post('/adm/store', [AdmController::class, 'store'])->name('adm.store');
Route::get('/adm/perfil', [AdmController::class, 'perfil'])->name('adm.perfil');
Route::get('adm/{id}/edit', [AdmController::class, 'edit'])->name('adm.edit');
Route::delete('adm/{id}/destroy', [AdmController::class, 'destroy'])->name('adm.destroy');
Route::put('adm/{id}/update', [AdmController::class, 'update'])->name('adm.update');
Route::get('/adm/results', [AdmController::class, 'search'])->name('adm.search');
Route::post('/logout', [AdmController::class, 'logout'])->name('adm.logout');
Route::get('/ajuda', [AjudaController::class, 'index'])->name('ajuda.index');
Route::get('/ajuda/form', [AjudaController::class, 'form'])->name('ajuda.form');
Route::post('/ajuda/store', [AjudaController::class, 'store'])->name('ajuda.store');
Route::get('/categoria', [CategoriaAjudaController::class, 'index'])->name('categoriaAjuda.index');
Route::get('/ajuda/{id}/show', [AjudaController::class, 'show'])->name('ajuda.show');
Route::get('ajuda/{id}/edit', [AjudaController::class, 'edit'])->name('ajuda.edit');
Route::get('ajuda/{id}/update', [AjudaController::class, 'update'])->name('ajuda.update');
Route::put('/ajuda/{id}/status/update', [AjudaController::class, 'updateStatus'])->name('ajuda.status.update');
Route::post('/ajuda/status', [AjudaController::class, 'getStatus'])->name('ajuda.status.get');
Route::get('/pedidoBilhete',[PedidoBilheteController::class, 'index'])->name('pedidoBilhete.index');
Route::get('/pedidoBilhete/show', [PedidoBilheteController::class, 'show'])->name('pedidoBilhete.show');
Route::get('/pedidoBilhete/results', [PedidoBilheteController::class, 'search'])->name('pedidoBilhete.search');
Route::get('/faturamento/fluxo/{intervalo}', [FaturamentoController::class, 'fluxo'])->name('faturamento.fluxo');
Route::put('/pedidoBilhete/responder', [PedidoBilheteController::class, 'responder'])->name('pedidoBilhete.responder');
});
Route::get('/formulariopassageiro', [FormularioPassageiroControler::class, 'index'])->name('formulariopassageiro.index');

Route::post('/login', [AdmController::class, 'login'])->name('adm.login');


Route::get('/login',[LoginController::class, 'index'])->name('login.index');
