@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('content')

    @if (session('success'))
    @push('scripts')
    <script>
        swal({
        title: "Good job!",
        text: "{{ session('success') }}",
        icon: "success",
        button: false,
        timer: 2000
    });
    </script>
    @endpush

    @elseif(session('error'))
    @push('scripts')
    <script>
        swal({
        title: "Sorry",
        text: "{{ session('error') }}",
        icon: "error",
        button: false,
        timer: 2000
    });
    </script>
    @endpush
    @endif


<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="#">Anggota</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Anggota</li>
        </ol>
    </nav>

</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-light shadow-sm components-section">
            <div class="card-body">
                <form action="{{ route('anggota_poktan.store') }}" method="post">
                    @csrf
                <div class="row mb-4">
                        <div class="col-lg-5 col-sm-6">
                            <div class="mb-3">
                                <label for="nama_anggota">Nama Anggota</label>
                                <input type="text" class="form-control {{ $errors->first('nama_anggota') ? 'is-invalid' : '' }}" id="nama_anggota" name="nama_anggota" value="{{ old('nama_anggota')  }}">
                                <div class="invalid-feedback">
                                    {{$errors->first('nama_anggota')}}
                                </div>
                            </div>
                            <div class="mb-3">
                                <fieldset>
                                    <label for="jenkel">Jenis Kelamin</label>
                                    <div class="form-check">
                                        <input class="form-check-input {{ $errors->first('jenis_kelamin') ? 'is-invalid' : '' }}" type="radio" name="jenis_kelamin" id="radio_laki" value="laki-laki" checked>
                                        <label class="form-check-label" for="radio_laki">
                                        Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input {{ $errors->first('jenis_kelamin') ? 'is-invalid' : '' }}" type="radio" name="jenis_kelamin" id="radio_perempuan" value="perempuan">
                                        <label class="form-check-label" for="radio_perempuan">
                                        Perempuan
                                        </label>
                                    </div>
                                </fieldset>
                                <div class="invalid-feedback">
                                    {{$errors->first('jenis_kelamin')}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 col-sm-6">
                            <div class="mb-3">
                                <label for="kontak">Kontak</label>
                                <div class="input-group">
                                    <span class="input-group-text"><span class="fas fa-phone"></span></span>
                                    <input type="text" class="form-control {{ $errors->first('kontak') ? 'is-invalid' : '' }}" id="kontak" name="kontak" value="{{old('kontak')}}">
                                    <div class="invalid-feedback">
                                        {{$errors->first('kontak')}}
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                {{-- <input type="submit" value="Simpan"> --}}
                                <button type="submit" class="btn btn-secondary text-dark">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
