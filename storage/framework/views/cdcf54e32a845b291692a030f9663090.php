<!-- Modal Tambah Unit -->
<div class="modal fade" id="addUnitModal" tabindex="-1" aria-labelledby="addUnitModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow-lg border-0 rounded-3">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title fw-bold" id="addUnitModalLabel">
          <i class="bi bi-building-add me-2"></i> Tambah Unit
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="<?php echo e(route('units.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="modal-body p-4">
          
          <!-- Nama Unit -->
          <div class="mb-3">
            <label for="nama_unit" class="form-label">Nama Unit</label>
            <input type="text" name="nama_unit" id="nama_unit" 
              class="form-control rounded-3" 
              value="<?php echo e(old('nama_unit')); ?>" 
              placeholder="Masukkan nama unit" required>
            <?php $__errorArgs = ['nama_unit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
              <div class="text-danger small"><?php echo e($message); ?></div> 
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <!-- Tahun -->
          <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <select name="tahun" id="tahun" class="form-select rounded-3" required>
              <option value="">-- Pilih Tahun --</option>
              <?php
                  $tahunSekarang = date('Y');
                  $tahunAwal = $tahunSekarang - 5;
                  $tahunAkhir = $tahunSekarang + 5;
              ?>
              <?php for($i = $tahunAwal; $i <= $tahunAkhir; $i++): ?>
                <option value="<?php echo e($i); ?>" <?php echo e(old('tahun') == $i ? 'selected' : ''); ?>>
                  <?php echo e($i); ?>

                </option>
              <?php endfor; ?>
            </select>
            <?php $__errorArgs = ['tahun'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <div class="text-danger small"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<?php /**PATH C:\laragon\www\Adminto-Laravel_v2.0\Adminto\resources\views/components/UnitsForm.blade.php ENDPATH**/ ?>