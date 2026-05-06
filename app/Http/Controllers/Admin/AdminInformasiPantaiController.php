<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InformasiPantai;
use Illuminate\Http\Request;

class AdminInformasiPantaiController extends Controller
{
    public function edit()
    {
        $informasi = InformasiPantai::first();

        if (!$informasi) {
            $informasi = InformasiPantai::create($this->defaultData());
        }

        return view('admin.informasi.edit', compact('informasi'));
    }

    public function update(Request $request)
    {
        $informasi = InformasiPantai::first();

        if (!$informasi) {
            $informasi = new InformasiPantai();
        }

        $data = $request->except([
            '_token',
            '_method',
        ]);

        $informasi->fill($data);
        $informasi->save();

        return back()->with('success', 'Konten Informasi Pantai berhasil diperbarui.');
    }

    private function defaultData()
    {
        return [
            'header_judul' => 'Informasi Pantai Pelawan',
            'header_subjudul' => 'Informasi penting yang perlu diketahui sebelum berkunjung ke Pantai Pelawan.',

            'umum_judul' => 'Informasi Umum',
            'umum_deskripsi' => 'Informasi dasar yang perlu diketahui wisatawan sebelum berkunjung ke Pantai Pelawan.',

            'umum_1_icon' => '📍',
            'umum_1_judul' => 'Lokasi Pantai',
            'umum_1_deskripsi' => 'Pantai Pelawan terletak di Desa Pangke Barat, Kabupaten Karimun, Provinsi Kepulauan Riau. Lokasinya strategis dan mudah dijangkau oleh wisatawan lokal maupun luar daerah, dengan akses jalan yang cukup baik menuju kawasan wisata.',

            'umum_2_icon' => '🕒',
            'umum_2_judul' => 'Jam Operasional',
            'umum_2_deskripsi' => "Senin – Jumat: 06.00 – 18.00 WIB\nSabtu – Minggu: 06.00 – 19.00 WIB\nWaktu terbaik untuk berkunjung adalah pada pagi dan sore hari untuk menikmati suasana pantai yang lebih nyaman.",

            'umum_3_icon' => '🎫',
            'umum_3_judul' => 'Tiket Masuk',
            'umum_3_deskripsi' => "Harga tiket masuk terjangkau dan dapat berubah sesuai kebijakan pengelola.\nDewasa = Rp5.000\nDibawah umur 10 tahun = Rp2.000",

            'umum_4_icon' => '🚗',
            'umum_4_judul' => 'Akses Transportasi',
            'umum_4_deskripsi' => 'Lokasi pantai dapat dijangkau menggunakan kendaraan pribadi maupun transportasi umum. Area parkir tersedia untuk kendaraan roda dua, roda empat, serta kendaraan wisata rombongan.',

            'keamanan_judul' => 'Keamanan & Keselamatan',
            'keamanan_deskripsi' => 'Hal-hal penting yang perlu diperhatikan agar wisata tetap aman dan nyaman.',

            'keamanan_1_icon' => '🌊',
            'keamanan_1_judul' => 'Kondisi Ombak',
            'keamanan_1_deskripsi' => 'Ombak relatif tenang, namun pengunjung tetap disarankan berhati-hati saat bermain air.',

            'keamanan_2_icon' => '⚠️',
            'keamanan_2_judul' => 'Cuaca Ekstrem',
            'keamanan_2_deskripsi' => 'Jika terjadi angin kencang atau gelombang tinggi, pengunjung sebaiknya tidak berenang.',

            'keamanan_3_icon' => '👮',
            'keamanan_3_judul' => 'Petugas Pantai',
            'keamanan_3_deskripsi' => 'Petugas dapat memberikan informasi dan arahan kepada pengunjung saat berada di area wisata.',

            'keamanan_4_icon' => '🚫',
            'keamanan_4_judul' => 'Aturan Pengunjung',
            'keamanan_4_deskripsi' => 'Pengunjung wajib menjaga kebersihan, ketertiban, dan tidak merusak fasilitas yang tersedia.',

            'tips_judul' => 'Tips Berkunjung',
            'tips_deskripsi' => 'Beberapa tips agar pengalaman wisata di Pantai Pelawan lebih maksimal.',

            'tips_1_nomor' => '01',
            'tips_1_icon' => '🌅',
            'tips_1_judul' => 'Waktu Terbaik Berkunjung',
            'tips_1_deskripsi' => 'Datang di sore hari untuk menikmati suasana pantai dan pemandangan sunset.',

            'tips_2_nomor' => '02',
            'tips_2_icon' => '👕',
            'tips_2_judul' => 'Pakaian Nyaman',
            'tips_2_deskripsi' => 'Gunakan pakaian yang nyaman agar aktivitas di area pantai lebih menyenangkan.',

            'tips_3_nomor' => '03',
            'tips_3_icon' => '🧴',
            'tips_3_judul' => 'Perlengkapan Pribadi',
            'tips_3_deskripsi' => 'Bawa sunscreen, air minum, dan perlengkapan lain untuk kenyamanan.',

            'tips_4_nomor' => '04',
            'tips_4_icon' => '🗑️',
            'tips_4_judul' => 'Jaga Kebersihan',
            'tips_4_deskripsi' => 'Tidak membuang sampah sembarangan agar lingkungan pantai tetap bersih.',

            'tips_5_nomor' => '05',
            'tips_5_icon' => '⚠️',
            'tips_5_judul' => 'Perhatikan Cuaca',
            'tips_5_deskripsi' => 'Perhatikan kondisi cuaca sebelum bermain air untuk keselamatan.',

            'tips_6_nomor' => '06',
            'tips_6_icon' => '📢',
            'tips_6_judul' => 'Ikuti Arahan',
            'tips_6_deskripsi' => 'Ikuti arahan petugas demi keselamatan dan kenyamanan bersama.',

            'kontak_label' => 'Kontak',
            'kontak_judul' => 'Kontak Pengelola',
            'kontak_deskripsi' => 'Hubungi pengelola Pantai Pelawan melalui WhatsApp dan media sosial.',

            'whatsapp_link' => 'https://wa.me/6285282770935?text=Halo%20saya%20ingin%20bertanya%20tentang%20Pantai%20Pelawan',
            'whatsapp_label' => 'Layanan Informasi',
            'whatsapp_judul' => 'WhatsApp',
            'whatsapp_deskripsi' => 'Hubungi pengelola untuk informasi tiket, fasilitas, kondisi pantai, dan layanan wisata.',
            'whatsapp_tombol' => 'Chat Sekarang',

            'instagram_link' => 'https://www.instagram.com/r.syfira_?igsh=MXJ5ejBvbnFvNjBobg==',
            'instagram_label' => 'Media Promosi',
            'instagram_judul' => 'Instagram',
            'instagram_deskripsi' => 'Lihat dokumentasi, informasi terbaru, dan aktivitas wisata Pantai Pelawan.',
            'instagram_tombol' => 'Kunjungi Instagram',

            'tiktok_link' => 'https://www.tiktok.com/@raaaaajz?_r=1&_t=ZS-95o7KMxW2J0',
            'tiktok_label' => 'Video Wisata',
            'tiktok_judul' => 'TikTok',
            'tiktok_deskripsi' => 'Tonton video singkat tentang suasana, daya tarik, dan pengalaman wisata.',
            'tiktok_tombol' => 'Kunjungi TikTok',

            'map_label' => 'Lokasi',
            'map_judul' => 'Lokasi Pantai Pelawan',
            'map_deskripsi' => 'Temukan lokasi Pantai Pelawan secara langsung melalui Google Maps.',
            'map_embed_url' => 'https://www.google.com/maps?q=Pantai+Pelawan&output=embed',
            'map_link' => 'https://maps.app.goo.gl/2tJ9cM3Yuk1bNfTr7',
            'map_tombol' => 'Lihat di Google Maps',

            'cta_label' => '🌴 Informasi Kunjungan',
            'cta_judul' => 'Siap Liburan ke Pantai Pelawan?',
            'cta_deskripsi' => 'Pastikan kamu sudah mengetahui informasi penting agar perjalanan wisata menjadi lebih aman, nyaman, dan menyenangkan.',
            'cta_tombol' => 'Pesan Tiket',
        ];
    }
}