<?php

use App\Models\Galeri;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPemesananController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminProfilController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DayaTarikController;
use App\Http\Controllers\Admin\AdminDayaTarikController;
use App\Http\Controllers\InformasiPantaiController;
use App\Http\Controllers\Admin\AdminInformasiPantaiController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\Admin\AdminUlasanController;
use App\Http\Controllers\KulinerController;
use App\Http\Controllers\Admin\AdminKulinerController;
use App\Http\Controllers\Admin\GaleriAdminController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\Admin\AdminFasilitasController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\Admin\AdminBerandaController;

/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA USER
|--------------------------------------------------------------------------
*/

Route::get('/', [BerandaController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| ROUTE WEBSITE PANTAI PELAWAN
|--------------------------------------------------------------------------
*/

Route::get('/profil', [ProfilController::class, 'index'])->name('profil.pantai');

Route::get('/daya-tarik', [DayaTarikController::class, 'index'])->name('daya.tarik');

Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas');

Route::get('/galeri', function () {
    $galeris = Galeri::where('status', 'aktif')
        ->orderBy('urutan', 'asc')
        ->get();

    return view('galeri', compact('galeris'));
})->name('galeri');

Route::get('/informasi-pantai', [InformasiPantaiController::class, 'index'])->name('informasi.pantai');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::post('/ulasan', [UlasanController::class, 'store'])
    ->middleware('auth')
    ->name('ulasan.store');
/*
|--------------------------------------------------------------------------
| KULINER
|--------------------------------------------------------------------------
*/

Route::get('/kuliner', function () {
    $warungs = [
        [
            'nama' => 'Warung Seafood Pelawan',
            'slug' => 'warung-seafood-pelawan',
            'gambar' => 'images/warung1.jpg',
            'deskripsi' => 'Warung seafood dengan menu andalan ikan bakar, cumi goreng, dan udang saus.',
        ],
        [
            'nama' => 'Kedai Santai Pantai',
            'slug' => 'kedai-santai-pantai',
            'gambar' => 'images/warung2.jpg',
            'deskripsi' => 'Tempat makan santai di tepi pantai dengan minuman segar dan makanan ringan.',
        ],
        [
            'nama' => 'Dapoer Laut Karimun',
            'slug' => 'dapoer-laut-karimun',
            'gambar' => 'images/warung3.jpg',
            'deskripsi' => 'Menyediakan aneka olahan hasil laut segar khas daerah pesisir.',
        ],
        [
            'nama' => 'Warung Makan Bahari',
            'slug' => 'warung-makan-bahari',
            'gambar' => 'images/warung4.jpg',
            'deskripsi' => 'Pilihan tepat untuk menikmati makanan keluarga dengan suasana nyaman.',
        ],
        [
            'nama' => 'Kedai Rasa Pesisir',
            'slug' => 'kedai-rasa-pesisir',
            'gambar' => 'images/warung5.jpg',
            'deskripsi' => 'Warung kuliner dengan menu khas pesisir dan harga terjangkau.',
        ],
    ];

    return view('kuliner', compact('warungs'));
})->name('kuliner');

Route::get('/kuliner/{slug}', function ($slug) {
    $warungs = [
        'warung-seafood-pelawan' => [
            'nama' => 'Warung Seafood Pelawan',
            'gambar' => 'images/warung1.jpg',
            'deskripsi' => 'Warung seafood dengan menu andalan ikan bakar, cumi goreng, dan udang saus.',
            'menu' => [
                ['nama' => 'Ikan Bakar', 'harga' => 'Rp35.000', 'gambar' => 'images/menu1.jpg'],
                ['nama' => 'Udang Saus Tiram', 'harga' => 'Rp40.000', 'gambar' => 'images/menu2.jpg'],
                ['nama' => 'Cumi Goreng Tepung', 'harga' => 'Rp30.000', 'gambar' => 'images/menu3.jpg'],
            ],
        ],
        'kedai-santai-pantai' => [
            'nama' => 'Kedai Santai Pantai',
            'gambar' => 'images/warung2.jpg',
            'deskripsi' => 'Tempat makan santai di tepi pantai dengan minuman segar dan makanan ringan.',
            'menu' => [
                ['nama' => 'Es Kelapa Muda', 'harga' => 'Rp12.000', 'gambar' => 'images/menu4.jpg'],
                ['nama' => 'Mie Goreng Seafood', 'harga' => 'Rp20.000', 'gambar' => 'images/menu5.jpg'],
                ['nama' => 'Kentang Goreng', 'harga' => 'Rp15.000', 'gambar' => 'images/menu6.jpg'],
            ],
        ],
        'dapoer-laut-karimun' => [
            'nama' => 'Dapoer Laut Karimun',
            'gambar' => 'images/warung3.jpg',
            'deskripsi' => 'Menyediakan aneka olahan hasil laut segar khas daerah pesisir.',
            'menu' => [
                ['nama' => 'Kepiting Saus Padang', 'harga' => 'Rp55.000', 'gambar' => 'images/menu7.jpg'],
                ['nama' => 'Kerang Rebus', 'harga' => 'Rp25.000', 'gambar' => 'images/menu8.jpg'],
                ['nama' => 'Ikan Asam Manis', 'harga' => 'Rp38.000', 'gambar' => 'images/menu9.jpg'],
            ],
        ],
        'warung-makan-bahari' => [
            'nama' => 'Warung Makan Bahari',
            'gambar' => 'images/warung4.jpg',
            'deskripsi' => 'Pilihan tepat untuk menikmati makanan keluarga dengan suasana nyaman.',
            'menu' => [
                ['nama' => 'Nasi Goreng Kampung', 'harga' => 'Rp18.000', 'gambar' => 'images/menu10.jpg'],
                ['nama' => 'Ayam Goreng', 'harga' => 'Rp22.000', 'gambar' => 'images/menu11.jpg'],
                ['nama' => 'Teh Es', 'harga' => 'Rp6.000', 'gambar' => 'images/menu12.jpg'],
            ],
        ],
        'kedai-rasa-pesisir' => [
            'nama' => 'Kedai Rasa Pesisir',
            'gambar' => 'images/warung5.jpg',
            'deskripsi' => 'Warung kuliner dengan menu khas pesisir dan harga terjangkau.',
            'menu' => [
                ['nama' => 'Sotong Bakar', 'harga' => 'Rp32.000', 'gambar' => 'images/menu13.jpg'],
                ['nama' => 'Mie Rebus', 'harga' => 'Rp16.000', 'gambar' => 'images/menu14.jpg'],
                ['nama' => 'Jus Jeruk', 'harga' => 'Rp10.000', 'gambar' => 'images/menu15.jpg'],
            ],
        ],
    ];

    if (!isset($warungs[$slug])) {
        abort(404);
    }

    $warung = $warungs[$slug];

    return view('detail_kuliner', compact('warung'));
})->name('kuliner.detail');
Route::get('/kuliner', [KulinerController::class, 'index'])->name('kuliner');
Route::get('/kuliner/{slug}', [KulinerController::class, 'detail'])->name('kuliner.detail');

/*
|--------------------------------------------------------------------------
| KIRIM EMAIL DARI FORM KONTAK
|--------------------------------------------------------------------------
*/

Route::post('/kirim-pesan', function (Request $request) {
    $request->validate([
        'nama' => 'required|string|max:100',
        'email' => 'required|email',
        'pesan' => 'required|string',
    ]);

    $isiPesan =
        "Nama: " . $request->nama . "\n" .
        "Email: " . $request->email . "\n\n" .
        "Pesan:\n" . $request->pesan;

    Mail::raw($isiPesan, function ($message) use ($request) {
        $message->to('syafiiraap@gmail.com')
            ->subject('Pesan dari Website Pantai Pelawan')
            ->replyTo($request->email, $request->nama);
    });

    return back()->with('success', 'Pesan berhasil dikirim!');
})->name('kirim.pesan');

/*
|--------------------------------------------------------------------------
| PEMESANAN TIKET
|--------------------------------------------------------------------------
*/

Route::get('/tiket', function () {
    if (!auth()->check()) {
        return view('uth-wisatawan');
    }

    return app(TicketController::class)->create();
})->name('tiket');

Route::middleware('auth')->group(function () {
    Route::post('/tiket', [TicketController::class, 'store'])->name('tiket.store');

    Route::get('/tiket/{pemesanan}/payment', [TicketController::class, 'payment'])->name('tiket.payment');

    Route::get('/tiket/{id}/finish', [TicketController::class, 'finish'])->name('tiket.finish');

    Route::get('/tiket/{id}/lihat', [TicketController::class, 'lihatTiket'])->name('tiket.lihat');

    Route::get('/tiket/{id}/nota', [TicketController::class, 'downloadNota'])->name('tiket.nota');

    Route::get('/tiket/{id}/download', [TicketController::class, 'downloadNota'])->name('tiket.download.nota');

    Route::get('/tiket/{id}/download-tiket', [TicketController::class, 'downloadTiket'])->name('tiket.download.tiket');

    Route::get('/tiket/{id}/pembayaran-manual', [TicketController::class, 'manualPayment'])->name('tiket.manual.payment');

    Route::post('/tiket/{id}/upload-bukti', [TicketController::class, 'uploadBukti'])->name('tiket.upload.bukti');

    Route::get('/akun-saya', function () {
        $pemesanans = Pemesanan::where('email', Auth::user()->email)
            ->latest()
            ->get();

        return view('akun-saya', compact('pemesanans'));
    })->name('akun.saya');

    Route::get('/profile-saya', function () {
        return view('profile-saya');
    })->name('profile.saya');

    Route::get('/edit-profile-saya', function () {
        return view('edit-profile-saya');
    })->name('profile.edit.saya');

    Route::get('/ganti-password', function () {
        return view('ganti-password');
    })->name('password.ganti');
});

Route::get('/tiket/scan/{qr_code}', [TicketController::class, 'scanQr'])
    ->name('tiket.scan');

Route::post('/midtrans/notification', [TicketController::class, 'notification'])
    ->name('midtrans.notification');

/*
|--------------------------------------------------------------------------
| PROFILE BAWAAN BREEZE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/pemesanan', [AdminPemesananController::class, 'index'])->name('pemesanan.index');
    Route::get('/pemesanan/{id}', [AdminPemesananController::class, 'show'])->name('pemesanan.show');

    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::patch('/users/{id}/role', [AdminUserController::class, 'updateRole'])->name('users.updateRole');
    Route::delete('/users/{id}', [AdminUserController::class, 'destroy'])->name('users.destroy');

Route::get('/profil', [AdminProfilController::class, 'index'])->name('profil.index');
Route::put('/profil', [AdminProfilController::class, 'update'])->name('profil.update');

Route::get('/daya-tarik', [AdminDayaTarikController::class, 'index'])->name('daya-tarik.index');
Route::put('/daya-tarik', [AdminDayaTarikController::class, 'update'])->name('daya-tarik.update');

    Route::get('/informasi', [AdminInformasiPantaiController::class, 'edit'])->name('informasi.edit');
    Route::put('/informasi', [AdminInformasiPantaiController::class, 'update'])->name('informasi.update');

    Route::get('/ulasan', [AdminUlasanController::class, 'index'])->name('ulasan.index');
Route::patch('/ulasan/{id}/setujui', [AdminUlasanController::class, 'setujui'])->name('ulasan.setujui');
Route::patch('/ulasan/{id}/sembunyikan', [AdminUlasanController::class, 'sembunyikan'])->name('ulasan.sembunyikan');
Route::delete('/ulasan/{id}', [AdminUlasanController::class, 'destroy'])->name('ulasan.destroy');

Route::get('/kuliner', [AdminKulinerController::class, 'index'])->name('kuliner.index');
Route::put('/kuliner/page', [AdminKulinerController::class, 'updatePage'])->name('kuliner.page.update');
Route::post('/kuliner', [AdminKulinerController::class, 'store'])->name('kuliner.store');
Route::put('/kuliner/{id}', [AdminKulinerController::class, 'update'])->name('kuliner.update');
Route::delete('/kuliner/{id}', [AdminKulinerController::class, 'destroy'])->name('kuliner.destroy');

Route::post('/kuliner/{warungId}/menu', [AdminKulinerController::class, 'storeMenu'])->name('kuliner.menu.store');
Route::delete('/kuliner/menu/{id}', [AdminKulinerController::class, 'destroyMenu'])->name('kuliner.menu.destroy');

Route::get('/galeri', [GaleriAdminController::class, 'index'])->name('galeri.index');
Route::post('/galeri', [GaleriAdminController::class, 'store'])->name('galeri.store');
Route::put('/galeri/{galeri}', [GaleriAdminController::class, 'update'])->name('galeri.update');
Route::delete('/galeri/{galeri}', [GaleriAdminController::class, 'destroy'])->name('galeri.destroy');

Route::get('/fasilitas', [AdminFasilitasController::class, 'index'])->name('fasilitas.index');
Route::put('/fasilitas/page', [AdminFasilitasController::class, 'updatePage'])->name('fasilitas.page.update');
Route::post('/fasilitas', [AdminFasilitasController::class, 'store'])->name('fasilitas.store');
Route::put('/fasilitas/{id}', [AdminFasilitasController::class, 'update'])->name('fasilitas.update');
Route::delete('/fasilitas/{id}', [AdminFasilitasController::class, 'destroy'])->name('fasilitas.destroy');

Route::get('/beranda', [AdminBerandaController::class, 'index'])->name('beranda.index');
Route::put('/beranda/page', [AdminBerandaController::class, 'updatePage'])->name('beranda.page.update');
Route::post('/beranda', [AdminBerandaController::class, 'store'])->name('beranda.store');
Route::put('/beranda/{id}', [AdminBerandaController::class, 'update'])->name('beranda.update');
Route::delete('/beranda/{id}', [AdminBerandaController::class, 'destroy'])->name('beranda.destroy');

Route::get('/kuliner/paksa-isi-menu', [AdminKulinerController::class, 'paksaIsiMenu'])
    ->name('kuliner.paksa-isi-menu');

    Route::get('/kuliner/reset-menu', [AdminKulinerController::class, 'resetMenuKuliner'])
    ->name('kuliner.reset-menu');
    Route::post('/kuliner/menu/{menu}', [AdminKulinerController::class, 'updateMenu'])
    ->name('kuliner.menu.update');
    Route::post('/kuliner/{id}/menu', [AdminKulinerController::class, 'storeMenu'])
    ->name('kuliner.menu.store');
    Route::post('/kuliner/{id}', [AdminKulinerController::class, 'update'])->name('kuliner.update');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';