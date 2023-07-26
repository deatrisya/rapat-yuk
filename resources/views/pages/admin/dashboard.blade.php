@extends('main.app')
@section('title','Dashboard Admin')
@section('text', 'Setujui Sekarang ✔')
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
            @slot('title', 'Jumlah Ruangan')
            @slot('nominal', '3')
            @slot('ruang', 'Ruang Welirang')
            @endcomponent
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            @component('components.card')
            @slot('bg_color', 'bg-warning')
            @slot('icon', 'bx bxs-user-account ')
            @slot('title', 'Jumlah Pengguna')
            @slot('nominal', '10')
            @slot('ruang', 'Ruang Welirang')
            @endcomponent
        </div>

    </div>
    <div class="row">
        <div class="col">
            <div id="calendar" class="card p-2 m-2" data-book="{{ json_encode($events) }}"></div>
        </div>
    </div>
</div>
<script src="{{ asset('js/calendar.js') }}"></script>
<div class="content-backdrop fade"></div>
@endsection
