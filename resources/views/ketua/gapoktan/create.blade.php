@extends('layouts.app')

@section('title', 'Tambah Gapoktan')

@section('content')

    <div class="py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="#">Gapoktan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Gapoktan</li>
            </ol>
        </nav>

    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-light shadow-sm components-section">
                <div class="card-body">
                    <form action="{{ route('ketua.gapoktan.store') }}" method="post">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-lg-5 col-sm-6">
                                <div class="mb-3">
                                    <label for="nama">Nama Gapoktan</label>
                                    <input type="text" class="form-control {{ $errors->first('nama') ? 'is-invalid' : '' }}"
                                        id="nama" name="nama" value="{{ old('nama') }}" required>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('nama') }}
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control {{ $errors->first('alamat') ? 'is-invalid' : '' }}"
                                        name="alamat" id="alamat" cols="30" rows="5"
                                        required>{{ old('alamat') }}</textarea>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('alamat') }}
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="kontak">Kontak</label>
                                    <input type="text"
                                        class="form-control {{ $errors->first('kontak') ? 'is-invalid' : '' }}"
                                        id="kontak" name="kontak" value="{{ old('kontak') }}" required>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('kontak') }}
                                    </div>
                                </div>

                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
