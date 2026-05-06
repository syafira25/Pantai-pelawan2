<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DayaTarik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminDayaTarikController extends Controller
{
    public function edit()
    {
        $dayaTarik = DayaTarik::first();

        if (!$dayaTarik) {
            $dayaTarik = DayaTarik::create($this->defaultData());
        }

        return view('admin.daya-tarik.edit', compact('dayaTarik'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'highlight_gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $dayaTarik = DayaTarik::first();

        if (!$dayaTarik) {
            $dayaTarik = new DayaTarik();
        }

        $data = $request->except([
            '_token',
            '_method',
            'highlight_gambar',
        ]);

        if ($request->hasFile('highlight_gambar')) {

            if (
                $dayaTarik->highlight_gambar &&
                str_starts_with($dayaTarik->highlight_gambar, 'storage/')
            ) {

                $oldPath = str_replace(
                    'storage/',
                    '',
                    $dayaTarik->highlight_gambar
                );

                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('highlight_gambar')
                ->store('daya-tarik', 'public');

            $data['highlight_gambar'] = 'storage/' . $path;
        }

        $dayaTarik->fill($data);
        $dayaTarik->save();

        return back()->with(
            'success',
            'Konten Daya Tarik berhasil diperbarui.'
        );
    }

    private function defaultData()
    {
        return [

            'hero_judul' =>
                'Daya Tarik Pantai Pelawan',

            'hero_subjudul' =>
                'Beragam keindahan alam, suasana pantai, dan aktivitas menarik yang dapat dinikmati wisatawan di Pantai Pelawan.',

            'highlight_label' =>
                'Keunggulan Wisata',

            'highlight_judul' =>
                'Pesona Alam Pantai Pelawan',

            'highlight_deskripsi' =>
                'Pantai Pelawan memiliki panorama alam yang indah dengan suasana pesisir yang nyaman.',

            'nilai_label' =>
                'Nilai Destinasi',

            'nilai_judul' =>
                'Nilai dan Potensi Pantai Pelawan',

            'nilai_deskripsi' =>
                'Pantai Pelawan memiliki nilai destinasi yang dapat mendukung pengembangan pariwisata daerah.',

            'keunikan_label' =>
                'Keunikan Pantai',

            'keunikan_judul' =>
                'Keunikan Pantai Pelawan',

            'keunikan_deskripsi' =>
                'Keunikan Pantai Pelawan terletak pada karakter pantai dan suasana alamnya.',

            'keunikan_big_judul' =>
                '🌊 Karakter Pantai yang Landai',

            'keunikan_big_deskripsi' =>
                'Pantai Pelawan memiliki karakter pantai yang nyaman untuk dinikmati oleh berbagai kalangan pengunjung.',

            'cta_label' =>
                '🌴 Ayo Berkunjung',

            'cta_judul' =>
                'Yuk Kunjungi Pantai Pelawan!',

            'cta_deskripsi' =>
                'Nikmati keindahan alam, aktivitas menarik, dan suasana pantai yang menenangkan.',

            'cta_tombol_text' =>
                'Hubungi Kami',
        ];
    }
}