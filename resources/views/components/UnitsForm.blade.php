<!-- Modal Tambah Unit -->
<div class="modal fade" id="addUnitModal" tabindex="-1" aria-labelledby="addUnitModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="shadow-lg modal-content">
            <div class="text-white modal-header" style="background-color:#5eb3fd;">
                <h5 class="modal-title" id="addUnitModalLabel">Tambah Unit</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('units.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama Unit</label>
                        <input type="text" name="nama_unit" class="form-control" value="{{ old('nama_unit') }}" required>
                        @error('nama_unit') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Tahun</label>
                        <input type="number" name="tahun" class="form-control" value="{{ old('tahun') }}" required>
                        @error('tahun') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>