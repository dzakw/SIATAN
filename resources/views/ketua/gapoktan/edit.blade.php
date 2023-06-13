@extends('layouts.app')

@section('title', 'Edit Gapoktan')

@section('content')

    <div class="py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="#">Gapoktan</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ketua.gapoktan.index') }}">Daftar Gapoktan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Gapoktan</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-light shadow-sm components-section">
                <div class="card-body">
                    <h5 class="card-title">Edit Gapoktan</h5>
                    <hr>

                    <form method="POST" action="{{ route('ketua.gapoktan.update', $gapoktan->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama">Nama Gapoktan:</label>
                            <input type="text" name="nama" value="{{ $gapoktan->nama }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="alamat">Alamat:</label>
                            <input type="text" name="alamat" value="{{ $gapoktan->alamat }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="kontak">Kontak:</label>
                            <input type="text" name="kontak" value="{{ $gapoktan->kontak }}" class="form-control">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success mr-1">Save</button>
                            <a href="{{ route('ketua.gapoktan.show', $gapoktan->id) }}" class="btn btn-danger">Cancel</a>
                        </div>

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
