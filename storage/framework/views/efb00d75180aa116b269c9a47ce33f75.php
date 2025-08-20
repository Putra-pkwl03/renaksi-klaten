

<?php $__env->startSection('page_content'); ?>
<div class="container-fluid">
    <div class="card">
        <div class="text-white card-header d-flex justify-content-between align-items-center" style="background-color:#5eb3fd;">
            <h4 class="mb-0"><?php echo e($topbarTitle); ?></h4>
            <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                <i class="bi bi-plus-circle me-1"></i> Tambah Kategori
            </button>
        </div>

        <div class="card-body">
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table align-middle table-striped table-hover">
                    <thead class="text-center table-light">
                        <tr>
                            <th style="width: 5%;" class="text-center">No</th>
                            <th class="text-center">Nama Kategori</th>
                            <th class="text-center">Unit</th>
                            <th style="width: 20%;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                <td class="text-center"><?php echo e($category->nama_kategori); ?></td>
                                <td class="text-center"><?php echo e($category->unit->nama_unit ?? '-'); ?></td>
                                <td class="text-center">
                                
                                    <button class="btn btn-warning btn-sm me-1" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#editCategoryModal<?php echo e($category->id); ?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>

                                    <button class="btn btn-danger btn-sm" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#deleteCategoryModal<?php echo e($category->id); ?>">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            
                            <?php echo $__env->make('components.modal-edit-category', ['category' => $category, 'units' => $units], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('components.modal-delete-category', ['category' => $category], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada data kategori.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php echo $__env->make('components.CategoryForm', ['units' => $units], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts-eg.horizontal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Adminto-Laravel_v2.0\Adminto\resources\views/apps/category.blade.php ENDPATH**/ ?>