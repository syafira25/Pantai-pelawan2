<div class="admin-beranda-actions">
    <button onclick="openModal('modalEditBeranda{{ $item->id }}')">✏️ Edit</button>

    <form action="{{ route('admin.beranda.destroy', $item->id) }}" method="POST"
          onsubmit="return confirm('Yakin ingin menghapus item ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="hapus-btn">🗑 Hapus</button>
    </form>
</div>