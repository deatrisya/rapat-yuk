@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">{{ __('Register') }}</div>
                <div class="card-body">
                    <h4 class="mb-2">Selamat Datang di Rapat yukkk! 👋</h4>
                    <p class="mb-2">Silahkan registrasi terlebih dahulu</p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col mb-3">
                                <label for="name" class="form-label text">{{ __('Nama') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <label for="name" class="form-label text">{{ __('Peran') }}</label>
                                <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" required>
                                    <option selected>Pilih</option>
                                    <option value="admin">Admin</option>
                                    <option value="pegawai">Pegawai</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Alamat Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Kata Sandi') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Konfirmasi Kata Sandi') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-link" href="{{ route('login') }}">{{ __('Sudah punya akun?') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
