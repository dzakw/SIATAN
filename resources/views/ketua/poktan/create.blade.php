@extends('layouts.app')

@section('title', 'Tambah Poktan')

@section('content')

    <div class="py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="#">Gapoktan</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ketua.gapoktan.show', $gapoktan->id) }}">{{ $gapoktan->nama }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Poktan</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-light shadow-sm components-section">
                <div class="card-body">
                    <form action="{{ route('ketua.poktan.store', $gapoktan->id) }}" method="post">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-lg-5 col-sm-6">
                                <div class="mb-3">
                                    <label for="nama">Nama Poktan</label>
                                    <input type="text" class="form-control {{ $errors->first('nama') ? 'is-invalid' : '' }}"
                                        id="nama" name="nama" value="{{ old('nama') }}" required autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('nama') }}
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="gapoktan_id" value="{{ $gapoktan->id }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
