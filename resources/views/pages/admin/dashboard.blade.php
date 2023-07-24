@extends('main.app')
@section('title','Dashboard')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            @component('components.card')
            @slot('bg_color', 'bg-success')
            @slot('icon', 'bx bxs-home-heart ')
            @slot('title', 'Jumlah Ruang Tersedia')
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
</div>


<div class="content-backdrop fade"></div>
@endsection
