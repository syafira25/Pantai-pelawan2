<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DayaTarik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminDayaTarikController extends Controller
{
    public function index()
{
    $dayaTarik = DayaTarik::first();

    if (!$dayaTarik) {
        $dayaTarik = DayaTarik::create($this->defaultData());
    } else {
        $defaults = $this->defaultData();

        foreach ($defaults as $key => $value) {
            if (
                is_null($dayaTarik->$key) ||
                $dayaTarik->$key === '' ||
                $dayaTarik->$key === 'null'
            ) {
                $dayaTarik->$key = $value;
            }
        }

        $dayaTarik->save();
    }

    return view('admin.daya-tarik.index', compact('dayaTarik'));
}

    public function update(Request $request)
    {
        $dayaTarik = DayaTarik::firstOrCreate([], $this->defaultData());

        $data = $request->except(['_token', '_method', 'highlight_gambar']);

        if ($request->hasFile('highlight_gambar')) {
            if ($dayaTarik->highlight_gambar && !str_starts_with($dayaTarik->highlight_gambar, 'images/') && Storage::disk('public')->exists($dayaTarik->highlight_gambar)) {
                Storage::disk('public')->delete($dayaTarik->highlight_gambar);
            }

            $data['highlight_gambar'] = $request->file('highlight_gambar')->store('daya-tarik', 'public');
        }

        $dayaTarik->update($data);

        return back()->with('success', 'Konten daya tarik berhasil diperbarui.');
    }

    private function defaultData()
    {
        return [
            'hero_judul' => 'Daya Tarik Pantai Pelawan',
            'hero_subjudul' => 'Beragam keindahan alam, suasana pantai, dan aktivitas menarik yang dapat dinikmati wisatawan di Pantai Pelawan.',

            'highlight_gambar' => 'images/profil_pantai.jpg',
            'highlight_badge_judul' => '🌴 Pantai Pelawan',
            'highlight_badge_subjudul' => 'Destinasi wisata alam Kabupaten Karimun',
            'highlight_label' => 'Keunggulan Wisata',
            'highlight_judul' => 'Pesona Alam Pantai Pelawan',
            'highlight_deskripsi' => 'Pantai Pelawan menghadirkan panorama pesisir yang memikat dengan hamparan pasir yang nyaman, angin laut yang sejuk, serta suasana alami yang cocok untuk melepas penat dari rutinitas sehari-hari.',

            'stat_1_icon' => '🌊',
            'stat_1_text' => 'Panorama Laut',
            'stat_1_deskripsi' => 'Nikmati pemandangan laut terbuka yang menenangkan dengan deburan ombak yang memberi kesan damai.',
            'stat_2_icon' => '🌅',
            'stat_2_text' => 'Sunset Menawan',
            'stat_2_deskripsi' => 'Keindahan langit senja di Pantai Pelawan menjadi momen favorit wisatawan untuk bersantai.',
            'stat_3_icon' => '🌴',
            'stat_3_text' => 'Nuansa Alami Pesisir',
            'stat_3_deskripsi' => 'Perpaduan pepohonan rindang dan suasana pantai menciptakan pengalaman wisata yang sejuk dan nyaman.',

            'nilai_label' => 'Nilai Destinasi',
            'nilai_judul' => 'Nilai dan Potensi Pantai Pelawan',
            'nilai_deskripsi' => 'Pantai Pelawan memiliki potensi wisata yang mampu menjadi daya tarik unggulan daerah, baik sebagai tempat rekreasi, media promosi wisata lokal, maupun destinasi yang terus berkembang.',

            'potensi_1_icon' => '🌿',
            'potensi_1_judul' => 'Potensi Wisata Alam',
            'potensi_1_deskripsi' => 'Keindahan alam pantai menjadi kekuatan utama yang mampu menarik minat wisatawan lokal maupun luar daerah.',
            'potensi_2_icon' => '📍',
            'potensi_2_judul' => 'Lokasi Strategis',
            'potensi_2_deskripsi' => 'Akses menuju Pantai Pelawan cukup mudah sehingga menjadikannya pilihan wisata yang praktis untuk dikunjungi.',
            'potensi_3_icon' => '📸',
            'potensi_3_judul' => 'Potensi Wisata Fotografi',
            'potensi_3_deskripsi' => 'Banyak sudut menarik yang cocok dijadikan spot dokumentasi dengan latar panorama alam yang indah.',
            'potensi_4_icon' => '🏝️',
            'potensi_4_judul' => 'Destinasi Rekreasi Daerah',
            'potensi_4_deskripsi' => 'Pantai Pelawan menjadi salah satu bagian dari potensi wisata Kabupaten Karimun yang memiliki nilai pengembangan jangka panjang.',

            'keunikan_label' => 'Keunikan Pantai',
            'keunikan_judul' => 'Keunikan Pantai Pelawan',
            'keunikan_deskripsi' => 'Pantai Pelawan memiliki karakter wisata yang khas melalui suasana alami, lingkungan yang nyaman, dan nuansa pesisir.',
            'keunikan_big_judul' => '🌊 Karakter Pantai yang Landai',
            'keunikan_big_deskripsi' => 'Pantai dengan area pesisir yang nyaman membuat pengunjung lebih leluasa untuk berjalan santai dan menikmati pemandangan.',
            'keunikan_1_icon' => '🌤️',
            'keunikan_1_judul' => 'Suasana Tenang',
            'keunikan_1_deskripsi' => 'Lingkungan pantai yang tidak terlalu padat memberikan kenyamanan bagi wisatawan.',
            'keunikan_2_icon' => '🍃',
            'keunikan_2_judul' => 'Udara Pesisir yang Menyegarkan',
            'keunikan_2_deskripsi' => 'Hembusan angin laut menghadirkan suasana rileks yang menyenangkan.',
            'keunikan_3_icon' => '🌴',
            'keunikan_3_judul' => 'Nuansa Alam yang Asri',
            'keunikan_3_deskripsi' => 'Kombinasi pantai, pepohonan, dan area terbuka menciptakan kesan alami.',
            'keunikan_4_icon' => '☀️',
            'keunikan_4_judul' => 'Cocok untuk Relaksasi',
            'keunikan_4_deskripsi' => 'Suasana yang santai menjadikan Pantai Pelawan tempat ideal untuk melepas penat.',

            'pengalaman_label' => 'Pengalaman Wisata',
            'pengalaman_judul' => 'Aktivitas Menarik di Pantai Pelawan',
            'pengalaman_deskripsi' => 'Pantai Pelawan tidak hanya menawarkan keindahan panorama, tetapi juga menghadirkan pengalaman wisata santai.',
            'pengalaman_1_icon' => '🌅',
            'pengalaman_1_judul' => 'Menikmati Suasana Sore',
            'pengalaman_1_deskripsi' => 'Langit senja yang indah dan suasana pantai yang tenang menciptakan pengalaman bersantai.',
            'pengalaman_2_icon' => '🚶',
            'pengalaman_2_judul' => 'Berjalan Santai di Pesisir',
            'pengalaman_2_deskripsi' => 'Menyusuri tepian pantai sambil menikmati angin laut menjadi aktivitas sederhana yang menyenangkan.',
            'pengalaman_3_icon' => '👨‍👩‍👧',
            'pengalaman_3_judul' => 'Wisata Keluarga',
            'pengalaman_3_deskripsi' => 'Area yang terbuka dan nyaman membuat Pantai Pelawan cocok untuk rekreasi ringan bersama keluarga.',
            'pengalaman_4_icon' => '📷',
            'pengalaman_4_judul' => 'Eksplorasi Sudut Pantai',
            'pengalaman_4_deskripsi' => 'Setiap sudut Pantai Pelawan menawarkan latar menarik untuk berfoto dan mengabadikan momen.',

            'alam_label' => 'Karakter Alam',
            'alam_judul' => 'Daya Tarik Alam yang Menjadi Ciri Khas',
            'alam_deskripsi' => 'Pantai Pelawan memiliki karakter alam yang kuat sebagai identitas wisata, menghadirkan suasana pesisir yang alami.',
            'alam_1_judul' => '🌊 Nuansa Pesisir',
            'alam_1_deskripsi' => 'Deburan ombak dan angin laut menghadirkan suasana santai.',
            'alam_2_judul' => '🌴 Lanskap Alami',
            'alam_2_deskripsi' => 'Perpaduan pasir pantai, pepohonan, dan garis laut menciptakan panorama harmonis.',
            'alam_3_judul' => '✨ Suasana Terbuka',
            'alam_3_deskripsi' => 'Area pantai yang luas memberi ruang nyaman untuk aktivitas santai.',
            'alam_card_label' => 'Destinasi Alam',
            'alam_card_judul' => 'Pantai yang Cocok untuk Relaksasi',
            'alam_card_deskripsi' => 'Pantai Pelawan menawarkan suasana wisata yang nyaman bagi pengunjung yang ingin beristirahat.',

            'alasan_label' => 'Alasan Berkunjung',
            'alasan_judul' => 'Mengapa Pantai Pelawan Menarik Dikunjungi?',
            'alasan_deskripsi' => 'Pantai Pelawan menghadirkan pengalaman wisata yang sederhana namun berkesan.',
            'alasan_1_nomor' => '01',
            'alasan_1_judul' => 'Suasana Lebih Tenang',
            'alasan_1_deskripsi' => 'Cocok bagi pengunjung yang ingin menikmati pantai dengan suasana yang tidak terlalu ramai.',
            'alasan_2_nomor' => '02',
            'alasan_2_judul' => 'Cocok untuk Kunjungan Singkat',
            'alasan_2_deskripsi' => 'Menjadi pilihan ideal untuk melepas penat sejenak.',
            'alasan_3_nomor' => '03',
            'alasan_3_judul' => 'Memiliki Nilai Wisata Lokal',
            'alasan_3_deskripsi' => 'Pantai Pelawan memiliki potensi untuk terus berkembang sebagai ikon wisata daerah.',

            'cta_label' => '🌴 Ayo Berkunjung',
            'cta_judul' => 'Yuk Kunjungi Pantai Pelawan!',
            'cta_deskripsi' => 'Nikmati keindahan alam, aktivitas menarik, dan suasana pantai yang menenangkan.',
            'cta_tombol_text' => 'Hubungi Kami',
        ];
    }
}