<!-- Modal Edit Unit -->
<div class="modal fade" id="editUnitModal{{ $unit->id }}" tabindex="-1" aria-labelledby="editUnitModalLabel{{ $unit->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow-lg border-0 rounded-3">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title fw-bold" id="editUnitModalLabel{{ $unit->id }}">
          <i class="bi bi-pencil-square me-2"></i> Edit Unit - {{ $unit->nama_unit }}
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('units.update', $unit->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="modal-body p-4">
          <!-- Nama Unit -->
          <div class="mb-3">
            <label for="nama_unit{{ $unit->id }}" class="form-label">Nama Unit</label>
            <input 
              type="text" 
              class="form-control rounded-3" 
              id="nama_unit{{ $unit->id }}" 
              name="nama_unit" 
              value="{{ $unit->nama_unit }}" 
              required
            >
          </div>

          <!-- Tahun -->
          <div class="mb-3">
            <label for="tahun{{ $unit->id }}" class="form-label">Tahun</label>
            <select name="tahun" id="tahun{{ $unit->id }}" class="form-select rounded-3" required>
              <option value="">-- Pilih Tahun --</option>
              @php
                  $tahunSekarang = date('Y');
                  $tahunAwal = $tahunSekarang - 5; 
                  $tahunAkhir = $tahunSekarang + 5; 
              @endphp

              @for ($i = $tahunAwal; $i <= $tahunAkhir; $i++)
                <option value="{{ $i }}" {{ $unit->tahun == $i ? 'selected' : '' }}>
                  {{ $i }}
                </option>
              @endfor
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">
            <i class="bi bi-x-circle me-1"></i> Batal
          </button>
          <button type="submit" class="btn btn-warning rounded-3 text-dark">
            <i class="bi bi-save me-1"></i> Update
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
