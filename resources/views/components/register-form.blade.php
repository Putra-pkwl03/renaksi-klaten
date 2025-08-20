<!-- Modal Add User -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow-lg border-0 rounded-3">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title fw-bold" id="addUserLabel">
          <i class="bi bi-person-plus me-2"></i> Tambah User Baru
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('auth.register') }}">
        @csrf
        <div class="modal-body p-4">
          
          <!-- Nama -->
          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control rounded-3" placeholder="Masukkan nama lengkap" required>
          </div>

          <!-- Email -->
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control rounded-3" placeholder="contoh@email.com" required>
          </div>

          <!-- Password -->
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <input type="password" name="password" id="password" class="form-control rounded-start-3" minlength="6" placeholder="Minimal 6 karakter" required>
              <button type="button" class="btn btn-outline-secondary rounded-end-3" onclick="togglePassword('password', this)">
                <i class="bi bi-eye"></i>
              </button>
            </div>
          </div>

          <!-- Konfirmasi Password -->
          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <div class="input-group">
              <input type="password" name="password_confirmation" id="password_confirmation" class="form-control rounded-start-3" minlength="6" placeholder="Ulangi password" required>
              <button type="button" class="btn btn-outline-secondary rounded-end-3" onclick="togglePassword('password_confirmation', this)">
                <i class="bi bi-eye"></i>
              </button>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">
            <i class="bi bi-x-circle me-1"></i> Batal
          </button>
          <button type="submit" class="btn btn-primary rounded-3">
            <i class="bi bi-save me-1"></i> Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>


