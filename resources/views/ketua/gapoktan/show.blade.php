@extends('layouts.app')

@section('title', 'Detail Gapoktan')

@section('content')

    <div class="py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.admin')}}"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="{{ route('ketua.gapoktan.index') }}">Daftar Gapoktan</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('ketua.gapoktan.show', $gapoktan->id) }}">{{ str_contains($gapoktan->nama, 'Gapoktan') ? '' : 'Gapoktan '}}{{ $gapoktan->nama }}</a>
                </li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-light shadow-sm components-section">
                <div class="card-body">
                    <h5 class="card-title">Detail Gapoktan</h5>
                    <hr>

                    <div class="mb-3">
                        <label for="nama">Nama Gapoktan:</label>
                        <input type="text" value="{{ $gapoktan->nama }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="alamat">Alamat:</label>
                        <input type="text" value="{{ $gapoktan->alamat }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="kontak">Kontak:</label>
                        <input type="text" value="{{ $gapoktan->kontak }}" disabled>
                    </div>

                    <hr>

                    <h5 class="card-title">Daftar Poktan</h5>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Poktan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gapoktan->poktan as $poktan)
                                <tr>
                                    <td>{{ $poktan->nama }}</td>
                                    <td>
                                        <a href="{{ route('ketua.poktan.show', ['gapoktan' => $gapoktan->id, 'poktan' => $poktan->id])}}" class="btn btn-info btn-sm">Daftar Anggota Poktan</a>
                                        <a href="{{ route('ketua.poktan.edit', ['gapoktan' => $gapoktan->id, 'poktan' => $poktan->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('ketua.poktan.destroy', ['gapoktan' => $gapoktan->id, 'poktan' => $poktan->id]) }}" method="post"
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus</button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <hr>

                    <div class="text-right">
                        <a href="{{ route('ketua.poktan.create', ['gapoktan' => $gapoktan->id]) }}" class="btn btn-primary">Tambah Poktan</a>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

    </script>
@endsection
