@extends('layouts.base', ['title' => 'Dashboard'])

@section('html_attribute')
lang="en" data-layout="topnav"
@endsection

@section('css')
@endsection

@section('content')

<div class="wrapper">

    @include('layouts.partials.topbar', ['topbarTitle' => $topbarTitle])

    @include('layouts.partials/horizontal-nav')

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
     <div class="page-content">
        <div class="page-container">
            @yield('page_content') <!-- isi spesifik per halaman -->
        </div>
    </div>
</div>

@endsection

@section('scripts')
@vite(['resources/js/pages/dashboard.js'])
@endsection