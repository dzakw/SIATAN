@extends('layouts.app')

@section('title', 'Pinjaman')

@section('content')

    <div class="card mb-4">
        <div class="card-body">
            <h4 class="card-title font-weight-bold">Daftar Pinjaman</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-light shadow-sm components-section">
                <table class="table table-bordered" id="pinjamanTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Anggota</th>
                            <th>Poktan</th>
                            <th>Gapoktan</th>
                            <th>Tanggal Pinjam</th>
                            <th>Jumlah Pinjaman</th>
                            <th>Biaya Jasa</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pinjaman as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->anggota_poktan->nama_anggota }}</td>
                                <td>{{ $item->anggota_poktan->poktan->nama }}</td>
                                <td>{{ $item->anggota_poktan->poktan->gapoktan->nama }}</td>
                                <td>{{ $item->tanggal_pinjaman }}</td>
                                <td>{{ $item->jumlah_pinjaman }}</td>
                                <td>{{ $item->biaya_jasa }}</td>
                                <td>
                                    @if($item->status == 'belum_lunas')
                                        <span class="btn btn-danger btn-sm" style="color: white;">Belum Lunas</span>
                                    @else
                                        <span class="btn btn-info btn-sm" style="color: white;">Lunas</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('ketua.pinjaman.bayar', [$item->anggota_poktan->poktan->gapoktan->id, $item->anggota_poktan->poktan->id, $item->anggota_poktan->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Bayar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#pinjamanTable').DataTable();
        } );
    </script>
@endsection

