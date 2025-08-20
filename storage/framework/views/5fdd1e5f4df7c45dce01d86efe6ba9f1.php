

<?php $__env->startSection('page_content'); ?>
<div class="container-fluid">
    <div class="card">
       <div class="text-white card-header d-flex justify-content-between align-items-center" style="background-color:#5eb3fd;">
        <h4 class="mb-0"><?php echo e($topbarTitle); ?></h4>
            <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#addUnitModal">
                <i class="bi bi-plus-circle me-1"></i> Tambah Unit
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
                            <th class="text-center">Nama Unit</th>
                            <th class="text-center">Tahun</th>
                            <th style="width: 25%;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-center"><?php echo e($loop->iteration); ?></td>
                            <td class="text-center"><?php echo e($unit->nama_unit); ?></td>
                            <td class="text-center"><?php echo e($unit->tahun); ?></td>
                            <td class="text-center">
                                <!-- Tombol Edit -->
                                <button class="btn btn-warning btn-sm me-1"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editUnitModal<?php echo e($unit->id); ?>">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                <!-- Tombol Delete -->
                                <button class="btn btn-danger btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteUnitModal<?php echo e($unit->id); ?>">
                                    <i class="bi bi-trash"></i>
                                </button>

                                <!-- Tombol ke kategori -->
                                <a href="<?php echo e(route('categories.index')); ?>" class="btn btn-info btn-sm ms-1" title="Kategori Unit">
                                    <i class="bi bi-tags"></i>
                                </a>
                            </td>
                        </tr>

                        
                        <?php echo $__env->make('components.modal-edit-unit', ['unit' => $unit], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('components.modal-delete-unit', ['unit' => $unit], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada data unit.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php echo $__env->make('components.UnitsForm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts-eg.horizontal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Adminto-Laravel_v2.0\Adminto\resources\views/apps/unit.blade.php ENDPATH**/ ?>