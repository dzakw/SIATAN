@extends('layouts.app')

@section('title', 'Detail Poktan')

@section('content')

    <div class="py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="#">Gapoktan</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ketua.gapoktan.show', $poktan->gapoktan->id) }}">{{ $poktan->gapoktan->nama }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ketua.poktan.show', [$poktan->gapoktan->id, $poktan->id]) }}">{{ $poktan->nama }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Poktan</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-light shadow-sm components-section">
                <div class="card-body">
                    <h5 class="card-title">Detail Poktan</h5>
                    <hr>

                    <div class="mb-3">
                        <label for="nama">Nama Poktan:</label>
                        <input type="text" value="{{ $poktan->nama }}" disabled>
                    </div>

                    <hr>

                    <h5 class="card-title">List Anggota Poktan</h5>
                    <table class="table table-bordered" id="anggotaTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Anggota</th>
                                <th>Jenis Kelamin</th>
                                <th>Kontak</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($poktan->anggota_poktan as $anggota)
                                <tr>
                                    <td>{{ $anggota->nama_lengkap }}</td>
                                    <td>{{ $anggota->jenis_kelamin }}</td>
                                    <td>{{ $anggota->kontak }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <hr>

                    <div class="text-right">
                        <a href="{{ route('ketua.anggota.create', [$poktan->gapoktan->id, $poktan->id]) }}" class="btn btn-primary">Tambah Anggota</a>
                        <a href="{{ route('ketua.gapoktan.show', ['gapoktan' => $gapoktan, 'poktan' => $poktan]) }}" class="btn btn-primary">Kembali</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#anggotaTable').DataTable();
        });

    </script>
@endsection

