@extends('layouts.app')

@section('title', 'Detail Poktan')

@section('content')

    <div class="py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.admin')}}"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="#">Gapoktan</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ketua.gapoktan.show', $poktan->gapoktan->id) }}">{{ $poktan->gapoktan->nama }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('ketua.poktan.show', [$poktan->gapoktan->id, $poktan->id]) }}">{{ str_contains($poktan->nama, 'Poktan') ? '' : 'Poktan ' }}{{ $poktan->nama }}</a>
                </li>
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

                    <h5 class="card-title">Daftar Anggota Poktan</h5>
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
                                    <td>{{ $anggota->nama_anggota }}</td>
                                    <td>{{ $anggota->jenis_kelamin }}</td>
                                    <td>{{ $anggota->kontak }}</td>
                                    <td>
                                        <a href="{{ route('ketua.anggota.show', ['gapoktan' => $poktan->gapoktan->id, 'poktan' => $poktan->id, 'anggota' => $anggota->id]) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('ketua.anggota.edit', ['gapoktan' => $poktan->gapoktan->id, 'poktan' => $poktan->id, 'anggota' => $anggota->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('ketua.anggota.destroy', ['gapoktan' => $poktan->gapoktan->id, 'poktan' => $poktan->id, 'anggota' => $anggota->id]) }}" method="post" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus</button>
                                        </form>
                                    </td>
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

