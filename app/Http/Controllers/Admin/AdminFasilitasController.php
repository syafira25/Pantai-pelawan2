<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FasilitasPage;
use App\Models\FasilitasItem;
use Illuminate\Http\Request;

class AdminFasilitasController extends Controller
{
    public function index()
    {
        $page = FasilitasPage::firstOrCreate([], [
            'hero_judul' => 'Fasilitas Pantai Pelawan',
            'hero_deskripsi' => 'Berbagai fasilitas tersedia untuk memberikan kenyamanan, keamanan, dan pengalaman wisata yang menyenangkan bagi pengunjung.',
            'utama_label' => 'Fasilitas Utama',
            'utama_judul' => 'Fasilitas yang Tersedia',
            'utama_deskripsi' => 'Pantai Pelawan menyediakan fasilitas penunjang agar wisatawan dapat berkunjung dengan lebih nyaman.',
            'pendukung_label' => 'Fasilitas Pendukung',
            'pendukung_judul' => 'Penunjang Pengalaman Wisata',
            'pendukung_deskripsi' => 'Fasilitas berikut membantu wisatawan menikmati kunjungan dengan lebih mudah dan nyaman.',
            'cta_label' => '🌴 Kenyamanan Pengunjung',
            'cta_judul' => 'Nyaman & Lengkap',
            'cta_deskripsi' => 'Dengan fasilitas yang tersedia, Pantai Pelawan siap memberikan pengalaman wisata yang lebih nyaman bagi setiap pengunjung.',
            'cta_tombol' => 'Pesan Tiket',
        ]);

        $utama = FasilitasItem::where('kategori', 'utama')
            ->orderBy('urutan', 'asc')
            ->get();

        $pendukung = FasilitasItem::where('kategori', 'pendukung')
            ->orderBy('urutan', 'asc')
            ->get();

        return view('admin.fasilitas.index', compact('page', 'utama', 'pendukung'));
    }

    public function updatePage(Request $request)
    {
        $page = FasilitasPage::firstOrCreate([]);

        $fields = [
            'hero_judul',
            'hero_deskripsi',
            'utama_label',
            'utama_judul',
            'utama_deskripsi',
            'pendukung_label',
            'pendukung_judul',
            'pendukung_deskripsi',
            'cta_label',
            'cta_judul',
            'cta_deskripsi',
            'cta_tombol',
        ];

        $data = [];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                $data[$field] = $request->input($field);
            }
        }

        $page->update($data);

        return redirect()
            ->route('admin.fasilitas.index')
            ->with('success', 'Konten halaman fasilitas berhasil diperbarui.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|in:utama,pendukung',
            'icon' => 'nullable|string|max:20',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'urutan' => 'nullable|integer',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        FasilitasItem::create([
            'kategori' => $request->kategori,
            'icon' => $request->icon,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'urutan' => $request->urutan ?? 0,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.fasilitas.index')
            ->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $item = FasilitasItem::findOrFail($id);

        $request->validate([
            'kategori' => 'required|in:utama,pendukung',
            'icon' => 'nullable|string|max:20',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'urutan' => 'nullable|integer',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $item->update([
            'kategori' => $request->kategori,
            'icon' => $request->icon,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'urutan' => $request->urutan ?? 0,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.fasilitas.index')
            ->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = FasilitasItem::findOrFail($id);
        $item->delete();

        return redirect()
            ->route('admin.fasilitas.index')
            ->with('success', 'Fasilitas berhasil dihapus.');
    }
}