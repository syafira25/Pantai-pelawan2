<div class="admin-beranda-actions">

    <button type="button" class="admin-edit-btn"
        onclick="openModal('modalEditBeranda{{ $item->id }}')">
        ✏️ Edit
    </button>

    <form action="{{ route('admin.beranda.destroy', $item->id) }}" method="POST"
          onsubmit="return confirm('Yakin ingin menghapus item ini?')">
        @csrf
        @method('DELETE')

        <button type="submit" class="admin-delete-btn">
            🗑 Hapus
        </button>
    </form>

</div>