<?php

use App\Http\Middleware\isAdmin;
use App\Models\Models\JenisBarang;
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

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Routes Dashboard
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
        })->name('dashboard');
    /*
    |--------------------------------------------------------------------------
    | Routes Formula Utama
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/formula-utama', function () {
            return view('pages.formula_utama.index');
            })->name('formula-utama.index');

    /*
    |--------------------------------------------------------------------------
    | Routes Divisi
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/jenis-barang',[App\Http\Controllers\JenisBarang\JenisBarangController::class, 'index'])
        ->name('jenis_barang.index');

    Route::get('/jenis-barang-create', [App\Http\Controllers\JenisBarang\JenisBarangController::class, 'create'])
        ->name('jenis_barang.create');

    Route::post('/jenis-barang-store', [App\Http\Controllers\JenisBarang\JenisBarangController::class, 'store'])
            ->name('jenis_barang.store');

    /*
    |--------------------------------------------------------------------------
    | Routes Suplier
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/suplier',[App\Http\Controllers\Suplier\SuplierController::class, 'index'])->name('suplier.index');
    Route::get('/suplier-create',[App\Http\Controllers\Suplier\SuplierController::class, 'create'])->name('suplier.create');
    Route::post('/suplier-store',[App\Http\Controllers\Suplier\SuplierController::class, 'store'])->name('suplier.store');
    Route::get('/suplier-edit/{id}',[App\Http\Controllers\Suplier\SuplierController::class, 'edit'])->name('suplier.edit');
    Route::put('/suplier-edit/{id}',[App\Http\Controllers\Suplier\SuplierController::class, 'update'])->name('suplier.update');
    Route::patch('suplier/delete/{id}', [App\Http\Controllers\Suplier\SuplierController::class, 'delete'])->name('suplier.delete');
    Route::delete('suplier/delete/{id}',[App\Http\Controllers\Suplier\SuplierController::class, 'destroy'])->name('suplier.destroy');
    Route::post('suplier/restore/{id}',[App\Http\Controllers\Suplier\SuplierController::class, 'restore'])->name('suplier.restore');

    /*
    |--------------------------------------------------------------------------
    | Routes Master Produk
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/master-produk',[App\Http\Controllers\MasterProduk\MasterProdukController::class, 'index'])->name('master-produk.index');
    Route::get('/master-produk-create',[App\Http\Controllers\MasterProduk\MasterProdukController::class, 'create'])->name('master-produk.create');
    Route::post('/master-produk-store',[App\Http\Controllers\MasterProduk\MasterProdukController::class, 'store'])->name('master-produk.store');
    Route::get('/master-produk-edit/{id}',[App\Http\Controllers\MasterProduk\MasterProdukController::class, 'edit'])->name('master-produk.edit');
    Route::put('/master-produk-edit/{id}',[App\Http\Controllers\MasterProduk\MasterProdukController::class, 'update'])->name('master-produk.update');
    Route::patch('master-produk/delete/{id}', [App\Http\Controllers\MasterProduk\MasterProdukController::class, 'delete'])->name('master-produk.delete');
    Route::delete('master-produk/delete/{id}',[App\Http\Controllers\MasterProduk\MasterProdukController::class, 'destroy'])->name('master-produk.destroy');
    Route::post('master-produk/restore/{id}',[App\Http\Controllers\MasterProduk\MasterProdukController::class, 'restore'])->name('master-produk.restore');

     /*
    |--------------------------------------------------------------------------
    | Routes Ukuran
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/satuan-ukuran',[App\Http\Controllers\Ukuran\UkuranController::class, 'index'])->name('satuan-ukuran.index');
    Route::get('/satuan-ukuran-create',[App\Http\Controllers\Ukuran\UkuranController::class, 'create'])->name('satuan-ukuran.create');
    Route::post('/satuan-ukuran-store',[App\Http\Controllers\Ukuran\UkuranController::class, 'store'])->name('satuan-ukuran.store');
    Route::get('/satuan-ukuran-edit/{id}',[App\Http\Controllers\Ukuran\UkuranController::class, 'edit'])->name('satuan-ukuran.edit');
    Route::put('/satuan-ukuran-edit/{id}',[App\Http\Controllers\Ukuran\UkuranController::class, 'update'])->name('satuan-ukuran.update');
    Route::patch('satuan-ukuran/delete/{id}', [App\Http\Controllers\Ukuran\UkuranController::class, 'delete'])->name('satuan-ukuran.delete');
    Route::delete('satuan-ukuran/delete/{id}',[App\Http\Controllers\Ukuran\UkuranController::class, 'destroy'])->name('satuan-ukuran.destroy');
    Route::post('satuan-ukuran/restore/{id}',[App\Http\Controllers\Ukuran\UkuranController::class, 'restore'])->name('satuan-ukuran.restore');


    /*
    |--------------------------------------------------------------------------
    | Routes Barang
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/barang',[App\Http\Controllers\Barang\BarangController::class, 'index'])->name('barang.index');

    Route::get('/barang/data',[App\Http\Controllers\Barang\BarangController::class, 'data'])->name('barang.data');


    Route::get('/barang-create',[App\Http\Controllers\Barang\BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang-store',[App\Http\Controllers\Barang\BarangController::class, 'store'])->name('barang.store');
    Route::get('/barang-edit/{id}',[App\Http\Controllers\Barang\BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/barang-edit/{id}',[App\Http\Controllers\Barang\BarangController::class, 'update'])->name('barang.update');
    Route::patch('barang/delete/{id}', [App\Http\Controllers\Barang\BarangController::class, 'delete'])->name('barang.delete');
    Route::delete('barang/delete/{id}',[App\Http\Controllers\Barang\BarangController::class, 'destroy'])->name('barang.destroy');
    Route::post('barang/restore/{id}',[App\Http\Controllers\Barang\BarangController::class, 'restore'])->name('barang.restore');

    /*
    |--------------------------------------------------------------------------
    | Routes Divisi
    |--------------------------------------------------------------------------
    |
    */
    
    Route::get('/divisi',[App\Http\Controllers\Divisi\DivisiController::class, 'index'])->name('divisi.index');
    Route::post('/divisi-store', [App\Http\Controllers\Divisi\DivisiController::class, 'store'])->name('divisi.store');
    Route::post('/divisi-edit', [App\Http\Controllers\Divisi\DivisiController::class, 'edit'])->name('divisi.edit');
    Route::post('/divisi-update', [App\Http\Controllers\Divisi\DivisiController::class, 'update'])->name('divisi.update');
    Route::post('/divisi-hapus', [App\Http\Controllers\Divisi\DivisiController::class, 'hapus'])->name('divisi.hapus');

    // Route::get('/divisi-create',[App\Http\Controllers\Divisi\DivisiController::class, 'create'])->name('divisi.create');
    // Route::post('/divisi-store',[App\Http\Controllers\Divisi\DivisiController::class, 'store'])->name('divisi.store');
    // Route::get('/divisi-edit/{id}',[App\Http\Controllers\Divisi\DivisiController::class, 'edit'])->name('divisi.edit');
    // Route::put('/divisi-edit/{id}',[App\Http\Controllers\Divisi\DivisiController::class, 'update'])->name('divisi.update');
    // Route::patch('divisi/delete/{id}', [App\Http\Controllers\Divisi\DivisiController::class, 'delete'])->name('divisi.delete');
    // Route::delete('divisi/delete/{id}',[App\Http\Controllers\Divisi\DivisiController::class, 'destroy'])->name('divisi.destroy');
    // Route::post('divisi/restore/{id}',[App\Http\Controllers\Divisi\DivisiController::class, 'restore'])->name('divisi.restore');


     /*
    |--------------------------------------------------------------------------
    | Routes Formula
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/formula',[App\Http\Controllers\Formula\FormulaController::class, 'index'])->name('formula.index');
    Route::get('/formula-create',[App\Http\Controllers\Formula\FormulaController::class, 'create'])->name('formula.create');
    Route::post('/formula-store',[App\Http\Controllers\Formula\FormulaController::class, 'store'])->name('formula.store');
    Route::get('/formula-edit/{id}',[App\Http\Controllers\Formula\FormulaController::class, 'edit'])->name('formula.edit');
    Route::put('/formula-edit/{id}',[App\Http\Controllers\Formula\FormulaController::class, 'update'])->name('formula.update');
    Route::patch('formula/delete/{id}', [App\Http\Controllers\Formula\FormulaController::class, 'delete'])->name('formula.delete');
    Route::delete('formula/delete/{id}',[App\Http\Controllers\Formula\FormulaController::class, 'destroy'])->name('formula.destroy');
    Route::post('formula/restore/{id}',[App\Http\Controllers\Formula\FormulaController::class, 'restore'])->name('formula.restore');


     /*
    |--------------------------------------------------------------------------
    | Routes Formula Item
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/subitem',[App\Http\Controllers\SubItem\SubItemController::class, 'index'])->name('subitem.index');
    Route::get('/subitem/get',[App\Http\Controllers\SubItem\SubItemController::class, 'get'])->name('subitem.get');
    Route::get('/subitem-create',[App\Http\Controllers\SubItem\SubItemController::class, 'create'])->name('subitem.create');
    Route::post('/subitem-store',[App\Http\Controllers\SubItem\SubItemController::class, 'store'])->name('subitem.store');
    Route::patch('subitem/delete/{id}', [App\Http\Controllers\SubItem\SubItemController::class, 'delete'])->name('subitem.delete');

    /*
    |--------------------------------------------------------------------------
    | Routes Formula Utama
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/subitem-utama',[App\Http\Controllers\SubitemUtama\SubitemUtamaController::class, 'index'])->name('subitem-utama.index');
    Route::get('/subitem-utama/get',[App\Http\Controllers\SubitemUtama\SubitemUtamaController::class, 'get'])->name('subitem-utama.get');
    Route::get('/subitem-utama-create',[App\Http\Controllers\SubitemUtama\SubitemUtamaController::class, 'create'])->name('subitem-utama.create');
    Route::post('/subitem-utama-store',[App\Http\Controllers\SubitemUtama\SubitemUtamaController::class, 'store'])->name('subitem-utama.store');
    Route::patch('subitem-utama/delete/{id}', [App\Http\Controllers\SubitemUtama\SubitemUtamaController::class, 'delete'])->name('subitem-utama.delete');



    Route::get('/pesan-material',[App\Http\Controllers\PesanMaterial\PesanMaterialController::class, 'index'])->name('pemesanan-matrial.index');
   /*
    |--------------------------------------------------------------------------
    | Routes Formula Utama
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/formula-utama',[App\Http\Controllers\FormulaUtama\FormulaUtamaController::class, 'index'])->name('formula-utama.index');
    Route::get('/formula-utama/get',[App\Http\Controllers\FormulaUtama\FormulaUtamaController::class, 'get'])->name('formula-utama.get');
    Route::get('/formula-utama-create',[App\Http\Controllers\FormulaUtama\FormulaUtamaController::class, 'create'])->name('formula-utama.create');
    Route::post('/formula-utama-store',[App\Http\Controllers\FormulaUtama\FormulaUtamaController::class, 'store'])->name('formula-utama.store');
    Route::get('/formula-utama-edit/{id}',[App\Http\Controllers\FormulaUtama\FormulaUtamaController::class, 'edit'])->name('formula-utama.edit');
    Route::put('/formula-utama-edit/{id}',[App\Http\Controllers\FormulaUtama\FormulaUtamaController::class, 'update'])->name('formula-utama.update');
    Route::patch('formula-utama/delete/{id}', [App\Http\Controllers\FormulaUtama\FormulaUtamaController::class, 'delete'])->name('formula-utama.delete');
    Route::delete('formula-utama/delete/{id}',[App\Http\Controllers\FormulaUtama\FormulaUtamaController::class, 'destroy'])->name('formula-utama.destroy');
    Route::post('formula-utama/restore/{id}',[App\Http\Controllers\FormulaUtama\FormulaUtamaController::class, 'restore'])->name('formula-utama.restore');

    /*
    |--------------------------------------------------------------------------
    | Routes Formula Item
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/formula-item',[App\Http\Controllers\FormulaItem\FormulaItemController::class, 'index'])->name('formula-item.index');
    Route::get('/formula-item/get',[App\Http\Controllers\FormulaItem\FormulaItemController::class, 'get'])->name('formula-item.get');
    Route::get('/formula-item-create',[App\Http\Controllers\FormulaItem\FormulaItemController::class, 'create'])->name('formula-item.create');
    Route::post('/formula-item-store',[App\Http\Controllers\FormulaItem\FormulaItemController::class, 'store'])->name('formula-item.store');
    Route::get('/formula-item-edit/{id}',[App\Http\Controllers\FormulaItem\FormulaItemController::class, 'edit'])->name('formula-item.edit');
    Route::put('/formula-item-edit/{id}',[App\Http\Controllers\FormulaItem\FormulaItemController::class, 'update'])->name('formula-item.update');
    Route::patch('formula-item/delete/{id}', [App\Http\Controllers\FormulaItem\FormulaItemController::class, 'delete'])->name('formula-item.delete');
    Route::delete('formula-item/delete/{id}',[App\Http\Controllers\FormulaItem\FormulaItemController::class, 'destroy'])->name('formula-item.destroy');
    Route::post('formula-item/restore/{id}',[App\Http\Controllers\FormulaItem\FormulaItemController::class, 'restore'])->name('formula-item.restore');



});
