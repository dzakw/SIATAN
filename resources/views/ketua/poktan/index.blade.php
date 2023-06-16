@extends('layouts.app')

@section('title', 'Data Poktan')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.admin')}}"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="#">Gapoktan</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ketua.gapoktan.show', $gapoktan->id) }}">{{ $gapoktan->nama }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Poktan</li>
            </ol>
        </nav>

    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-light shadow-sm components-section">
                <div class="card-body">
                    <p><a href="{{ route('ketua.gapoktan.show', $gapoktan->id) }}" class="btn btn-primary">&lt;&lt; Kembali ke Detail Gapoktan</a></p>
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <a href="{{ route('ketua.poktan.create', ['gapoktan' => $gapoktan]) }}" class="btn btn-primary btn-sm float-right mb-3">Tambah Poktan</a>
                        </div>
                    </div>

                    <table class="table table-hover" id="poktanTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Poktan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($poktan as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>
                                        <a href="{{ route('ketua.poktan.show', ['gapoktan' => $gapoktan, 'poktan' => $data->id]) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('ketua.poktan.edit', ['gapoktan' => $gapoktan, 'id' => $data->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('ketua.poktan.destroy', $data->id) }}" method="post" style="display:inline">
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
            $("#poktanTable").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
@endpush

