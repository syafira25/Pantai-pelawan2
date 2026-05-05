@extends('admin.layouts.app')

@section('title', 'Kelola User')

@section('content')
<div class="admin-content-wrap">

    <div class="admin-page-header">
        <h1>Kelola User</h1>
        <p>Daftar semua pengguna yang terdaftar di sistem.</p>
    </div>

    @if(session('success'))
        <div class="admin-alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-card">
        <div class="admin-table-wrap">
            <table class="admin-table user-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Register</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td class="fw-semibold">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="role-badge {{ $user->role == 'admin' ? 'role-admin' : 'role-user' }}">
                                    {{ strtoupper($user->role) }}
                                </span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}</td>
                            <td>
                                @if(auth()->id() != $user->id)
                                    <div class="action-group">
                                        <form action="{{ route('admin.users.updateRole', $user->id) }}" method="POST" class="role-form">
                                            @csrf
                                            @method('PATCH')

                                            <select name="role" class="role-select">
                                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                            </select>

                                            <button type="submit" class="btn-action btn-save">
                                                Simpan
                                            </button>
                                        </form>

                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn-action btn-delete">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <span class="self-account-note">Akun Anda</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty-data">Belum ada data user.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection