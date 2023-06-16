@extends('layouts.app')

@section('title', 'Edit Poktan')

@section('content')

    <div class="py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.admin')}}"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="#">Poktan</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('ketua.poktan.show', [$poktan->gapoktan->id, $poktan->id]) }}">Edit Poktan: {{ str_contains($poktan->nama, 'Poktan') ? '' : 'Poktan ' }}{{ $poktan->nama }}</a>
                </li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-light shadow-sm components-section">
                <div class="card-body">
                    <h5 class="card-title">Edit Poktan</h5>
                    <hr>

                    <form action="{{ route('ketua.poktan.update', [$gapoktan->id, $poktan->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Poktan</label>
                            <input type="text" class="form-control" name="nama" value="{{ $poktan->nama }}" placeholder="Masukkan Nama Poktan">
                        </div>
                        <input type="hidden" name="gapoktan_id" value="{{ $gapoktan->id }}">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>


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
