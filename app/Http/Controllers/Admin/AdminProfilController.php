<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilPantai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProfilController extends Controller
{
    public function edit()
    {
        $profil = ProfilPantai::first();

        if (!$profil) {
            $profil = ProfilPantai::create([
                'judul' => 'Profil Pantai Pelawan',
                'subjudul' => 'Destinasi wisata alam di Kabupaten Karimun',
                'deskripsi_utama' => 'Pantai Pelawan merupakan salah satu destinasi wisata alam yang berada di Kabupaten Karimun, Kepulauan Riau. Pantai ini memiliki suasana yang nyaman, pemandangan laut yang indah, serta cocok untuk rekreasi keluarga.',
                'deskripsi_tambahan' => 'Melalui website ini, wisatawan dapat memperoleh informasi mengenai profil pantai, daya tarik, fasilitas, galeri, kuliner sekitar, hingga layanan pemesanan tiket online.',
                'lokasi' => 'Desa Pangke Barat, Kabupaten Karimun, Kepulauan Riau',
                'jam_operasional' => '08.00 - 18.00 WIB',
                'harga_tiket' => 'Dewasa Rp5.000, Anak-anak Rp2.000',
                'gambar' => 'images/profil_pantai.jpg',
            ]);
        }

        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:150',
            'subjudul' => 'nullable|string|max:200',
            'deskripsi_utama' => 'required|string',
            'deskripsi_tambahan' => 'nullable|string',
            'lokasi' => 'nullable|string|max:255',
            'jam_operasional' => 'nullable|string|max:100',
            'harga_tiket' => 'nullable|string|max:150',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profil = ProfilPantai::first();

        if (!$profil) {
            $profil = new ProfilPantai();
        }

        $data = $request->only([
            'judul',
            'subjudul',
            'deskripsi_utama',
            'deskripsi_tambahan',
            'lokasi',
            'jam_operasional',
            'harga_tiket',
        ]);

        if ($request->hasFile('gambar')) {
            if ($profil->gambar && str_starts_with($profil->gambar, 'storage/')) {
                $oldPath = str_replace('storage/', '', $profil->gambar);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('gambar')->store('profil', 'public');
            $data['gambar'] = 'storage/' . $path;
        }

        $profil->fill($data);
        $profil->save();

        return back()->with('success', 'Profil Pantai berhasil diperbarui.');
    }
}