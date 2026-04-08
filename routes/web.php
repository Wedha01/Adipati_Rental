<?php


use App\Http\Controllers\DriversController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\MobilsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PendaftaranController;
use App\Models\Drivers;
use App\Models\mobils;
use App\Models\Images;
use App\Models\pendaftaran;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Driver\Driver;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',  function () {
    $characters = mobils::all();
    $drivers = Drivers::all(); // Fetch events here
    $images = Images::all();
    $pendaftaran = pendaftaran::all();
    return view('dashboard', ['c' => $characters, 'e' => $drivers, 'i'=> $images, "p"=> $pendaftaran]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/history',  function () {
    $characters = mobils::all();
    $drivers = Drivers::all(); // Fetch events here
    $images = Images::all();
    $pendaftaran = pendaftaran::all();
    return view('history', ['c' => $characters, 'e' => $drivers, 'i'=> $images, "p"=> $pendaftaran]);
})->middleware(['auth', 'verified'])->name('history');


Route::middleware('auth')->group(function () {
    // Character Routes
    Route::get('/characters', [MobilsController::class, 'index'])->name('characters.index');
    Route::get('/characters/create', [MobilsController::class, 'create'])->name('characters.create');
    Route::get('/characters/page', [MobilsController::class, 'page'])->name('characters.page');
    Route::get('/characters/pendaftaran', [MobilsController::class, 'pendaftaran'])->name('characters.pendaftaran');
    Route::post('/characters', [MobilsController::class, 'store'])->name('characters.store');
    Route::get('/characters/{character}/edit', [MobilsController::class, 'edit'])->name('characters.edit');
    Route::put('/characters/{character}', [MobilsController::class, 'update'])->name('characters.update');
    Route::delete('/characters/{character}', [MobilsController::class, 'destroy'])->name('characters.destroy');

    // Event Routes
    Route::get('/characters', [DriversController::class, 'index'])->name('characters.index');
    Route::get('/events/create', [DriversController::class, 'create'])->name('events.create');
    Route::post('/events', [DriversController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [DriversController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [DriversController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [DriversController::class, 'destroy'])->name('events.destroy');

    // logo Routes
    Route::get('/image/create', [ImagesController::class, 'create'])->name('image.create');
    Route::post('/image', [ImagesController::class, 'store'])->name('image.store');
    Route::get('/image/{image}/edit', [ImagesController::class, 'edit'])->name('image.edit');
    Route::put('/image/{image}', [ImagesController::class, 'update'])->name('image.update');
    Route::delete('/image/{image}', [ImagesController::class, 'destroy'])->name('image.destroy');
    //pendaftaran Routes
    Route::get('/character/pendaftaran', [PendaftaranController::class, 'index'])->name('characters.pendaftaran');
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
    Route::get('/pendaftaran/create', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
    Route::delete('/pendaftaran/{pendaftaran}', [PendaftaranController::class, 'destroy'])->name('pendaftaran.destroy');


    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';