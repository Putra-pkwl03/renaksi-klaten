<div class="border-0 shadow-lg card rounded-4">
    <div class="py-3 text-white card-header bg-primary rounded-top-4">
        <h5 class="mb-0">
            {{ isset($laporan->id) ? 'Edit Laporan Renaksi' : 'Tambah Laporan Renaksi' }}
        </h5>
    </div>
    <div class="p-4 card-body">
        <form action="{{ isset($laporan->id) ? route('laporan-renaksi.update', $laporan->id) : route('laporan-renaksi.store') }}" method="POST">
            @csrf
            @if(isset($laporan->id))
                @method('PUT')
            @endif

            <div class="row g-3">
                {{-- Unit --}}
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Unit <span class="text-danger">*</span></label>
                    <select name="unit_id" class="shadow-sm form-select" required>
                        <option value="">-- Pilih Unit --</option>
                        @foreach($units as $unit)
                            <option value="{{ $unit->id }}"
                                {{ old('unit_id', $laporan->unit_id ?? '') == $unit->id ? 'selected' : '' }}>
                                {{ $unit->nama_unit }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Kategori --}}
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                    <select id="kategoriSelect" name="kategori" class="shadow-sm form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}"
                                {{ old('kategori', $laporan->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Sasaran --}}
                <div class="col-md-5">
                    <label class="form-label fw-semibold">Sasaran</label>
                    <input type="text" name="sasaran" class="shadow-sm form-control"
                           value="{{ old('sasaran', $laporan->sasaran ?? '') }}" required>
                </div>

                {{-- Indikator --}}
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Indikator</label>
                    <input type="text" name="indikator" class="shadow-sm form-control"
                           value="{{ old('indikator', $laporan->indikator ?? '') }}">
                </div>
            </div>

            <hr class="my-4">

            {{-- Target TW --}}
            <div class="row g-3">
                @foreach (['1','2','3','4'] as $tw)
                    <div class="col-md-3">
                        <label class="form-label fw-semibold target-label" data-tw="{{ $tw }}">
                            Target TW {{ $tw }}
                        </label>
                        <input type="text" name="target_tw{{ $tw }}" class="shadow-sm form-control"
                               value="{{ old('target_tw'.$tw, $laporan->{'target_tw'.$tw} ?? '') }}">
                    </div>
                @endforeach
            </div>

            {{-- Realisasi TW --}}
            <div class="mt-2 row g-3">
                @foreach (['1','2','3','4'] as $tw)
                    <div class="col-md-3">
                        <label class="form-label fw-semibold realisasi-label" data-tw="{{ $tw }}">
                            Realisasi TW {{ $tw }}
                        </label>
                        <input type="text" name="realisasi_tw{{ $tw }}" class="shadow-sm form-control"
                               value="{{ old('realisasi_tw'.$tw, $laporan->{'realisasi_tw'.$tw} ?? '') }}">
                    </div>
                @endforeach
            </div>

            <hr class="my-4">

            {{-- Catatan & Tindak Lanjut --}}
            <div class="mt-3">
                <label class="form-label fw-semibold">Catatan Hasil Monitoring</label>
                <textarea name="catatan_hasil_monitoring" class="shadow-sm form-control" rows="2">{{ old('catatan_hasil_monitoring', $laporan->catatan_hasil_monitoring ?? '') }}</textarea>
            </div>

            <div class="mt-3">
                <label class="form-label fw-semibold">Tindak Lanjut</label>
                <textarea name="tindak_lanjut" class="shadow-sm form-control" rows="2">{{ old('tindak_lanjut', $laporan->tindak_lanjut ?? '') }}</textarea>
            </div>

            <div class="gap-2 mt-4 d-flex justify-content-end">
                <a href="{{ route('laporan-renaksi.index') }}" class="px-4 border shadow-sm btn btn-light">Batal</a>
                <button type="submit" class="px-4 shadow-sm btn btn-primary">
                    <i class="bi bi-save me-1"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const kategoriSelect = document.getElementById('kategoriSelect');
    const targetLabels = document.querySelectorAll('.target-label');
    const realisasiLabels = document.querySelectorAll('.realisasi-label');

    function updateLabels() {
        const kategori = kategoriSelect.value;
        const withPercent = !(kategori === 'A' || kategori === 'D');

        targetLabels.forEach(label => {
            const tw = label.dataset.tw;
            label.textContent = withPercent ? `Target TW ${tw} (%)` : `Target TW ${tw}`;
        });

        realisasiLabels.forEach(label => {
            const tw = label.dataset.tw;
            label.textContent = withPercent ? `Realisasi TW ${tw} (%)` : `Realisasi TW ${tw}`;
        });
    }

    kategoriSelect.addEventListener('change', updateLabels);
    updateLabels();
});
</script>
