@extends('layouts.app')

@section('title', 'Edit Anggota')

@section('content')

    <div class="py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="#">Gapoktan</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ketua.gapoktan.show',$gapoktan->id) }}">{{ $gapoktan->nama }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ketua.poktan.show', [$gapoktan->id, $poktan->id]) }}">{{ $poktan->nama }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Anggota</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-light shadow-sm components-section">
                <div class="card-body">
                    <form action="{{ route('ketua.anggota.update',[$gapoktan->id, $poktan->id, $anggota_poktan->id]) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row mb-4">
                            <div class="col-lg-5 col-sm-6">
                                <div class="mb-3">
                                    <label for="nama_anggota">Nama Anggota</label>
                                    <input type="text"
                                        class="form-control {{ $errors->first('nama_anggota') ? 'is-invalid' : '' }}"
                                        id="nama_anggota" name="nama_anggota" value="{{ old('nama_anggota') ?? $anggota_poktan->nama_anggota }}">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('nama_anggota') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="mb-3">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control {{ $errors->first('jenis_kelamin') ? 'is-invalid' : '' }}"
                                        id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="">Select Jenis Kelamin</option>
                                        <option value="laki-laki"
                                            {{ old('jenis_kelamin') == 'laki-laki' || $anggota_poktan->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="perempuan"
                                            {{ old('jenis_kelamin') == 'perempuan' || $anggota_poktan->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('jenis_kelamin') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="mb-3">
                                    <label for="kontak">Kontak</label>
                                    <input type="text" class="form-control {{ $errors->first('kontak') ? 'is-invalid' : '' }}"
                                        id="kontak" name="kontak" value="{{ old('kontak') ?? $anggota_poktan->kontak }}">
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

