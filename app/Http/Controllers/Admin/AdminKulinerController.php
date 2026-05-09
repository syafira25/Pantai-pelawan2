<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KulinerPage;
use App\Models\WarungKuliner;
use App\Models\MenuKuliner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminKulinerController extends Controller
{
    public function index()
    {
        $kulinerPage = KulinerPage::firstOrCreate([], [
            'hero_judul' => 'Wisata Kuliner Pantai Pelawan',
            'hero_subjudul' => 'Temukan pilihan warung makan di sekitar Pantai Pelawan, lengkap dengan informasi menu, harga, foto makanan, dan lokasi warung.',
            'section_label' => 'Kuliner Sekitar Pantai',
            'section_judul' => 'Rekomendasi Warung Kuliner',
            'section_deskripsi' => 'Pilih warung yang ingin kamu lihat untuk mengetahui daftar menu, harga, foto makanan, dan alamat warung di sekitar Pantai Pelawan.',
        ]);

        if (WarungKuliner::count() == 0) {
    $this->seedDefaultWarungs();
}

if (MenuKuliner::count() == 0) {
    $this->seedDefaultMenus();
}

        $warungs = WarungKuliner::with('menus')
    ->where('status', 'aktif')
    ->orderBy('id', 'asc')
    ->get();

        return view('admin.kuliner.index', compact('kulinerPage', 'warungs'));
    }

    private function seedDefaultWarungs()
    {
        $dataWarung = [
            [
                'nama' => 'Warung Makan Pantai Pelawan',
                'slug' => 'warung-makan-pantai-pelawan',
                'badge' => 'Kuliner Pantai',
                'kategori' => 'Warung sekitar Pantai Pelawan',
                'deskripsi' => 'Warung makan yang menyediakan berbagai pilihan makanan dan minuman untuk pengunjung Pantai Pelawan.',
                'alamat' => 'Area kuliner sekitar Pantai Pelawan, Desa Pangke Barat, Kabupaten Karimun',
                'gambar' => 'images/profil_pantai.jpg',
                'gambar_2' => 'images/hero-pantai.jpg',
                'gambar_3' => 'images/profil_pantai.jpg',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Warung Seafood Pelawan',
                'slug' => 'warung-seafood-pelawan',
                'badge' => 'Kuliner Pantai',
                'kategori' => 'Warung sekitar Pantai Pelawan',
                'deskripsi' => 'Menyediakan pilihan makanan laut sederhana yang cocok dinikmati setelah berwisata di Pantai Pelawan.',
                'alamat' => 'Sekitar kawasan Pantai Pelawan, Desa Pangke Barat, Kabupaten Karimun',
                'gambar' => 'images/hero-pantai.jpg',
                'gambar_2' => 'images/profil_pantai.jpg',
                'gambar_3' => 'images/hero-pantai.jpg',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Kedai Minuman Pantai',
                'slug' => 'kedai-minuman-pantai',
                'badge' => 'Kuliner Pantai',
                'kategori' => 'Warung sekitar Pantai Pelawan',
                'deskripsi' => 'Kedai sederhana yang menyediakan minuman dan makanan ringan untuk pengunjung pantai.',
                'alamat' => 'Area wisata Pantai Pelawan, Kabupaten Karimun',
                'gambar' => 'images/profil_pantai.jpg',
                'gambar_2' => 'images/hero-pantai.jpg',
                'gambar_3' => 'images/profil_pantai.jpg',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Warung Keluarga Pesisir',
                'slug' => 'warung-keluarga-pesisir',
                'badge' => 'Kuliner Pantai',
                'kategori' => 'Warung sekitar Pantai Pelawan',
                'deskripsi' => 'Warung keluarga dengan menu makanan rumahan yang cocok untuk wisatawan bersama keluarga.',
                'alamat' => 'Dekat area parkir Pantai Pelawan, Desa Pangke Barat, Kabupaten Karimun',
                'gambar' => 'images/hero-pantai.jpg',
                'gambar_2' => 'images/profil_pantai.jpg',
                'gambar_3' => 'images/hero-pantai.jpg',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Pondok Jajanan Pelawan',
                'slug' => 'pondok-jajanan-pelawan',
                'badge' => 'Kuliner Pantai',
                'kategori' => 'Warung sekitar Pantai Pelawan',
                'deskripsi' => 'Pondok jajanan yang menyediakan makanan ringan dan minuman untuk pengunjung pantai.',
                'alamat' => 'Area gazebo Pantai Pelawan, Kabupaten Karimun',
                'gambar' => 'images/profil_pantai.jpg',
                'gambar_2' => 'images/hero-pantai.jpg',
                'gambar_3' => 'images/profil_pantai.jpg',
                'status' => 'aktif',
            ],
        ];

        foreach ($dataWarung as $warung) {
            WarungKuliner::firstOrCreate(
                ['slug' => $warung['slug']],
                $warung
            );
        }
    }

    private function seedDefaultMenus()
    {
        $menus = [
            'warung-makan-pantai-pelawan' => [
                'makanan' => [
                    ['Ikan Bakar Spesial', 35000],
                    ['Nasi Goreng Seafood', 28000],
                    ['Udang Saus Padang', 42000],
                    ['Cumi Crispy', 38000],
                    ['Kepiting Saus Tiram', 55000],
                    ['Mie Seafood', 25000],
                    ['Ayam Bakar Sambal', 22000],
                    ['Sate Seafood', 30000],
                ],
                'minuman' => [
                    ['Es Jeruk', 10000],
                    ['Kelapa Muda', 12000],
                    ['Jus Mangga', 15000],
                    ['Es Teh Manis', 6000],
                    ['Lemon Tea', 10000],
                    ['Milkshake Coklat', 18000],
                    ['Es Kopi Susu', 15000],
                    ['Jus Alpukat', 16000],
                ],
            ],
            'warung-seafood-pelawan' => [
                'makanan' => [
                    ['Ikan Asam Pedas', 40000],
                    ['Udang Goreng Tepung', 35000],
                    ['Cumi Bakar', 38000],
                    ['Kepiting Pedas', 60000],
                    ['Mie Goreng Seafood', 26000],
                    ['Nasi Ayam Crispy', 22000],
                    ['Bakso Seafood', 24000],
                    ['Sosis Bakar Jumbo', 18000],
                ],
                'minuman' => [
                    ['Es Teh Tarik', 12000],
                    ['Jus Melon', 14000],
                    ['Jus Semangka', 14000],
                    ['Es Cappuccino', 16000],
                    ['Kopi Hitam', 8000],
                    ['Es Milo', 10000],
                    ['Kelapa Jeruk', 15000],
                    ['Air Mineral', 5000],
                ],
            ],
            'kedai-minuman-pantai' => [
                'makanan' => [
                    ['Kentang Goreng', 15000],
                    ['Pisang Goreng', 12000],
                    ['Roti Bakar Coklat', 14000],
                    ['Burger Mini', 20000],
                    ['Nugget Kentang', 18000],
                    ['Mie Rebus', 16000],
                    ['Sosis Bakar', 12000],
                    ['Bakso Kuah', 18000],
                ],
                'minuman' => [
                    ['Es Kopi Susu', 15000],
                    ['Milkshake Strawberry', 18000],
                    ['Milkshake Vanilla', 18000],
                    ['Jus Alpukat', 15000],
                    ['Es Thai Tea', 14000],
                    ['Lemon Tea', 10000],
                    ['Es Matcha', 18000],
                    ['Es Coklat', 12000],
                ],
            ],
            'warung-keluarga-pesisir' => [
                'makanan' => [
                    ['Ayam Penyet', 22000],
                    ['Nasi Rendang', 28000],
                    ['Soto Ayam', 18000],
                    ['Mie Ayam', 16000],
                    ['Nasi Goreng Kampung', 20000],
                    ['Ayam Geprek', 22000],
                    ['Lele Goreng', 18000],
                    ['Ikan Goreng Sambal', 24000],
                ],
                'minuman' => [
                    ['Teh Tarik', 10000],
                    ['Jus Jeruk', 12000],
                    ['Es Milo', 10000],
                    ['Es Cappuccino', 15000],
                    ['Kopi Susu', 12000],
                    ['Jus Mangga', 15000],
                    ['Kelapa Muda', 12000],
                    ['Air Mineral', 5000],
                ],
            ],
            'pondok-jajanan-pelawan' => [
                'makanan' => [
                    ['Bakso Kuah', 18000],
                    ['Sosis Bakar', 12000],
                    ['Kentang Goreng', 15000],
                    ['Pisang Coklat', 14000],
                    ['Roti Bakar', 16000],
                    ['Nugget Crispy', 15000],
                    ['Mie Pedas', 17000],
                    ['Burger Mini', 20000],
                ],
                'minuman' => [
                    ['Es Kopi Susu', 15000],
                    ['Es Teh Manis', 6000],
                    ['Jus Alpukat', 15000],
                    ['Kelapa Muda', 12000],
                    ['Milkshake Oreo', 18000],
                    ['Es Matcha', 18000],
                    ['Lemon Tea', 10000],
                    ['Es Coklat', 12000],
                ],
            ],
        ];

        foreach ($menus as $slug => $kategoriMenus) {
            $warung = WarungKuliner::where('slug', $slug)->first();

            if (!$warung) {
                continue;
            }

            foreach ($kategoriMenus as $kategori => $items) {
                foreach ($items as $index => $item) {
                    MenuKuliner::firstOrCreate(
                        [
                            'warung_kuliner_id' => $warung->id,
                            'nama_menu' => $item[0],
                        ],
                        [
                            'harga' => $item[1],
                            'deskripsi' => 'Menu tersedia di ' . $warung->nama,
                            'kategori' => $kategori,
                            'status' => 'aktif',
                            'gambar' => $index % 2 == 0 ? 'images/profil_pantai.jpg' : 'images/hero-pantai.jpg',
                        ]
                    );
                }
            }
        }
    }

    public function updatePage(Request $request)
    {
        $kulinerPage = KulinerPage::firstOrCreate([]);

        $kulinerPage->update($request->only([
            'hero_judul',
            'hero_subjudul',
            'section_label',
            'section_judul',
            'section_deskripsi',
        ]));

        return back()->with('success', 'Konten halaman kuliner berhasil diperbarui.');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'badge' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gambar_2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gambar_3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['slug'] = Str::slug($request->nama) . '-' . time();

        foreach (['gambar', 'gambar_2', 'gambar_3'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('kuliner/warung', 'public');
            }
        }

        WarungKuliner::create($data);

        return back()->with('success', 'Warung kuliner berhasil ditambahkan.');
    }

   public function update(Request $request, $id)
{
    $warung = WarungKuliner::findOrFail($id);

    $data = $request->validate([
        'nama' => 'required|string|max:255',
        'badge' => 'nullable|string|max:255',
        'kategori' => 'nullable|string|max:255',
        'deskripsi' => 'nullable|string',
        'alamat' => 'nullable|string',
        'status' => 'required|in:aktif,nonaktif',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'gambar_2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'gambar_3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($warung->nama !== $request->nama) {
        $data['slug'] = Str::slug($request->nama) . '-' . $warung->id;
    }

    foreach (['gambar', 'gambar_2', 'gambar_3'] as $field) {
        if ($request->hasFile($field)) {
            if (
                $warung->$field &&
                !str_starts_with($warung->$field, 'images/') &&
                Storage::disk('public')->exists($warung->$field)
            ) {
                Storage::disk('public')->delete($warung->$field);
            }

            $data[$field] = $request->file($field)->store('kuliner/warung', 'public');
        }
    }

    $warung->update($data);

    return redirect()->route('admin.kuliner.index')
        ->with('success', 'Warung kuliner berhasil diperbarui.');
}

  public function destroy($id)
{
    $warung = WarungKuliner::findOrFail($id);

    $warung->status = 'nonaktif';
    $warung->save();

    return redirect()->route('admin.kuliner.index')
        ->with('success', 'Warung berhasil dihapus.');
}

   public function storeMenu(Request $request, $id)
{
    $warung = WarungKuliner::findOrFail($id);

    $data = $request->validate([
        'nama_menu' => 'required|string|max:255',
        'harga' => 'nullable|numeric',
        'deskripsi' => 'nullable|string',
        'kategori' => 'required|in:makanan,minuman',
        'status' => 'required|in:aktif,nonaktif',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $data['warung_kuliner_id'] = $warung->id;

    if ($request->hasFile('gambar')) {
        $data['gambar'] = $request->file('gambar')->store('kuliner/menu', 'public');
    } else {
        $data['gambar'] = 'images/hero-pantai.jpg';
    }

    MenuKuliner::create($data);

   return redirect()
    ->route('admin.kuliner.index')
    ->with('success', 'Menu berhasil ditambahkan.')
    ->with('open_menu_modal', $warung->id);
}

public function updateMenu(Request $request, MenuKuliner $menu)
{
    $data = $request->validate([
        'nama_menu' => 'required|string|max:255',
        'harga' => 'nullable|numeric',
        'deskripsi' => 'nullable|string',
        'kategori' => 'required|in:makanan,minuman',
        'status' => 'required|in:aktif,nonaktif',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($request->hasFile('gambar')) {
        if (
            $menu->gambar &&
            !str_starts_with($menu->gambar, 'images/') &&
            Storage::disk('public')->exists($menu->gambar)
        ) {
            Storage::disk('public')->delete($menu->gambar);
        }

        $data['gambar'] = $request->file('gambar')->store('kuliner/menu', 'public');
    }

    $menu->update($data);
  return redirect()
    ->route('admin.kuliner.index')
    ->with('success', 'Menu berhasil diperbarui.')
    ->with('open_menu_modal', $menu->warung_kuliner_id);
}

  


    public function destroyMenu(MenuKuliner $menu)
    {
        if (
            $menu->gambar &&
            !str_starts_with($menu->gambar, 'images/') &&
            Storage::disk('public')->exists($menu->gambar)
        ) {
            Storage::disk('public')->delete($menu->gambar);
        }

        $menu->delete();

        return back()->with('success', 'Menu berhasil dihapus.');
    }

    public function resetMenuKuliner()
    {
        $this->seedDefaultWarungs();

        MenuKuliner::truncate();

        $this->seedDefaultMenus();

        return redirect()->route('admin.kuliner.index')
            ->with('success', 'Semua menu makanan dan minuman berhasil dimasukkan ulang.');
    }
}