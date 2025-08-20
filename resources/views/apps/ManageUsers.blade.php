@extends('layouts-eg.horizontal')

@section('page_content')
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
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

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
                        @forelse($users as $index => $user)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center">{{ $user->created_at->format('d M Y H:i') }}</td>
                                <td class="text-center">
                                    <!-- Button Edit -->
                                    <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}" title="Edit User">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>

                                    <!-- Button Delete -->
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal{{ $user->id }}" title="Hapus User">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            {{-- Include modal edit & delete untuk tiap user --}}
                            @include('components.modal-edit-user', ['user' => $user])
                            @include('components.modal-delete-user', ['user' => $user])
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada user terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Include register form modal -->
@include('components.register-form')
@endsection

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

