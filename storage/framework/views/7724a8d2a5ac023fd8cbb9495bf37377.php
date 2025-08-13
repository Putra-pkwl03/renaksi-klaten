<div class="card shadow-lg border-0 rounded-4 mt-3">
    <div class="card-header bg-primary text-white rounded-top-4 py-3">
        <h5 class="mb-0">
            <?php echo e(isset($laporan->id) ? 'Edit Laporan Renaksi' : 'Tambah Laporan Renaksi'); ?>

        </h5>
    </div>
    <div class="card-body p-4">
        <form action="<?php echo e(isset($laporan->id) ? route('laporan-renaksi.update', $laporan->id) : route('laporan-renaksi.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php if(isset($laporan->id)): ?>
                <?php echo method_field('PUT'); ?>
            <?php endif; ?>

            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                    <select id="kategoriSelect" name="kategori" class="form-select shadow-sm" required>
                        <option value="">-- Pilih --</option>
                        <option value="A" <?php echo e(old('kategori', $laporan->kategori ?? '') == 'A' ? 'selected' : ''); ?>>Kinerja Sasaran</option>
                        <option value="B" <?php echo e(old('kategori', $laporan->kategori ?? '') == 'B' ? 'selected' : ''); ?>>Kinerja Program</option>
                        <option value="C" <?php echo e(old('kategori', $laporan->kategori ?? '') == 'C' ? 'selected' : ''); ?>>Kinerja Kegiatan</option>
                        <option value="D" <?php echo e(old('kategori', $laporan->kategori ?? '') == 'D' ? 'selected' : ''); ?>>Kinerja Sub Kegiatan</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <label class="form-label fw-semibold">Sasaran</label>
                    <input type="text" name="sasaran" class="form-control shadow-sm"
                           value="<?php echo e(old('sasaran', $laporan->sasaran ?? '')); ?>" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Indikator</label>
                    <input type="text" name="indikator" class="form-control shadow-sm"
                           value="<?php echo e(old('indikator', $laporan->indikator ?? '')); ?>">
                </div>
            </div>

            <hr class="my-4">

            
            <div class="row g-3">
                <?php $__currentLoopData = ['1','2','3','4']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold target-label" data-tw="<?php echo e($tw); ?>">
                            Target TW <?php echo e($tw); ?>

                        </label>
                        <input type="text" name="target_tw<?php echo e($tw); ?>" class="form-control shadow-sm"
                               value="<?php echo e(old('target_tw'.$tw, $laporan->{'target_tw'.$tw} ?? '')); ?>">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            
            <div class="row g-3 mt-2">
                <?php $__currentLoopData = ['1','2','3','4']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold realisasi-label" data-tw="<?php echo e($tw); ?>">
                            Realisasi TW <?php echo e($tw); ?>

                        </label>
                        <input type="text" name="realisasi_tw<?php echo e($tw); ?>" class="form-control shadow-sm"
                               value="<?php echo e(old('realisasi_tw'.$tw, $laporan->{'realisasi_tw'.$tw} ?? '')); ?>">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <hr class="my-4">

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Capaian Triwulan</label>
                    <input type="text" name="capaian_triwulan" class="form-control shadow-sm"
                           value="<?php echo e(old('capaian_triwulan', $laporan->capaian_triwulan ?? '')); ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">% Capaian</label>
                    <input type="number" step="0.01" name="persen_capaian" class="form-control shadow-sm"
                           value="<?php echo e(old('persen_capaian', $laporan->persen_capaian ?? '')); ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">% Capaian Akumulasi</label>
                    <input type="number" step="0.01" name="persen_capaian_akumulasi" class="form-control shadow-sm"
                           value="<?php echo e(old('persen_capaian_akumulasi', $laporan->persen_capaian_akumulasi ?? '')); ?>">
                </div>
            </div>

            <div class="mt-3">
                <label class="form-label fw-semibold">Catatan Hasil Monitoring</label>
                <textarea name="catatan_hasil_monitoring" class="form-control shadow-sm" rows="2"><?php echo e(old('catatan_hasil_monitoring', $laporan->catatan_hasil_monitoring ?? '')); ?></textarea>
            </div>

            <div class="mt-3">
                <label class="form-label fw-semibold">Tindak Lanjut</label>
                <textarea name="tindak_lanjut" class="form-control shadow-sm" rows="2"><?php echo e(old('tindak_lanjut', $laporan->tindak_lanjut ?? '')); ?></textarea>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="<?php echo e(route('laporan-renaksi.index')); ?>" class="btn btn-light border shadow-sm px-4">Batal</a>
                <button type="submit" class="btn btn-primary shadow-sm px-4">
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
    updateLabels(); // jalankan saat load
});
</script>
<?php /**PATH C:\laragon\www\Adminto-Laravel_v2.0\Adminto\resources\views/components/LaporanRenaksiForm.blade.php ENDPATH**/ ?>