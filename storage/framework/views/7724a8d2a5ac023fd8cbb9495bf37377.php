<div class="border-0 shadow-lg card rounded-4">
    <div class="py-3 text-white card-header bg-primary rounded-top-4">
        <h5 class="mb-0">
            <?php echo e(isset($laporan->id) ? 'Edit Laporan Renaksi' : 'Tambah Laporan Renaksi'); ?>

        </h5>
    </div>
    <div class="p-4 card-body">
        <form action="<?php echo e(isset($laporan->id) ? route('laporan-renaksi.update', $laporan->id) : route('laporan-renaksi.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php if(isset($laporan->id)): ?>
                <?php echo method_field('PUT'); ?>
            <?php endif; ?>

            <div class="row g-3">
                
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Unit <span class="text-danger">*</span></label>
                    <select name="unit_id" class="shadow-sm form-select" required>
                        <option value="">-- Pilih Unit --</option>
                        <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($unit->id); ?>"
                                <?php echo e(old('unit_id', $laporan->unit_id ?? '') == $unit->id ? 'selected' : ''); ?>>
                                <?php echo e($unit->nama_unit); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                    <select id="kategoriSelect" name="kategori" class="shadow-sm form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat->id); ?>"
                                <?php echo e(old('kategori', $laporan->category_id ?? '') == $cat->id ? 'selected' : ''); ?>>
                                <?php echo e($cat->nama_kategori); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                
                <div class="col-md-5">
                    <label class="form-label fw-semibold">Sasaran</label>
                    <input type="text" name="sasaran" class="shadow-sm form-control"
                           value="<?php echo e(old('sasaran', $laporan->sasaran ?? '')); ?>" required>
                </div>

                
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Indikator</label>
                    <input type="text" name="indikator" class="shadow-sm form-control"
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
                        <input type="text" name="target_tw<?php echo e($tw); ?>" class="shadow-sm form-control"
                               value="<?php echo e(old('target_tw'.$tw, $laporan->{'target_tw'.$tw} ?? '')); ?>">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            
            <div class="mt-2 row g-3">
                <?php $__currentLoopData = ['1','2','3','4']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold realisasi-label" data-tw="<?php echo e($tw); ?>">
                            Realisasi TW <?php echo e($tw); ?>

                        </label>
                        <input type="text" name="realisasi_tw<?php echo e($tw); ?>" class="shadow-sm form-control"
                               value="<?php echo e(old('realisasi_tw'.$tw, $laporan->{'realisasi_tw'.$tw} ?? '')); ?>">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <hr class="my-4">

            
            <div class="mt-3">
                <label class="form-label fw-semibold">Catatan Hasil Monitoring</label>
                <textarea name="catatan_hasil_monitoring" class="shadow-sm form-control" rows="2"><?php echo e(old('catatan_hasil_monitoring', $laporan->catatan_hasil_monitoring ?? '')); ?></textarea>
            </div>

            <div class="mt-3">
                <label class="form-label fw-semibold">Tindak Lanjut</label>
                <textarea name="tindak_lanjut" class="shadow-sm form-control" rows="2"><?php echo e(old('tindak_lanjut', $laporan->tindak_lanjut ?? '')); ?></textarea>
            </div>

            <div class="gap-2 mt-4 d-flex justify-content-end">
                <a href="<?php echo e(route('laporan-renaksi.index')); ?>" class="px-4 border shadow-sm btn btn-light">Batal</a>
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
<?php /**PATH C:\laragon\www\Adminto-Laravel_v2.0\Adminto\resources\views/components/LaporanRenaksiForm.blade.php ENDPATH**/ ?>