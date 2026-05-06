<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ulasan;

class AdminUlasanController extends Controller
{
    public function index()
    {
        $ulasans = Ulasan::latest()->get();

        return view('admin.ulasan.index', compact('ulasans'));
    }

    public function setujui($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->status = 'disetujui';
        $ulasan->save();

        return back()->with('success', 'Ulasan berhasil disetujui.');
    }

    public function sembunyikan($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->status = 'disembunyikan';
        $ulasan->save();

        return back()->with('success', 'Ulasan berhasil disembunyikan.');
    }

    public function destroy($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->delete();

        return back()->with('success', 'Ulasan berhasil dihapus.');
    }
}