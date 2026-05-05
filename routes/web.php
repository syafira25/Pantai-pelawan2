<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;

Route::middleware('auth')->group(function () {
    Route::get('/tiket/{id}/pembayaran-manual', [TicketController::class, 'manualPayment'])
        ->name('tiket.manual.payment');

    Route::post('/tiket/{id}/upload-bukti', [TicketController::class, 'uploadBukti'])
        ->name('tiket.upload.bukti');
});
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

Route::get('/', function () {
    return view('dashboard');
})->name('home');

Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Route Website Pantai Pelawan
|--------------------------------------------------------------------------
*/

Route::get('/profil', [ProfilController::class, 'index'])->name('profil.pantai');

Route::get('/daya-tarik', function () {
    return view('daya_tarik');
})->name('daya.tarik');

Route::get('/fasilitas', function () {
    return view('fasilitas');
})->name('fasilitas');

Route::get('/galeri', function () {
    return view('galeri');
})->name('galeri');

Route::get('/informasi', function () {
    return view('informasi');
})->name('informasi.pantai');

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
                [
                    'nama' => 'Ikan Bakar',
                    'harga' => 'Rp35.000',
                    'gambar' => 'images/menu1.jpg',
                ],
                [
                    'nama' => 'Udang Saus Tiram',
                    'harga' => 'Rp40.000',
                    'gambar' => 'images/menu2.jpg',
                ],
                [
                    'nama' => 'Cumi Goreng Tepung',
                    'harga' => 'Rp30.000',
                    'gambar' => 'images/menu3.jpg',
                ],
            ],
        ],
        'kedai-santai-pantai' => [
            'nama' => 'Kedai Santai Pantai',
            'gambar' => 'images/warung2.jpg',
            'deskripsi' => 'Tempat makan santai di tepi pantai dengan minuman segar dan makanan ringan.',
            'menu' => [
                [
                    'nama' => 'Es Kelapa Muda',
                    'harga' => 'Rp12.000',
                    'gambar' => 'images/menu4.jpg',
                ],
                [
                    'nama' => 'Mie Goreng Seafood',
                    'harga' => 'Rp20.000',
                    'gambar' => 'images/menu5.jpg',
                ],
                [
                    'nama' => 'Kentang Goreng',
                    'harga' => 'Rp15.000',
                    'gambar' => 'images/menu6.jpg',
                ],
            ],
        ],
        'dapoer-laut-karimun' => [
            'nama' => 'Dapoer Laut Karimun',
            'gambar' => 'images/warung3.jpg',
            'deskripsi' => 'Menyediakan aneka olahan hasil laut segar khas daerah pesisir.',
            'menu' => [
                [
                    'nama' => 'Kepiting Saus Padang',
                    'harga' => 'Rp55.000',
                    'gambar' => 'images/menu7.jpg',
                ],
                [
                    'nama' => 'Kerang Rebus',
                    'harga' => 'Rp25.000',
                    'gambar' => 'images/menu8.jpg',
                ],
                [
                    'nama' => 'Ikan Asam Manis',
                    'harga' => 'Rp38.000',
                    'gambar' => 'images/menu9.jpg',
                ],
            ],
        ],
        'warung-makan-bahari' => [
            'nama' => 'Warung Makan Bahari',
            'gambar' => 'images/warung4.jpg',
            'deskripsi' => 'Pilihan tepat untuk menikmati makanan keluarga dengan suasana nyaman.',
            'menu' => [
                [
                    'nama' => 'Nasi Goreng Kampung',
                    'harga' => 'Rp18.000',
                    'gambar' => 'images/menu10.jpg',
                ],
                [
                    'nama' => 'Ayam Goreng',
                    'harga' => 'Rp22.000',
                    'gambar' => 'images/menu11.jpg',
                ],
                [
                    'nama' => 'Teh Es',
                    'harga' => 'Rp6.000',
                    'gambar' => 'images/menu12.jpg',
                ],
            ],
        ],
        'kedai-rasa-pesisir' => [
            'nama' => 'Kedai Rasa Pesisir',
            'gambar' => 'images/warung5.jpg',
            'deskripsi' => 'Warung kuliner dengan menu khas pesisir dan harga terjangkau.',
            'menu' => [
                [
                    'nama' => 'Sotong Bakar',
                    'harga' => 'Rp32.000',
                    'gambar' => 'images/menu13.jpg',
                ],
                [
                    'nama' => 'Mie Rebus',
                    'harga' => 'Rp16.000',
                    'gambar' => 'images/menu14.jpg',
                ],
                [
                    'nama' => 'Jus Jeruk',
                    'harga' => 'Rp10.000',
                    'gambar' => 'images/menu15.jpg',
                ],
            ],
        ],
    ];

    if (!isset($warungs[$slug])) {
        abort(404);
    }

    $warung = $warungs[$slug];

    return view('detail_kuliner', compact('warung'));
})->name('kuliner.detail');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

/*
|--------------------------------------------------------------------------
| Kirim Email dari Form Kontak
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
| Pemesanan Tiket + Midtrans
|--------------------------------------------------------------------------
*/

   /*
|--------------------------------------------------------------------------
| Pemesanan Tiket + Midtrans
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

require __DIR__ . '/auth.php';

// HALAMAN TIKET UNTUK GUEST
Route::get('/tiket', function () {
    if (!auth()->check()) {
        return view('uth-wisatawan');
    }

    return app(TicketController::class)->create();
})->name('tiket');

// PROSES TIKET HARUS LOGIN
Route::post('/tiket', [TicketController::class, 'store'])
    ->middleware('auth')
    ->name('tiket.store');

Route::get('/tiket/{pemesanan}/payment', [TicketController::class, 'payment'])
    ->middleware('auth')
    ->name('tiket.payment');

Route::get('/tiket/{pemesanan}/finish', [TicketController::class, 'finish'])
    ->middleware('auth')
    ->name('tiket.finish');

  Route::get('/akun-saya', function () {
    $pemesanans = Pemesanan::where('email', Auth::user()->email)
        ->latest()
        ->get();

    return view('akun-saya', compact('pemesanans'));
})->middleware('auth')->name('akun.saya');

Route::get('/profile-saya', function () {
    return view('profile-saya');
})->middleware('auth')->name('profile.saya');

Route::middleware('auth')->group(function () {
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

Route::middleware('auth')->group(function () {
    Route::get('/tiket/{id}/pembayaran-manual', [TicketController::class, 'manualPayment'])
        ->name('tiket.manual.payment');

    Route::post('/tiket/{id}/upload-bukti', [TicketController::class, 'uploadBukti'])
        ->name('tiket.upload.bukti');

Route::get('/tiket/{id}/finish', [TicketController::class, 'finish'])
    ->name('tiket.finish');

Route::get('/tiket/{id}/lihat', [TicketController::class, 'lihatTiket'])
    ->name('tiket.lihat');

Route::get('/tiket/{id}/nota', [TicketController::class, 'downloadNota'])
    ->name('tiket.nota');

Route::get('/tiket/scan/{qr_code}', [TicketController::class, 'scanQr'])
    ->name('tiket.scan');

 Route::get('/tiket/{id}/download', [TicketController::class, 'downloadNota'])->name('tiket.download.nota');

Route::get('/tiket/{id}/download-tiket', [TicketController::class, 'downloadTiket'])->name('tiket.download.tiket');   

Route::get('/tiket/{id}/download-tiket', [TicketController::class, 'downloadTiket'])
    ->name('tiket.download.tiket');

Route::get('/tiket/scan/{qr_code}', [TicketController::class, 'scanQr'])
    ->name('tiket.scan');

Route::get('/', function () {
    return view('dashboard');
})->name('home');

});
