<div class="card mt-2">
  <div class="card-body">
    <form action="<?php echo e(route('laporan.store')); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <div class="row">
        <!-- Kolom Kiri -->
        <div class="col-md-6">

          <!-- Group: Unit Kerja -->
          <h5 class="mb-3">🗂 Unit Kerja</h5>
          <hr>
          <div class="mb-3">
            <label class="form-label">Nama Unit Kerja</label>
            <input type="text" name="nama_unit" class="form-control" placeholder="Nama Unit Kerja" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Kode Unit</label>
            <input type="text" name="kode_unit" class="form-control" placeholder="Kode Unit (opsional)">
          </div>

          <!-- Group: Sasaran -->
          <h5 class="mt-4 mb-3">🎯 Sasaran</h5>
          <hr>
          <div class="mb-3">
            <label class="form-label">Kategori Sasaran</label>
            <input type="text" name="kategori" class="form-control" placeholder="Kategori Sasaran">
          </div>
          <div class="mb-3">
            <label class="form-label">Nama Sasaran</label>
            <input type="text" name="nama_sasaran" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Keterangan Sasaran</label>
            <textarea name="keterangan_sasaran" class="form-control" rows="2"></textarea>
          </div>

          <!-- Group: Indikator -->
          <h5 class="mt-4 mb-3">📊 Indikator</h5>
          <hr>
          <div class="mb-3">
            <label class="form-label">Nama Indikator</label>
            <input type="text" name="nama_indikator" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Satuan Indikator</label>
            <input type="text" name="satuan_indikator" class="form-control">
          </div>
        </div>

        <!-- Kolom Kanan -->
        <div class="col-md-6">

          <!-- Group: Rencana Aksi -->
          <h5 class="mb-3">📝 Rencana Aksi</h5>
          <hr>
          <div class="mb-3">
            <label class="form-label">Nama Rencana Aksi</label>
            <input type="text" name="nama_rencana" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Target</label>
            <input type="number" name="target" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Satuan Target</label>
            <input type="text" name="satuan_target" class="form-control" required>
          </div>

          <!-- Group: Realisasi -->
          <h5 class="mt-4 mb-3">✅ Realisasi</h5>
          <hr>
          <div class="mb-3">
            <label class="form-label">Periode</label>
            <select name="id_periode" class="form-select" required>
              <option value="">-- Pilih Periode --</option>
              <?php $__currentLoopData = $periode; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($p->id_periode); ?>"><?php echo e($p->tahun); ?> - T<?php echo e($p->triwulan); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Nilai Realisasi</label>
            <input type="number" step="0.01" name="nilai_realisasi" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Capaian Persen</label>
            <input type="number" step="0.01" name="capaian_persen" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Keterangan Realisasi</label>
            <textarea name="keterangan_realisasi" class="form-control" rows="2"></textarea>
          </div>

          <!-- Group: Evaluasi -->
          <h5 class="mt-4 mb-3">🔍 Evaluasi</h5>
          <hr>
          <div class="mb-3">
            <label class="form-label">Analisis</label>
            <textarea name="analisis" class="form-control" rows="2"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Rekomendasi</label>
            <textarea name="rekomendasi" class="form-control" rows="2"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Tindak Lanjut</label>
            <textarea name="tindak_lanjut" class="form-control" rows="2"></textarea>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-end gap-2">
        <a href="<?php echo e(route('laporan.renaksi')); ?>" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>
<?php /**PATH C:\laragon\www\Adminto-Laravel_v2.0\Adminto\resources\views/apps/form-add-laporan.blade.php ENDPATH**/ ?>