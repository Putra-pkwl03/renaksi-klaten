@extends('layouts-eg.horizontal')

@section('page_content')
<div class="container-fluid">
    <div class="card">
        <div class="text-white card-header d-flex justify-content-between align-items-center" style="background-color:#5eb3fd;">
            <h4 class="mb-0">{{ $topbarTitle }}</h4>
            <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                <i class="bi bi-plus-circle me-1"></i> Tambah Kategori
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
                            <th class="text-center">Nama Kategori</th>
                            <th class="text-center">Unit</th>
                            <th style="width: 20%;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $category->nama_kategori }}</td>
                                <td class="text-center">{{ $category->unit->nama_unit ?? '-' }}</td>
                                <td class="text-center">
                                
                                    <button class="btn btn-warning btn-sm me-1" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#editCategoryModal{{ $category->id }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>

                                    <button class="btn btn-danger btn-sm" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#deleteCategoryModal{{ $category->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            {{-- Modal untuk Edit & Delete tiap kategori --}}
                            @include('components.modal-edit-category', ['category' => $category, 'units' => $units])
                            @include('components.modal-delete-category', ['category' => $category])
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada data kategori.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Modal Tambah Kategori --}}
@include('components.CategoryForm', ['units' => $units])
@endsection
