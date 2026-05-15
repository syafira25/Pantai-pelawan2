<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CatatanPengelola;
use Illuminate\Http\Request;

class AdminCatatanPengelolaController extends Controller
{
    public function index()
    {
        $catatans = CatatanPengelola::with('user')
            ->latest()
            ->get();

        return view('admin.catatan-pengelola.index', compact('catatans'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:baru,diproses,selesai',
        ]);

        $catatan = CatatanPengelola::findOrFail($id);

        $catatan->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status berhasil diupdate.');
    }

    public function destroy($id)
    {
        $catatan = CatatanPengelola::findOrFail($id);
        $catatan->delete();

        return back()->with('success', 'Catatan berhasil dihapus.');
    }
}