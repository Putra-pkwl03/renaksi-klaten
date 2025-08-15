

<?php $__env->startSection('page_content'); ?>
<?php if($mode === 'form'): ?>
    <?php echo $__env->make('components.LaporanRenaksiForm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('components.LaporanRenaksiTable', [
        'laporanByKategori' => $laporanByKategori,
        'capaianTriwulanByKategori' => $capaianTriwulanByKategori,
        'showActions' => $showActions
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

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

<?php echo $__env->make('layouts-eg.horizontal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Adminto-Laravel_v2.0\Adminto\resources\views/apps/LaporanRenaksi.blade.php ENDPATH**/ ?>