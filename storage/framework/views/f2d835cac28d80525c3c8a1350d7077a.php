<div class="card">
    <?php if($showActions): ?>
        <div class="m-3 d-flex justify-content-end align-items-center">
            <a href="<?php echo e(route('laporan-renaksi.index', ['mode' => 'form'])); ?>" class="btn btn-primary rounded-pill">
                <i class="bi bi-plus-circle me-2"></i> Add
            </a>
        </div>
    <?php else: ?>
        <div class="pt-3"></div>
    <?php endif; ?>

    <div class="mx-3">
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <?php
                $sections = [
                    'A' => 'PENCAPAIAN KINERJA SASARAN',
                    'B' => 'PENCAPAIAN KINERJA PROGRAM',
                    'C' => 'PENCAPAIAN KINERJA KEGIATAN',
                    'D' => 'PENCAPAIAN KINERJA SUB KEGIATAN'
                ];
            ?>

            <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kode => $judul): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <table class="table table-bordered table-hover align-middle">
                    <thead>
                        <tr style="background-color:#efd684; font-weight:bold;">
                            <th colspan="<?php echo e($showActions ? 19 : 18); ?>" style="font-size:14px; color: black;">
                                <?php echo e($kode); ?>. <?php echo e($judul); ?>

                            </th>
                        </tr>
                        <tr style="text-align:center; font-size: 11px;">
                            <th rowspan="2">NO.</th>
                            <th rowspan="2">SASARAN</th>
                            <th rowspan="2">INDIKATOR</th>
                            <th colspan="4">TARGET SASARAN</th>
                            <th colspan="4">REALISASI</th>
                            <th style="background-color:#fffd6e;">% Capaian</th>
                            <th style="background-color:#fffd6e;">% Capaian</th>
                            <th rowspan="2">CATATAN HASIL MONITORING<br>RENCANA AKSI</th>
                            <th rowspan="2">TINDAK LANJUT</th>
                            <?php if($showActions): ?>
                                <th rowspan="2" style="width: 70px;">Aksi</th>
                            <?php endif; ?>
                        </tr>
                        <tr style="text-align:center; font-size: 11px;">
                            <th>TW I</th>
                            <th>TW II</th>
                            <th>TW III</th>
                            <th>TW IV</th>
                            <th>TW I</th>
                            <th>TW II</th>
                            <th>TW III</th>
                            <th>TW IV</th>
                            <th style="background-color:#fffd6e;">
                                Triwulan <span style="color: red;"><?php echo e($capaianTriwulanByKategori[$kode] ?? ''); ?></span>
                            </th>
                            <th style="background-color:#fffd6e;">
                                Akumulasi S/D Triwulan <span style="color: red;"><?php echo e($capaianTriwulanByKategori[$kode] ?? ''); ?></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $laporanByKategori[$kode]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr style="font-size: 11px;">
                                <td><?php echo e(($laporanByKategori[$kode]->currentPage() - 1) * $laporanByKategori[$kode]->perPage() + $index + 1); ?></td>
                                <td style="background-color:#a5d39b;"><?php echo e($row->sasaran); ?></td>
                                <td style="background-color:#a7d0f3;"><?php echo e($row->indikator); ?></td>
                                <td style="background-color:#a7d0f3;"><?php echo e($row->target_tw1); ?></td>
                                <td style="background-color:#a7d0f3;"><?php echo e($row->target_tw2); ?></td>
                                <td style="background-color:#a7d0f3;"><?php echo e($row->target_tw3); ?></td>
                                <td style="background-color:#a7d0f3;"><?php echo e($row->target_tw4); ?></td>
                                <td style="background-color:#b59cc7;"><?php echo e($row->realisasi_tw1); ?></td>
                                <td style="background-color:#b59cc7;"><?php echo e($row->realisasi_tw2); ?></td>
                                <td style="background-color:#b59cc7;"><?php echo e($row->realisasi_tw3); ?></td>
                                <td style="background-color:#b59cc7;"><?php echo e($row->realisasi_tw4); ?></td>
                                <td style="background-color:#fffd6e;"><?php echo e($row->persen_capaian); ?>%</td>
                                <td style="background-color:#fffd6e;"><?php echo e($row->persen_capaian_akumulasi); ?>%</td>
                                <td><?php echo e($row->catatan_hasil_monitoring); ?></td>
                                <td><?php echo e($row->tindak_lanjut); ?></td>
                                <?php if($showActions): ?>
                                    <td class="text-center">
                                        <a href="<?php echo e(route('laporan-renaksi.edit', $row->id)); ?>" class="text-primary me-2" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="#" class="btn btn-link p-0 m-0 text-danger" title="Delete"
                                           data-bs-toggle="modal"
                                           data-bs-target="#deleteModal"
                                           data-url="<?php echo e(route('laporan-renaksi.destroy', $row->id)); ?>">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="<?php echo e($showActions ? 19 : 18); ?>" class="text-center">Tidak ada data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="d-flex justify-content-end align-items-center mt-2">
                    <?php echo e($laporanByKategori[$kode]->links('pagination::bootstrap-5')); ?>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\Adminto-Laravel_v2.0\Adminto\resources\views/components/LaporanRenaksiTable.blade.php ENDPATH**/ ?>