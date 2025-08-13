  <!-- Modal Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Center modal vertikal -->
            <form id="deleteForm" method="POST" class="modal-content border-0 shadow-lg rounded-4">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>

                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body text-center">
                    <div class="mb-3">
                        <i class="bi bi-exclamation-triangle-fill text-warning" style="font-size: 3rem;"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Konfirmasi Hapus Data</h5>
                    <p class="mb-0 text-secondary">Data yang dihapus tidak bisa dikembalikan. Apakah Anda yakin?</p>
                </div>

                <div class="modal-footer justify-content-center border-0 pt-0">
                    <button type="button" class="btn btn-outline-secondary px-4 rounded-pill"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger px-4 rounded-pill shadow-sm">Hapus</button>
                </div>
            </form>
        </div>
    </div>

        <style>
        .modal.fade .modal-dialog {
            transition-duration: 0.15s !important;
        }

        .modal.fade.show .modal-dialog {
            transition-duration: 0.15s !important;
        }
    </style><?php /**PATH C:\laragon\www\Adminto-Laravel_v2.0\Adminto\resources\views/components/ModalHapus.blade.php ENDPATH**/ ?>