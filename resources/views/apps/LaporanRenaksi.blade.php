@extends('layouts-eg.horizontal')

@section('page_content')
@if($mode === 'form')
    @include('components.LaporanRenaksiForm')
@else
    @include('components.LaporanRenaksiTable', [
        'laporanByKategori' => $laporanByKategori,
        'capaianTriwulanByKategori' => $capaianTriwulanByKategori,
        'showActions' => $showActions
    ])
@endif
@endsection

@if($showActions)
    @include('components.ModalHapus')
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
@endif
