@extends('app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profil {{ $mahasiswa->nama }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" style="text-decoration: none;">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" style="text-decoration: none;">Mahasiswa</a></li>
                    <li class="breadcrumb-item active">{{ $mahasiswa->id }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if ($mahasiswa->foto)
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('storage/'. $mahasiswa->foto) }}" alt="User profile picture">
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                            </svg>
                            @endif
                        </div>
                        <h3 class="profile-username text-center">{{ $mahasiswa->nama }}</h3>
                        <p class="text-muted text-center">mahasiswa</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Matakuliah</b> <a class="float-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Mahasiswa</b> <a class="float-right">543</a>
                            </li>
                        </ul>
                    </div>

                </div>


            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-3">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3>Informasi mahasiswa</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="Edit">
                            <form class="form-horizontal" method="post" action="{{ route('mahasiswa.update', $mahasiswa->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Name" value="{{ old('nama', $mahasiswa->nama) }}">
                                        @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputTanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir', $mahasiswa->tanggal_lahir) }}">
                                        @error('tanggal_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat" value="{{ old('alamat', $mahasiswa->alamat) }}">
                                        @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputNomerTelepon" class="col-sm-2 col-form-label">Nomer Telepon</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control @error('nomer_telepon') is-invalid @enderror" name="nomer_telepon" placeholder="Nomer Telepon" value="{{ old('nomer_telepon', $mahasiswa->nomer_telepon) }}">
                                        @error('nomer_telepon')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="inputEmail" placeholder="Email" value="{{ old('email', $mahasiswa->email) }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputCatatan" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
                                            @if ($mahasiswa->jenis_kelamin)
                                            <option selected value="{{ $mahasiswa->jenis_kelamin }}">{{ $mahasiswa->getJenisKelamin($mahasiswa->jenis_kelamin) }}</option>
                                            <option value="P">Perempuan</option>
                                            <option value="L">Laki-Laki</option>
                                            @else
                                            <option disabled selected>Pilih Jenis Kelamin</option>
                                            <option value="P">Perempuan</option>
                                            <option value="L">Laki-Laki</option>
                                            @endif
                                        </select>
                                        @error('jenis_kelamin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputCatatan" class="col-sm-2 col-form-label">Catatan</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control @error('catatan') is-invalid @enderror" name="catatan" placeholder="Catatan">{{ old('catatan', $mahasiswa->catatan) }}</textarea>
                                        @error('catatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" name="oldFoto" value="{{ $mahasiswa->foto }}">
                                <div class="form-group">
                                    @if ($mahasiswa->foto)
                                    <img src="{{ asset('storage/'. $mahasiswa->foto) }}" class="img-preview img-fluid col-sm-3">
                                    @else
                                    <img class="img-preview col-sm-3" id="img-preview ">
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label for="formFile" class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('foto') is-invalid @enderror" type="file" id="image" name="foto" onchange="previewImage()">
                                        @error('foto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>
</section>

<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection