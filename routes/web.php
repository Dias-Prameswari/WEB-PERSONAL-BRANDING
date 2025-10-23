<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LeadController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'home')->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::view('/tentang-saya', 'about')->name('about');
Route::view('/layanan', 'services-slide3')->name('services');   // ganti sesuai nama file
// Route::view('/artikel', 'blog')->name('blog');
Route::view('/kontak', 'contact')->name('contact');              // buat view kalau belum

// Dashboard Breeze (jangan dihapus)
Route::get('/dashboard', fn () => view('dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --- ROUTES BLOG (publik) ---
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');               // /blog
    Route::get('/portfolio', [BlogController::class, 'portfolio'])->name('portfolio'); // /blog/portfolio
    Route::get('/category/{slug}', [BlogController::class, 'category'])->name('category'); // /blog/category/xxx
    // (opsional) detail artikel:
    // Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});

// --- ROUTES LEAD (form kontak / pendaftaran) ---
Route::get('/daftar', [LeadController::class, 'create'])->name('leads.create');
Route::post('/daftar', [LeadController::class, 'store'])
    ->name('leads.store')
    ->middleware('throttle:5,1'); 

Route::middleware(['auth','verified','admin.only'])->group(function () {
    Route::get('/admin/leads', [LeadController::class, 'index'])->name('leads.admin.index');
    Route::get('/admin/leads/{lead}', [LeadController::class, 'show'])->name('leads.admin.show');
    Route::get('/admin/leads-export', [LeadController::class, 'exportCsv'])->name('leads.admin.export');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard/leads', [LeadController::class, 'index'])->name('leads.index');
    Route::get('/dashboard/leads/export', [LeadController::class, 'export'])->name('leads.export');
});

require __DIR__.'/auth.php';
