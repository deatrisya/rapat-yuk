@extends('main.app')
@section('title','Tambah User')
@section('page_title','User')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master/</span> Tambah Data User</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah User</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST" >
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="name">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Masukkan Nama" required value="{{ old('name') }}" />
                                    @error('name')
                                        <small class="text-danger name">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="email">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Masukkan Email" required value="{{ old('email') }}"/>
                                    @error('email')
                                    <small class="text-danger email">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="row mb-3 form-password-toggle">
                            <label class="col-sm-2 col-form-label" for="password">Password</label>
                            <div class="col-sm-10">
                                <div class="input-group-merge input-group">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" required/>
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                <small class="text-danger password">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 form-password-toggle">
                            <label class="col-sm-2 col-form-label" for="password">Konfirmasi Password</label>
                            <div class="col-sm-10">
                                <div class="input-group-merge input-group">
                                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" required/>
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password_confirmation')
                                <small class="text-danger password_confirmation">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="password">Role</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" id="role1" value="Admin" {{old('role')=='Admin' ? 'checked' : ''}} required>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Admin
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" id="role2" value="Pegawai" {{ old('role')=='Pegawai' ? 'checked': '' }}>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Pegawai
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
