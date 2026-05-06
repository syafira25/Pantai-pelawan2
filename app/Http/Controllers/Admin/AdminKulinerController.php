<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KulinerPage;
use App\Models\MenuKuliner;
use App\Models\WarungKuliner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminKulinerController extends Controller
{
    public function index()
    {
        $kulinerPage = KulinerPage::first();

        if (!$kulinerPage) {
            $kulinerPage = KulinerPage::create($this->defaultPageData());
        }

        $warungs = WarungKuliner::with('menus')
            ->latest()
            ->get();

        return view('admin.kuliner.index', compact('kulinerPage', 'warungs'));
    }

    public function updatePage(Request $request)
    {
        $kulinerPage = KulinerPage::first();

        if (!$kulinerPage) {
            $kulinerPage = new KulinerPage();
        }

        $data = $request->except([
            '_token',
            '_method',
        ]);

        $kulinerPage->fill($data);
        $kulinerPage->save();

        return back()->with('success', 'Konten halaman kuliner berhasil diperbarui.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'badge' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'gambar_2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'gambar_3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status' => 'nullable|string',
        ]);

        $data = $request->except([
            '_token',
            'gambar',
            'gambar_2',
            'gambar_3',
        ]);

        $data['slug'] = Str::slug($request->nama) . '-' . time();
        $data['status'] = $request->status ?? 'aktif';

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('kuliner', 'public');
            $data['gambar'] = 'storage/' . $path;
        }

        if ($request->hasFile('gambar_2')) {
            $path = $request->file('gambar_2')->store('kuliner', 'public');
            $data['gambar_2'] = 'storage/' . $path;
        }

        if ($request->hasFile('gambar_3')) {
            $path = $request->file('gambar_3')->store('kuliner', 'public');
            $data['gambar_3'] = 'storage/' . $path;
        }

        WarungKuliner::create($data);

        return back()->with('success', 'Warung kuliner berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $warung = WarungKuliner::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'badge' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'gambar_2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'gambar_3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status' => 'nullable|string',
        ]);

        $data = $request->except([
            '_token',
            '_method',
            'gambar',
            'gambar_2',
            'gambar_3',
        ]);

        if ($request->nama !== $warung->nama) {
            $data['slug'] = Str::slug($request->nama) . '-' . time();
        }

        if ($request->hasFile('gambar')) {
            $this->deleteImage($warung->gambar);

            $path = $request->file('gambar')->store('kuliner', 'public');
            $data['gambar'] = 'storage/' . $path;
        }

        if ($request->hasFile('gambar_2')) {
            $this->deleteImage($warung->gambar_2);

            $path = $request->file('gambar_2')->store('kuliner', 'public');
            $data['gambar_2'] = 'storage/' . $path;
        }

        if ($request->hasFile('gambar_3')) {
            $this->deleteImage($warung->gambar_3);

            $path = $request->file('gambar_3')->store('kuliner', 'public');
            $data['gambar_3'] = 'storage/' . $path;
        }

        $warung->update($data);

        return back()->with('success', 'Warung kuliner berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $warung = WarungKuliner::findOrFail($id);

        $this->deleteImage($warung->gambar);
        $this->deleteImage($warung->gambar_2);
        $this->deleteImage($warung->gambar_3);

        $warung->delete();

        return back()->with('success', 'Warung kuliner berhasil dihapus.');
    }

    public function storeMenu(Request $request, $warungId)
    {
        $warung = WarungKuliner::findOrFail($warungId);

        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'nullable|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status' => 'nullable|string',
        ]);

        $data = $request->except([
            '_token',
            'gambar',
        ]);

        $data['warung_kuliner_id'] = $warung->id;
        $data['status'] = $request->status ?? 'aktif';

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('menu-kuliner', 'public');
            $data['gambar'] = 'storage/' . $path;
        }

        MenuKuliner::create($data);

        return back()->with('success', 'Menu kuliner berhasil ditambahkan.');
    }

    public function destroyMenu($id)
    {
        $menu = MenuKuliner::findOrFail($id);

        $this->deleteImage($menu->gambar);

        $menu->delete();

        return back()->with('success', 'Menu kuliner berhasil dihapus.');
    }

    private function deleteImage($path)
    {
        if ($path && str_starts_with($path, 'storage/')) {
            $oldPath = str_replace('storage/', '', $path);
            Storage::disk('public')->delete($oldPath);
        }
    }

    private function defaultPageData()
    {
        return [
            'hero_judul' => 'Wisata Kuliner Pantai Pelawan',
            'hero_subjudul' => 'Temukan pilihan warung makan di sekitar Pantai Pelawan, lengkap dengan informasi menu, harga, foto makanan, dan lokasi warung.',
            'section_label' => 'Kuliner Sekitar Pantai',
            'section_judul' => 'Rekomendasi Warung Kuliner',
            'section_deskripsi' => 'Pilih warung yang ingin kamu lihat untuk mengetahui daftar menu, harga, foto makanan, dan alamat warung di sekitar Pantai Pelawan.',
        ];
    }
}