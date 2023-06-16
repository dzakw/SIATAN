@extends('layouts.app')

@section('title', 'Data Gapoktan')

@section('content')

    @if ($notification = Session::get('success'))
    <div class="alert alert-success alert-block text-white">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $notification }}</strong>
    </div>
    @endif

    <div class="py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.admin')}}"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="#">Gapoktan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Gapoktan</li>
            </ol>
        </nav>

    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-light shadow-sm components-section">
                <div class="card-body">
                    <div class="row">

                        <table class="table table-hover" id="gapoktanTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Gapoktan</th>
                                    <th>Alamat</th>
                                    <th>Kontak</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($gapoktan as $index => $g)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $g->nama }}</td>
                                        <td>{{ $g->alamat }}</td>
                                        <td>{{ $g->kontak }}</td>
                                        <td>
                                            <a href="{{ route('ketua.gapoktan.show', $g->id) }}"
                                                class="btn btn-info btn-sm">Detail</a>
                                            <a href="{{ route('ketua.gapoktan.edit', $g->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('ketua.gapoktan.destroy', $g->id) }}" method="post"
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
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        // AJAX DataTable
        $(function() {
            $("#gapoktanTable").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
@endpush
