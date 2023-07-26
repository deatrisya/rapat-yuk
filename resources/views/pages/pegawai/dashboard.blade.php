@extends('main.app')
@section('title', 'Dashboard Pegawai')
@section('text', 'Pesan Ruang')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            @component('components.card')
            @slot('bg_color', 'bg-success')
            @slot('icon', 'bx bxs-home-heart ')
            @slot('title', 'Ruang Tersedia')
            @slot('nominal', '3')
            @slot('ruang', 'Ruang Welirang')
            @endcomponent
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            @component('components.card')
            @slot('bg_color', 'bg-info')
            @slot('icon', 'bx bxs-home ')
            @slot('title', 'Pesanan Saya')
            @slot('nominal', '1')
            @slot('ruang', 'Ruang Welirang')
            @endcomponent
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            @component('components.card')
            @slot('bg_color', 'bg-warning')
            @slot('icon', 'bx bxs-user-account ')
            @slot('title', 'lorem')
            @slot('nominal', 'lorem')
            @slot('ruang', 'Ruang Welirang')
            @endcomponent
        </div>
        <div class="col">
            <div class="card p-3">
                <div id="calendar" class="card p-3" data-book="{{ json_encode($events) }}">
                    <script src="{{ asset('js/calendar.js') }}"></script>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-backdrop fade"></div>
@endsection
