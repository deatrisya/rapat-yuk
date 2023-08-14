@extends('main.app')
@section('title', 'Dashboard Pegawai')
@section('page_title','Selamat datang, '. Auth::user()->name .'!')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            @component('components.card')
            @slot('bg_color', 'bg-success')
            @slot('icon', 'bx bxs-home-heart ')
            @slot('title', 'Ruang Tersedia')
            @slot('nominal', $jumlahKetersediaan)
            @endcomponent
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            @component('components.card')
            @slot('bg_color', 'bg-info')
            @slot('icon', 'bx bxs-bookmark-alt')
            @slot('title', 'Pesanan Saya')
            @slot('nominal', $jumlahPesanan)
            @endcomponent
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            @component('components.card')
            @slot('bg_color', 'bg-danger')
            @slot('icon', 'bx bxs-x-square')
            @slot('title', 'Pesanan Ditolak')
            @slot('nominal', $pesananDitolak)
            @endcomponent
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card p-2">
                    <div id="calendar-dashboard" class="card-body p-2" data-book="{{ json_encode($events) }}"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/calendar.js') }}"></script>
<div class="content-backdrop fade"></div>
@endsection
