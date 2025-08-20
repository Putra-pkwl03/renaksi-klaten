<!-- Modal Tambah Kategori -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow-lg border-0 rounded-3">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title fw-bold" id="addCategoryModalLabel">
          <i class="bi bi-tags-fill me-2"></i> Tambah Kategori
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="modal-body p-4">
          
          {{-- Nama Kategori --}}
          <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input 
              type="text" 
              id="nama_kategori" 
              name="nama_kategori" 
              class="form-control rounded-3 @error('nama_kategori') is-invalid @enderror"
              value="{{ old('nama_kategori') }}" 
              placeholder="Masukkan nama kategori" 
              required
            >
            @error('nama_kategori')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          {{-- Unit --}}
          <div class="mb-3">
            <label for="unit_id" class="form-label">Unit</label>
            <select 
              id="unit_id" 
              name="unit_id" 
              class="form-select rounded-3 @error('unit_id') is-invalid @enderror" 
              required
            >
              <option value="">-- Pilih Unit --</option>
              @foreach(App\Models\Unit::all() as $unit)
                <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>
                  {{ $unit->nama_unit }}
                </option>
              @endforeach
            </select>
            @error('unit_id')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">
            <i class="bi bi-x-circle me-1"></i> Batal
          </button>
          <button type="submit" class="btn btn-primary rounded-3">
            <i class="bi bi-save me-1"></i> Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
