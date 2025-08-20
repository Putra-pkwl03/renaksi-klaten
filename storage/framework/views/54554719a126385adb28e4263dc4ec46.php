<div class="modal fade" id="editCategoryModal<?php echo e($category->id); ?>" tabindex="-1" aria-labelledby="editCategoryModalLabel<?php echo e($category->id); ?>" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow-lg border-0 rounded-3">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title fw-bold" id="editCategoryModalLabel<?php echo e($category->id); ?>">
          <i class="bi bi-pencil-square me-2"></i> Edit Kategori - <?php echo e($category->nama_kategori); ?>

        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="<?php echo e(route('categories.update', $category->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="modal-body p-4">
          <!-- Nama Kategori -->
          <div class="mb-3">
            <label for="nama_kategori<?php echo e($category->id); ?>" class="form-label">Nama Kategori</label>
            <input 
              type="text" 
              class="form-control rounded-3" 
              id="nama_kategori<?php echo e($category->id); ?>" 
              name="nama_kategori" 
              value="<?php echo e($category->nama_kategori); ?>" 
              required
            >
          </div>

          <!-- Unit -->
          <div class="mb-3">
            <label for="unit_id<?php echo e($category->id); ?>" class="form-label">Unit</label>
            <select class="form-select rounded-3" id="unit_id<?php echo e($category->id); ?>" name="unit_id">
              <option value="">Pilih Unit</option>
              <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($unit->id); ?>" <?php echo e($category->unit_id == $unit->id ? 'selected' : ''); ?>>
                  <?php echo e($unit->nama_unit); ?>

                </option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\laragon\www\Adminto-Laravel_v2.0\Adminto\resources\views/components/modal-edit-category.blade.php ENDPATH**/ ?>