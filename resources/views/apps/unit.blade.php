@extends('layouts-eg.horizontal')

@section('page_content')
<div class="container-fluid">
    <div class="card">
       <div class="text-white card-header d-flex justify-content-between align-items-center" style="background-color:#5eb3fd;">
        <h4 class="mb-0">Daftar Unit</h4>
            <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#addUnitModal">
                <i class="bi bi-plus-circle me-1"></i> Tambah Unit
            </button>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table align-middle table-striped table-hover">
                   <thead class="text-center table-light">
                        <tr>
                            <th style="width: 5%;" class="text-center">No</th>
                            <th class="text-center">Nama Unit</th>
                            <th class="text-center">Tahun</th>
                            <th style="width: 25%;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($units as $unit)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $unit->nama_unit }}</td>
                            <td class="text-center">{{ $unit->tahun }}</td>
                            <td class="text-center">
                                <a href="{{ route('units.edit', $unit->id) }}" class="btn btn-warning btn-sm me-1" title="Edit Unit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('units.destroy', $unit->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus unit ini?')" title="Hapus Unit">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                                <a href="{{ route('categories.index') }}" class="btn btn-info btn-sm ms-1" title="Kategori Unit">
                                    <i class="bi bi-tags"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada data unit.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('components.UnitsForm')
@endsection
