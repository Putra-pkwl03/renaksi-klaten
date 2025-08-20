<div class="modal fade" id="deleteUserModal<?php echo e($user->id); ?>" tabindex="-1" aria-labelledby="deleteUserLabel<?php echo e($user->id); ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            
            <!-- Header -->
            <div class="modal-header border-0 justify-content-center">
                <div class="text-center">
                    <i class="bi bi-exclamation-triangle-fill text-warning" style="font-size: 3rem;"></i>
                    <h5 class="mt-3 fw-bold text-dark" id="deleteUserLabel<?php echo e($user->id); ?>">
                        Konfirmasi Hapus User
                    </h5>
                </div>
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body text-center px-4">
                <p class="mb-0">
                    Apakah Anda yakin ingin menghapus user <strong><?php echo e($user->name); ?></strong>?
                </p>
                <p class="text-danger small mb-0">
                    Data yang dihapus <strong>tidak bisa dikembalikan</strong>.
                </p>
            </div>

            <!-- Footer -->
            <div class="modal-footer border-0 justify-content-center pb-4">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">
                    Batal
                </button>
                <form action="<?php echo e(route('users.delete', $user->id)); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger rounded-pill px-4 shadow-sm">
                        <i class="bi bi-trash me-1"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\Adminto-Laravel_v2.0\Adminto\resources\views/components/modal-delete-user.blade.php ENDPATH**/ ?>