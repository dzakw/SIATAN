@extends('layouts.app')

@section('title', 'Detail Anggota')

@section('content')

    <div class="py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.admin')}}"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="#">Gapoktan</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ketua.gapoktan.show', $poktan->gapoktan->id) }}">{{ $poktan->gapoktan->nama }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ketua.poktan.show', [$poktan->gapoktan->id, $poktan->id]) }}">{{ $poktan->nama }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('ketua.anggota.show', [$poktan->gapoktan->id, $anggota_poktan->poktan->id, $anggota_poktan->id]) }}">
                        @if(str_contains($anggota_poktan->nama_anggota, 'Bapak') ||
                            str_contains($anggota_poktan->nama_anggota, 'Ibu'))
                            {{ $anggota_poktan->nama_anggota }}
                        @else
                            {{ $anggota_poktan->jenis_kelamin == 'laki-laki' ? 'Bapak ' : 'Ibu ' }}
                            {{ $anggota_poktan->nama_anggota }}
                        @endif
                    </a>
                </li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-light shadow-sm components-section">
                <div class="card-body">
                    <h5 class="card-title">Detail Anggota Poktan</h5>
                    <hr>

                    <div class="mb-3">
                        <label for="nama_lengkap">Nama Lengkap:</label>
                        <input type="text" value="{{ $anggota_poktan->nama_anggota }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin">Jenis Kelamin:</label>
                        <input type="text" value="{{ $anggota_poktan->jenis_kelamin }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="kontak">Kontak:</label>
                        <input type="text" value="{{ $anggota_poktan->kontak }}" disabled>
                    </div>

                    <hr>
                    <div class="text-right">
                        <a href="{{ route('ketua.pinjaman.create', [$poktan->gapoktan->id, $poktan->id, $anggota_poktan->id]) }}" class="btn btn-primary">Tambah Pinjaman</a>
                        <a href="{{ route('ketua.poktan.show', [$poktan->gapoktan->id, $poktan->id]) }}" class="btn btn-primary">Kembali</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
