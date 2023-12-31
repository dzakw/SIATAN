@extends('layouts.app')

@section('title', 'Edit Pinjaman')

@section('content')


<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-light shadow-sm components-section">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-lg-4 col-sm-6">
                        <form action="{{ route('pinjaman.update', $data_pinjaman->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="anggota_id">ID Anggota</label>
                                {{-- <input type="text" class="form-control {{ $errors->first('anggota_id') ? 'is-invalid' : '' }}" id="anggota_id" name="anggota_id"> --}}
                                <select class="form-select {{ $errors->first('anggota_id') ? 'is-invalid' : '' }}" name="anggota_id" id="anggota_id">
                                    <option value="{{ $data_pinjaman->anggota->id }}" selected>{{ $data_pinjaman->anggota->nama_anggota }} - {{ $data_pinjaman->anggota->no_ktp }}</option>
                                    @foreach ($data_anggota as $anggota)
                                    <option value="{{ $anggota->id }}">{{ $anggota->nama_anggota }} - {{ $anggota->no_ktp }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{$errors->first('anggota_id')}}
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nama_anggota">Nama Anggota</label>
                                <input type="text" class="form-control {{ $errors->first('nama_anggota') ? 'is-invalid' : '' }}" id="nama_anggota" name="nama_anggota" value="{{ $data_pinjaman->anggota->nama_anggota }}">
                                <div class="invalid-feedback">
                                    {{$errors->first('nama_anggota')}}
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nominal">Jumlah</label>
                                <input type="text" class="form-control {{ $errors->first('nominal') ? 'is-invalid' : '' }}" id="nominal" name="nominal" autocomplete="off" value="{{ $data_pinjaman->nominal }}" readonly>
                                <div class="invalid-feedback">
                                    {{$errors->first('nominal')}}
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="jangka_waktu">Jangka Waktu (bulan)</label>
                                <input type="text" class="form-control {{ $errors->first('jangka_waktu') ? 'is-invalid' : '' }}" id="jangka_waktu" name="jangka_waktu" value="{{ $data_pinjaman->jangka_waktu }}" readonly>
                                <div class="invalid-feedback">
                                    {{$errors->first('jangka_waktu')}}
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="perbulan">Perbulan</label>
                                <input type="text" class="form-control {{ $errors->first('perbulan') ? 'is-invalid' : '' }}" id="perbulan" name="perbulan" value="{{ $data_pinjaman->bayar_perbulan }}" readonly>
                                <div class="invalid-feedback">
                                    {{$errors->first('perbulan')}}
                                </div>
                            </div>
                            <div class="my-4">
                                <label for="textarea">Keterangan</label>
                                <textarea class="form-control {{ $errors->first('keterangan') ? 'is-invalid' : '' }}" placeholder="Tulis keterangan..." id="keterangan" name="keterangan" rows="4">{{ $data_pinjaman->keterangan }}</textarea>
                                <div class="invalid-feedback">
                                    {{$errors->first('keterangan')}}
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
    </div>
</div>

@endsection

@push('scripts')
    <script>
        document.getElementById("anggota_id").addEventListener("change", function(e) {
            let get_anggota = this.options[this.selectedIndex].text.slice(0, -6);
            document.getElementById("nama_anggota").value = get_anggota;
        });

        // On keyUp input jumlah
        const nominal = document.getElementById('nominal');
        nominal.addEventListener('keyup', updateValue);

        jangka_waktu.addEventListener('keyup', updateValue);

        function updateValue(e) {
            const cek_attr = e.target.getAttribute('name');

            if (cek_attr === 'nominal') {
                const jangka_waktu = document.getElementById('jangka_waktu').value;

                const pinjam = e.target.value;
                const pokok = pinjam / jangka_waktu;
                const total = pokok;
                document.getElementById('perbulan').value = total;

            } else {
                const jangka_waktu = e.target.value;

                const pinjam = document.getElementById('nominal').value;
                const pokok = pinjam / jangka_waktu;
                const total = pokok;
                document.getElementById('perbulan').value = total;
            }
        }
    </script>

@endpush
