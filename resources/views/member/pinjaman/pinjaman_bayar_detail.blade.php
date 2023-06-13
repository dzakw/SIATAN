@extends('layouts.app')

@section('title', 'Detail Pinjaman')

@section('content')


@if ($message = Session::get('success'))
@push('scripts')
<script>
    swal({
        title: "Berhasil!",
        text: "{{ session('success') }}",
        icon: "success",
        button: false,
        timer: 3000
    });

</script>
@endpush
@endif


<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-light shadow-sm components-section">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-lg-4 col-sm-6">
                        <h4>Detail Pinjaman</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Jumlah Pinjaman</th>
                                    <td>{{ $data_pinjaman->jumlah_pinjaman }}</td>
                                </tr>
                                <tr>
                                    <th>Tenggat Pinjaman</th>
                                    <td>{{ $data_pinjaman->invoice->tenggat_pinjaman }} bulan</td>
                                </tr>
                                <tr>
                                    <th>Status Pinjaman</th>
                                    <td>{{ $data_pinjaman->status }}</td>
                                </tr>
                            </thead>
                        </table>
                        <br>

                    </div>
                </div>

                <form action="{{ route('pinjaman.bayar.post', ['id' => $data_pinjaman->id, 'pembayaran_id' => $detail_pinjaman->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="tanggal_jatuh_tempo">Tenggat Pinjaman</label>
                        <input type="text" class="form-control {{ $errors->first('tanggal_jatuh_tempo') ? 'is-invalid' : '' }}" id="tanggal_jatuh_tempo" name="tanggal_jatuh_tempo" value="{{ date('d-m-Y', strtotime($data_pinjaman->invoice->tenggat_pinjaman)) }}">
                        <div class="invalid-feedback">
                            {{$errors->first('tanggal_jatuh_tempo')}}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_bayar">Tanggal Pembayaran</label>
                        <input type="text" class="form-control {{ $errors->first('tanggal_bayar') ? 'is-invalid' : '' }}" id="tanggal_bayar" name="tanggal_bayar" value="{{ date('d-m-Y', strtotime('now')) }}">
                        <div class="invalid-feedback">
                            {{$errors->first('tanggal_bayar')}}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="telat">Telat (hari)</label>

                        <input type="text" class="form-control {{ $errors->first('telat') ? 'is-invalid' : '' }}" id="telat" name="telat" readonly value="{{ $telat_hari }}">
                        <div class="invalid-feedback">
                            {{$errors->first('telat')}}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="denda">Denda</label>
                        <input type="text" class="form-control {{ $errors->first('denda') ? 'is-invalid' : '' }}" id="denda" name="denda" readonly value="{{ $denda }}">
                        <div class="invalid-feedback">
                            {{$errors->first('denda')}}
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-secondary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
