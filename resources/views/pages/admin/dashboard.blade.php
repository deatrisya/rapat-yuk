@extends('main.app')
@section('title','Dashboard')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            @component('components.card')
            @slot('title', 'Jumlah Ruang Tersedia')
            @slot('value', '3')
            @endcomponent
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            @component('components.card')
            @slot('title', 'Jumlah Ruangan')
            @slot('value', '3')
            @endcomponent
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            @component('components.card')
            @slot('title', 'Jumlah Pengguna')
            @slot('value', '10')
            @endcomponent
        </div>
    </div>
</div>


<div class="content-backdrop fade"></div>
@endsection
