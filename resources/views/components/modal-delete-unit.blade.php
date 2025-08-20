<div class="modal fade" id="deleteUnitModal{{ $unit->id }}" tabindex="-1" aria-labelledby="deleteUnitLabel{{ $unit->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-0 justify-content-center">
                <div class="text-center">
                    <i class="bi bi-exclamation-triangle-fill text-warning" style="font-size: 3rem;"></i>
                    <h5 class="mt-3 fw-bold text-dark">Konfirmasi Hapus</h5>
                </div>
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center">
                <p>Apakah Anda yakin ingin menghapus unit <strong>{{ $unit->nama_unit }}</strong> ({{ $unit->tahun }})?</p>
                <p class="text-danger small mb-0">Data yang dihapus tidak bisa dikembalikan.</p>
            </div>

            <div class="modal-footer border-0 justify-content-center pb-3">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('units.destroy', $unit->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger rounded-pill px-4 shadow-sm">
                        <i class="bi bi-trash me-1"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
