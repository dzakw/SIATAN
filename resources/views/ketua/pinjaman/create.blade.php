@extends('layouts.app')

@section('title', 'Tambah Pinjaman')

@section('content')

    <div class="py-4">
        <nav aria-label="breadcrumb">

        </nav>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-light shadow-sm components-section">
                <div class="card-body">
                    <form action="{{ route('ketua.pinjaman.store', ['gapoktan' => $gapoktan->id, 'poktan' => $poktan->id, 'anggota' => $anggota_poktan->id]) }}" method="post">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-lg-5 col-sm-6">
                                <div class="mb-3">
                                    <label for="jumlah_pinjaman">Jumlah Pinjaman</label>
                                    <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                        <input type="text" class="form-control {{ $errors->first('jumlah_pinjaman') ? 'is-invalid' : '' }}"
                                            id="jumlah_pinjaman" name="jumlah_pinjaman" value="{{ old('jumlah_pinjaman') }}" required>
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('jumlah_pinjaman') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="mb-3">
                                    <label for="biaya_jasa">Biaya Jasa</label>
                                    <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                        <input type="text" class="form-control {{ $errors->first('biaya_jasa') ? 'is-invalid' : '' }}"
                                            id="biaya_jasa" name="biaya_jasa" value="{{ old('biaya_jasa') }}" required>
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('biaya_jasa') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="mb-3">
                                    <label for="tanggal_pinjaman">Tanggal Pinjam</label>
                                        <input type="text" class="form-control {{ $errors->first('tanggal_pinjaman') ? 'is-invalid' : '' }}"
                                            id="tanggal_pinjaman" name="tanggal_pinjaman" value="{{ old('tanggal_pinjaman') ?: now()->format('Y-m-d') }}" required>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('tanggal_pinjaman') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="mb-3">
                                    <input type="hidden" id="status" name="status" value="belum_lunas">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('#tanggal_pinjaman').datepicker({
                format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap4',
                todayHighlight: true,
                autoclose: true,
            });
        });
    </script>

@endsection
