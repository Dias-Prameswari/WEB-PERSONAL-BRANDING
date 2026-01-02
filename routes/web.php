<?php

// ROUTERS PUBLIK
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ArticleController;
// END ROUTES PUBLIK

// ROUTES AUTH & DASHBOARD
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\PortofolioController as AdminPortofolioController;
// END ROUTES AUTH & DASHBOARD

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

// --- ROUTES PUBLIK ---
Route::view('/', 'home')->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/tentang-saya', 'about')->name('about');
Route::get('/tentang-saya', [AboutController::class, 'about'])->name('about');

Route::get('/layanan', [ServicesController::class, 'services'])->name('services');
Route::get('/layanan/{slug}', [ServicesController::class, 'show'])->name('services.show');

Route::view('/kontak', 'contact')->name('contact');
Route::post('/kontak', [ContactController::class, 'send'])
    ->name('contact.send')
    ->middleware('throttle:5,1');

Route::get('/artikel', [ArticleController::class, 'index'])->name('blog.index'); // /artikel
Route::get('/artikel/portofolio', [ArticleController::class, 'portfolio'])->name('blog.portofolio');   // ← pakai 'portofolio' (ofo), sama seperti di blade
Route::get('/artikel/kategori/{slug}', [ArticleController::class, 'category'])->name('blog.category'); // /artikel/kategori/xxx
Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('blog.show'); // detail artikel
// --- END ROUTES PUBLIK ---

// --- ROUTES AUTH & DASHBOARD ---
// Dashboard Breeze 
Route::get('/dashboard', fn() => view('dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// --- PROFIL USER (harus login) ---    
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --- ROUTES LEAD (form kontak / pendaftaran) ---
Route::get('/daftar', [LeadController::class, 'create'])->name('leads.create');
Route::post('/daftar', [LeadController::class, 'store'])
    ->name('leads.store')
    ->middleware('throttle:5,1');

// --- AREA ADMIN ONLY (leads + artikel admin) ---    
Route::middleware(['auth', 'verified', 'admin.only'])->group(function () {
    // Leads admin
    Route::get('/admin/leads', [LeadController::class, 'index'])->name('leads.admin.index');
    Route::get('/admin/leads/{lead}', [LeadController::class, 'show'])->name('leads.admin.show');
    Route::get('/admin/leads-export', [LeadController::class, 'exportCsv'])->name('leads.admin.export');

    // Artikel admin
    Route::resource('/admin/articles', AdminArticleController::class)
        ->except(['show'])
        ->names('admin.articles');

    // Portofolio admin
    Route::resource('/admin/portofolio', AdminPortofolioController::class)
        ->except(['show'])
        ->names('admin.portofolio');
});
// --- END ROUTES AUTH & DASHBOARD ---

require __DIR__ . '/auth.php';
