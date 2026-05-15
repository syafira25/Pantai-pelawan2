<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function updateRole(Request $request, $id)
    {
        $request->validate([
           'role' => 'required|in:user,admin,pengelola',
        ]);

        $user = User::findOrFail($id);

        if (auth()->id() == $user->id) {
            return back()->with('success', 'Role akun sendiri tidak dapat diubah.');
        }

        $user->role = $request->role;
        $user->save();

        return back()->with('success', 'Role user berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (auth()->id() == $user->id) {
            return back()->with('success', 'Akun sendiri tidak dapat dihapus.');
        }

        $user->delete();

        return back()->with('success', 'User berhasil dihapus.');
    }
}