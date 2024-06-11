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
    Route::get('wilayah', [WilayahController::class, 'index'])->name('wilayah.index');
    // Sample
    Route::resource('samples', SampleController::class);
    // Petugas
    Route::get('/petugas/table', [PetugasController::class, 'getTableData'])->name('petugas.table');
    Route::post('/petugas/{petugas}', [PetugasController::class, 'update'])->name('petugas.update');
    Route::resource('petugas', PetugasController::class);
    // Documents
    Route::resource('documents', DocumentController::class);
    // Sections
    Route::resource('sections', SectionController::class);
    // Group
    Route::resource('groups', GroupController::class);
    // Commodities
    Route::resource('commodities', CommodityController::class);
    // Qualities
    Route::resource('qualities', QualityController::class);

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
