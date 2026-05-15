<?php

namespace App\Http\Controllers;

use App\Models\InformasiPantai;
use App\Models\Ulasan;
use Illuminate\Support\Facades\Http;

class InformasiPantaiController extends Controller
{
    public function index()
    {
        $informasi = InformasiPantai::first();

        $ulasans = Ulasan::where('status', 'disetujui')
            ->latest()
            ->get();

        $weather = $this->buildWeatherData('cerah_berawan');

        if ($informasi && $informasi->cuaca_mode === 'manual') {
            $manualKondisi = $informasi->manual_kondisi ?? 'cerah_berawan';
            $weather = $this->buildWeatherData($manualKondisi);
        } else {
            try {
                $response = Http::timeout(10)->get('https://api.openweathermap.org/data/2.5/weather', [
                    'lat' => env('PANTAI_PELAWAN_LAT'),
                    'lon' => env('PANTAI_PELAWAN_LON'),
                    'appid' => env('OPENWEATHER_API_KEY'),
                    'units' => 'metric',
                    'lang' => 'id',
                ]);

                if ($response->successful()) {
                    $data = $response->json();

                    $condition = strtolower($data['weather'][0]['description'] ?? '');
                    $main = strtolower($data['weather'][0]['main'] ?? '');
                    $wind = $data['wind']['speed'] ?? 0;

                    $weatherType = $this->detectWeatherType($condition, $main, $wind);
                    $weather = $this->buildWeatherData($weatherType);
                }
            } catch (\Exception $e) {
                $weather = $this->buildWeatherData('cerah_berawan');
            }
        }

        return view('informasi', compact('informasi', 'ulasans', 'weather'));
    }

    private function detectWeatherType($condition, $main, $wind = 0)
    {
        if (
            str_contains($main, 'thunderstorm') ||
            str_contains($condition, 'petir') ||
            str_contains($condition, 'badai')
        ) {
            return 'hujan_petir';
        }

        if (
            str_contains($main, 'rain') ||
            str_contains($main, 'drizzle') ||
            str_contains($condition, 'hujan')
        ) {
            return 'hujan';
        }

        if ($wind >= 8) {
            return 'angin_kencang';
        }

        if (
            str_contains($main, 'clouds') ||
            str_contains($condition, 'awan') ||
            str_contains($condition, 'mendung') ||
            str_contains($condition, 'berawan')
        ) {
            return 'berawan';
        }

        if (
            str_contains($main, 'clear') ||
            str_contains($condition, 'cerah')
        ) {
            return 'cerah';
        }

        return 'cerah_berawan';
    }

    private function buildWeatherData($type)
    {
        $data = [
            'cerah' => [
                'kondisi' => 'Cerah',
                'deskripsi' => 'Cuaca cerah dan cukup mendukung untuk aktivitas wisata di area pantai.',
                'ikon' => '☀️',
                'ombak' => 'Tenang',
                'ombak_deskripsi' => 'Informasi kondisi area perairan ditampilkan berdasarkan perkiraan cuaca terkini.',
                'angin' => 'Normal',
                'angin_deskripsi' => 'Informasi kondisi angin diperbarui berdasarkan data cuaca terkini.',
                'status' => 'Aman Dikunjungi',
                'status_deskripsi' => 'Status kunjungan merupakan informasi perkiraan berdasarkan kondisi cuaca saat ini.',
                'catatan_judul' => 'Cuaca Mendukung',
                'catatan' => 'Cuaca cerah. Tetap perhatikan kondisi sekitar saat beraktivitas di area pantai.',
            ],

            'cerah_berawan' => [
                'kondisi' => 'Cerah Berawan',
                'deskripsi' => 'Kondisi cuaca cukup baik untuk aktivitas wisata di area pantai.',
                'ikon' => '⛅',
                'ombak' => 'Relatif Tenang',
                'ombak_deskripsi' => 'Informasi kondisi area perairan ditampilkan berdasarkan perkiraan cuaca terkini.',
                'angin' => 'Normal',
                'angin_deskripsi' => 'Informasi kondisi angin diperbarui berdasarkan data cuaca terkini.',
                'status' => 'Aman Dikunjungi',
                'status_deskripsi' => 'Status kunjungan merupakan informasi perkiraan berdasarkan kondisi cuaca saat ini.',
                'catatan_judul' => 'Cuaca Mendukung',
                'catatan' => 'Cuaca cukup baik. Tetap pantau perubahan kondisi cuaca sebelum beraktivitas.',
            ],

            'berawan' => [
                'kondisi' => 'Berawan',
                'deskripsi' => 'Cuaca berawan, pengunjung tetap disarankan memperhatikan perubahan cuaca.',
                'ikon' => '☁️',
                'ombak' => 'Relatif Tenang',
                'ombak_deskripsi' => 'Informasi kondisi area perairan ditampilkan berdasarkan perkiraan cuaca terkini.',
                'angin' => 'Normal',
                'angin_deskripsi' => 'Informasi kondisi angin diperbarui berdasarkan data cuaca terkini.',
                'status' => 'Aman Dikunjungi',
                'status_deskripsi' => 'Status kunjungan merupakan informasi perkiraan berdasarkan kondisi cuaca saat ini.',
                'catatan_judul' => 'Waspada Ringan',
                'catatan' => 'Cuaca berawan, tetap pantau perubahan cuaca sewaktu-waktu.',
            ],

            'hujan' => [
                'kondisi' => 'Hujan',
                'deskripsi' => 'Sedang hujan, pengunjung disarankan berhati-hati saat berada di area pantai.',
                'ikon' => '🌧️',
                'ombak' => 'Perlu Perhatian',
                'ombak_deskripsi' => 'Informasi kondisi area perairan ditampilkan berdasarkan perkiraan cuaca terkini.',
                'angin' => 'Normal',
                'angin_deskripsi' => 'Informasi kondisi angin diperbarui berdasarkan data cuaca terkini.',
                'status' => 'Perlu Diperhatikan',
                'status_deskripsi' => 'Status kunjungan merupakan informasi perkiraan berdasarkan kondisi cuaca saat ini.',
                'catatan_judul' => 'Tetap Waspada',
                'catatan' => 'Sedang hujan. Pengunjung disarankan mengurangi aktivitas di area perairan.',
            ],

            'hujan_petir' => [
                'kondisi' => 'Hujan Disertai Petir',
                'deskripsi' => 'Sedang terjadi hujan disertai petir di sekitar area pantai.',
                'ikon' => '⛈️',
                'ombak' => 'Berbahaya',
                'ombak_deskripsi' => 'Informasi kondisi area perairan ditampilkan berdasarkan perkiraan cuaca terkini.',
                'angin' => 'Tidak Stabil',
                'angin_deskripsi' => 'Informasi kondisi angin diperbarui berdasarkan data cuaca terkini.',
                'status' => 'Tidak Disarankan',
                'status_deskripsi' => 'Status kunjungan merupakan informasi perkiraan berdasarkan kondisi cuaca saat ini.',
                'catatan_judul' => 'Bahaya Cuaca',
                'catatan' => 'Hujan disertai petir terdeteksi. Hindari aktivitas di area pantai dan perairan.',
            ],

            'angin_kencang' => [
                'kondisi' => 'Angin Kencang',
                'deskripsi' => 'Terpantau angin cukup kencang di area pantai.',
                'ikon' => '💨',
                'ombak' => 'Perlu Perhatian',
                'ombak_deskripsi' => 'Informasi kondisi area perairan ditampilkan berdasarkan perkiraan cuaca terkini.',
                'angin' => 'Kencang',
                'angin_deskripsi' => 'Informasi kondisi angin diperbarui berdasarkan data cuaca terkini.',
                'status' => 'Waspada',
                'status_deskripsi' => 'Status kunjungan merupakan informasi perkiraan berdasarkan kondisi cuaca saat ini.',
                'catatan_judul' => 'Angin Kencang',
                'catatan' => 'Angin cukup kencang terdeteksi. Batasi aktivitas di area perairan.',
            ],
        ];

        $weather = $data[$type] ?? $data['cerah_berawan'];

        $weather['scene_judul'] = 'Siap Berwisata Hari Ini?';
        $weather['scene_deskripsi'] = $weather['catatan'];

        return $weather;
    }
}