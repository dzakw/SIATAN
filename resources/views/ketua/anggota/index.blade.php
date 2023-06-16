@extends('layouts.app')

@section('title', 'Data Anggota')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.admin')}}"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="#">Gapoktan</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ketua.gapoktan.show', $poktan->gapoktan->id) }}">{{ $poktan->gapoktan->nama }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ketua.poktan.show', [$poktan->gapoktan->id, $poktan->id]) }}">{{ $poktan->nama }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Anggota</li>
            </ol>
        </nav>

    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-light shadow-sm components-section">
                <div class="card-body">
                    <p><a href="{{ route('ketua.poktan.show', [$poktan->gapoktan->id, $poktan->id]) }}" class="btn btn-primary">&lt;&lt; Kembali ke Detail Poktan</a></p>
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <a href="{{ route('ketua.anggota.create', [$poktan->gapoktan->id, $poktan->id]) }}" class="btn btn-primary btn-sm float-right mb-3">Tambah Anggota</a>
                        </div>
                    </div>

                    <table class="table table-hover" id="anggotaTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Anggota</th>
                                <th>Jenis Kelamin</th>
                                <th>Kontak</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($anggota as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data->nama_anggota }}</td>
                                    <td>{{ $data->jenis_kelamin }}</td>
                                    <td>{{ $data->kontak }}</td>
                                    <td>
                                        <a href="{{ route('ketua.anggota.show', ['gapoktan' => $poktan->gapoktan->id, 'poktan' => $poktan->id, 'anggota' => $data->id]) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('ketua.anggota.edit', ['gapoktan' => $poktan->gapoktan->id, 'poktan' => $poktan->id, 'anggota' => $data->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('ketua.anggota.destroy', ['gapoktan' => $poktan->gapoktan->id, 'poktan' => $poktan->id, 'anggota' => $data->id]) }}" method="post" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        // AJAX DataTable
        $(function() {
            $("#anggotaTable").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
@endpush
