<?php

use App\Models\Sample;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QualityController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\WidgetsController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\CommodityController;
use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\ComponentsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DatabaseBackupController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\GeneralSettingController;

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return to_route('login');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    // Dashboards
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard.index');
    // Locale
    Route::get('setlocale/{locale}', SetLocaleController::class)->name('setlocale');

    // Wilayah Kabupaten Kecamatan Desa
    Route::get('master/wilayah', [DesaController::class, 'index'])->name('wilayah.index');
    Route::get('master/wilayah/create', [DesaController::class, 'create'])->name('wilayah.create');
    Route::post('master/wilayah/store', [DesaController::class, 'store'])->name('wilayah.store');
    Route::get('master/wilayah/edit/{id}', [DesaController::class, 'edit'])->name('wilayah.edit');
    Route::patch('master/wilayah/update', [DesaController::class, 'update'])->name('wilayah.update');
    Route::delete('master/wilayah/{desa}', [DesaController::class, 'destroy'])->name('wilayah.destroy');

    // Sampel
    Route::get('master/samples', [SampleController::class, 'index'])->name('samples.index');
    Route::get('master/samples/create', [SampleController::class, 'create'])->name('samples.create');
    Route::post('master/samples/store', [SampleController::class, 'store'])->name('samples.store');
    Route::get('master/samples/edit/{sample}', [SampleController::class, 'edit'])->name('samples.edit');
    Route::patch('master/samples/update', [SampleController::class, 'update'])->name('samples.update');
    Route::delete('master/samples/{sample}', [SampleController::class, 'destroy'])->name('samples.destroy');
    
    // Kecamatan
    Route::get('master/wilayah/desa/fetch-by-kecamatan/{kecamatan}', [DesaController::class, 'fetch_by_kecamatan'])->name('wilayah.desa.fetch_by_kecamatan');

    
    // Petugas
    Route::get('/petugas/table', [PetugasController::class, 'getTableData'])->name('petugas.table');
    Route::post('/petugas/{petugas}', [PetugasController::class, 'update'])->name('petugas.update');
    Route::delete('/petugas/{petugas}', [PetugasController::class, 'destroy'])->name('petugas.destroy');
    Route::resource('petugas', PetugasController::class);
    // Documents
    Route::get('/documents/table', [DocumentController::class, 'getTableData'])->name('documents.table');
    Route::post('/documents/{document}', [DocumentController::class, 'update'])->name('documents.update');
    Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');
    Route::resource('documents', DocumentController::class);
    // Sections
    Route::resource('sections', SectionController::class);
    // Group
    Route::resource('groups', GroupController::class);
    // Commodities
    // Route::resource('commodities', CommodityController::class);
    Route::get('/komoditas', [CommodityController::class, 'index'])->name('komoditas.index');
    Route::get('/komoditas/search', [CommodityController::class, 'search'])->name('komoditas.search');
    Route::post('/komoditas/store', [CommodityController::class, 'store'])->name('komoditas.store');
    Route::get('/komoditas/fetch/{id}', [CommodityController::class, 'fetch'])->name('komoditas.fetch');
    Route::delete('/komoditas/delete/{id}', [CommodityController::class, 'destroy'])->name('komoditas.destroy');
    // Qualities
    // Route::resource('qualities', QualityController::class);
    Route::get('/kualitas', [QualityController::class, 'index'])->name('kualitas.index');
    Route::get('/kualitas/search', [QualityController::class, 'search'])->name('kualitas.search');
    Route::post('/kualitas/store', [QualityController::class, 'store'])->name('kualitas.store');
    Route::get('/kualitas/fetch/{id}', [QualityController::class, 'fetch'])->name('kualitas.fetch');
    Route::delete('/kualitas/delete/{id}', [QualityController::class, 'destroy'])->name('kualitas.destroy');
    
    // User
    Route::resource('users', UserController::class);
    // Permission
    Route::resource('permissions', PermissionController::class)->except(['show']);
    // Roles
    Route::resource('roles', RoleController::class);
    // Profiles
    Route::resource('profiles', ProfileController::class)->only(['index', 'update'])->parameter('profiles', 'user');
    // Env
    Route::singleton('general-settings', GeneralSettingController::class);
    Route::post('general-settings-logo', [GeneralSettingController::class, 'logoUpdate'])->name('general-settings.logo');

    // Database Backup
    Route::resource('database-backups', DatabaseBackupController::class);
    Route::get('database-backups-download/{fileName}', [DatabaseBackupController::class, 'databaseBackupDownload'])->name('database-backups.download');
});
