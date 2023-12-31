@extends('layouts.app')

@section('title', 'Detail Pinjaman')

@section('content')

<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.admin')}}"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="#">Pinjaman</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Pinjaman</li>
        </ol>
    </nav>

</div>


@if (session('status'))
@push('scripts')
<script>
    swal({
        title: "Good job!",
        text: "{{ session('status') }}",
        icon: "success",
        button: false,
        timer: 3000
    });

</script>
@endpush
@endif

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-light shadow-md components-section">
            <div class="card-body">
                <h4 class="text-primary mt-2 mb-3">Detail Pinjaman {{ $anggota_poktan->nama_anggota }}</h4>
                <table class="table table-bordered table-hover mt-2">
                    <tr>
                        <th>ID Pinjaman </th>
                        <td>{{ $pinjaman->id }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Pinjaman </th>
                        <td>{{ $pinjaman->created_at->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <th>Nama Anggota </th>
                        <td>{{ $anggota_poktan->nama_anggota }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Peminjaman </th>
                        <td>@currency($pinjaman->nominal)</td>
                    </tr>
                    <tr>
                        <th>Jumlah Pinjaman </th>
                        <td>@currency($pinjaman->jumlah_pinjaman)</td>
                    </tr>
                    <tr>
                        <th>Tenggat bayar </th>
                        <td>{{ $invoice->tenggat_tagihan }} Bulan</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td>@currency($pinjaman->jumlah_tagihan + $pinjaman->biaya_jasa)</td>
                    </tr>
                    <tr>
                        <th>Status Pinjaman</th>
                        @if ($pinjaman->status == "pending")
                        <td> <span class="btn btn-tertiary btn-sm">Pending</span></td>
                        @elseif($pinjaman->status == "lunas")
                        <td><span class="btn btn-success btn-sm">Lunas</span></td>
                        @else
                        <td><span class="btn btn-danger btn-sm">Belum Lunas</span></td>
                        @endif
                    </tr>
                </table>
                <div class="float-right">
                    <form action="{{ route('pinjaman-ketua.update', $pinjaman->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @if ($pinjaman->status != 'lunas')
                        <button type="submit" class="btn btn-primary btn-md"> <i class="fas fa-check"></i> Konfirmasi
                            Success</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<style>
    td {
        font-weight: 900;
    }

</style>
