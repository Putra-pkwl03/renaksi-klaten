

<?php $__env->startSection('page_content'); ?>
<div class="container-fluid">
    <div class="card">
        <div class="text-white card-header d-flex justify-content-between align-items-center" style="background-color:#5eb3fd;">
            <h4 class="mb-0">Daftar User</h4>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="bi bi-plus-circle me-1"></i> Tambah User
            </button>
        </div>

        <div class="card-body">
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table align-middle table-striped table-hover">
                    <thead class="text-center table-light">
                        <tr>
                            <th style="width: 5%;" class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Dibuat Pada</th>
                            <th style="width: 20%;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                <td class="text-center"><?php echo e($user->name); ?></td>
                                <td class="text-center"><?php echo e($user->email); ?></td>
                                <td class="text-center"><?php echo e($user->created_at->format('d M Y H:i')); ?></td>
                                <td class="text-center">
                                    <!-- Button Edit -->
                                    <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#editUserModal<?php echo e($user->id); ?>" title="Edit User">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>

                                    <!-- Button Delete -->
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal<?php echo e($user->id); ?>" title="Hapus User">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            
                            <?php echo $__env->make('components.modal-edit-user', ['user' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('components.modal-delete-user', ['user' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada user terdaftar.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Include register form modal -->
<?php echo $__env->make('components.register-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<script>
function togglePassword(id, btn) {
  const input = document.getElementById(id);
  const icon = btn.querySelector("i");
  if (input.type === "password") {
    input.type = "text";
    icon.classList.remove("bi-eye");
    icon.classList.add("bi-eye-slash");
  } else {
    input.type = "password";
    icon.classList.remove("bi-eye-slash");
    icon.classList.add("bi-eye");
  }
}
</script>


<?php echo $__env->make('layouts-eg.horizontal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Adminto-Laravel_v2.0\Adminto\resources\views/apps/ManageUsers.blade.php ENDPATH**/ ?>