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

      <form action="<?php echo e(route('categories.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="modal-body p-4">
          
          
          <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input 
              type="text" 
              id="nama_kategori" 
              name="nama_kategori" 
              class="form-control rounded-3 <?php $__errorArgs = ['nama_kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
              value="<?php echo e(old('nama_kategori')); ?>" 
              placeholder="Masukkan nama kategori" 
              required
            >
            <?php $__errorArgs = ['nama_kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <div class="invalid-feedback"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          
          <div class="mb-3">
            <label for="unit_id" class="form-label">Unit</label>
            <select 
              id="unit_id" 
              name="unit_id" 
              class="form-select rounded-3 <?php $__errorArgs = ['unit_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
              required
            >
              <option value="">-- Pilih Unit --</option>
              <?php $__currentLoopData = App\Models\Unit::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($unit->id); ?>" <?php echo e(old('unit_id') == $unit->id ? 'selected' : ''); ?>>
                  <?php echo e($unit->nama_unit); ?>

                </option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['unit_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <div class="invalid-feedback"><?php echo e($message); ?></div>
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
<?php /**PATH C:\laragon\www\Adminto-Laravel_v2.0\Adminto\resources\views/components/CategoryForm.blade.php ENDPATH**/ ?>