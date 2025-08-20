<div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="editUserLabel{{ $user->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow-lg border-0 rounded-3">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title fw-bold" id="editUserLabel{{ $user->id }}">
          <i class="bi bi-pencil-square me-2"></i> Edit User - {{ $user->name }}
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="modal-body p-4">
          <!-- Nama -->
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control rounded-3" value="{{ $user->name }}" required>
          </div>

          <!-- Email -->
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control rounded-3" value="{{ $user->email }}" required>
          </div>

          <!-- Password -->
          <div class="mb-3">
            <label class="form-label">Password (kosongkan jika tidak ingin diubah)</label>
            <div class="input-group">
              <input type="password" name="password" id="password{{ $user->id }}" class="form-control rounded-start-3" minlength="6" placeholder="Minimal 6 karakter">
              <button type="button" class="btn btn-outline-secondary rounded-end-3" onclick="togglePassword('password{{ $user->id }}', this)">
                <i class="bi bi-eye"></i>
              </button>
            </div>
          </div>

          <!-- Konfirmasi Password -->
          <div class="mb-3">
            <label class="form-label">Konfirmasi Password</label>
            <div class="input-group">
              <input type="password" name="password_confirmation" id="password_confirmation{{ $user->id }}" class="form-control rounded-start-3" minlength="6" placeholder="Ulangi password">
              <button type="button" class="btn btn-outline-secondary rounded-end-3" onclick="togglePassword('password_confirmation{{ $user->id }}', this)">
                <i class="bi bi-eye"></i>
              </button>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">
            <i class="bi bi-x-circle me-1"></i> Batal
          </button>
          <button type="submit" class="btn btn-warning rounded-3 text-dark">
            <i class="bi bi-save me-1"></i> Update
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
