<?php if($mode === 'form'): ?>
    <?php echo $__env->make('components.LaporanRenaksiForm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('components.LaporanRenaksiTable', [
        'laporanByKategori' => $laporanByKategori,
        'capaianTriwulanByKategori' => $capaianTriwulanByKategori,
        'showActions' => $showActions
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if($showActions): ?>
    <?php echo $__env->make('components.ModalHapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var url = button.getAttribute('data-url');
                var form = deleteModal.querySelector('#deleteForm');
                form.action = url;
            });
        });
    </script>
<?php endif; ?>
<?php /**PATH C:\laragon\www\Adminto-Laravel_v2.0\Adminto\resources\views/apps/LaporanRenaksi.blade.php ENDPATH**/ ?>