@extends('layouts.app')

@section('title', 'Data Anggota')

@section('content')


<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="#">Anggota</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Anggota</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-light shadow-sm components-section">
            <div class="card-body">
                <div class="row">

                  <div class="col-12 col-xl-8">
                    <div class="card card-body bg-white border-light shadow-sm mb-4">
                        <h2 class="h5 mb-4">Informasi Umum</h2>
                        <form action="{{ route('anggota_poktan.update', [$anggota_poktan->id]) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div>
                                        <label for="nama_anggota">Nama</label>
                                        <input class="form-control {{ $errors->first('nama_anggota') ? 'is-invalid' : '' }}" name="nama_anggota" type="text" value="{{ $anggota->nama_anggota }}" required>
                                        <div class="invalid-feedback">
                                            {{$errors->first('nama_anggota')}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-md-6 mb-3">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-select mb-0 {{ $errors->first('jenis_kelamin') ? 'is-invalid' : '' }}" name="jenis_kelamin" aria-label="jenis_kelamin select example">
                                        <option value="laki-laki" {{ $anggota->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="perempuan" {{ $anggota->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        {{$errors->first('jenis_kelamin')}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="kontak">Kontak</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><span class="fas fa-phone"></span></span>
                                        <input type="text" class="form-control {{ $errors->first('kontak') ? 'is-invalid' : '' }}" name="kontak" value="{{ $anggota_poktan->kontak }}">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                        <h2 class="h5 my-4">Adress</h2>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="card border-light text-center p-0">
                                <div class="profile-cover rounded-top" style="background-image: url('https://cdn.consumerscu.org/wp-content/uploads/2019/08/checking_account_1566231082.jpeg')"></div>
                                <div class="card-body pb-5">
                                    <img src="https://ui-avatars.com/api/?name={{ $anggota_poktan['nama_anggota'] }}&uppercase=false&background=random&color=random&size=128&font-size=0.33" class="user-avatar large-avatar rounded-circle mx-auto mt-n7 mb-4" alt="{{ $anggota_poktan['nama_anggota'] }}">
                                    <h4 class="h3">{{ $anggota_poktan['nama_anggota'] }}</h4>
                                    <h5 class="font-weight-normal">Kelompok Tani</h5>
                                </div>
                             </div>
                        </div>
                        <div class="col-12">
                            <div class="card card-body bg-white border-light shadow-sm mb-4">
                                <h2 class="h5 mb-4">Select profile photo</h2>
                                <div class="d-xl-flex align-items-center">
                                    <div>
                                        <!-- Avatar -->
                                        <div class="user-avatar xl-avatar mb-3">
                                            <img class="rounded" src="../assets/img/team/profile-picture-3.jpg" alt="change avatar">
                                        </div>
                                    </div>
                                    <div class="file-field">
                                        <div class="d-flex justify-content-xl-center ml-xl-3">
                                           <div class="d-flex">
                                              <span class="icon icon-md"><span class="fas fa-paperclip mr-3"></span></span> <input type="file">
                                              <div class="d-md-block text-left">
                                                 <div class="font-weight-normal text-dark mb-1">Choose Image</div>
                                                 <div class="text-gray small">JPG, GIF or PNG. Max size of 800K</div>
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
