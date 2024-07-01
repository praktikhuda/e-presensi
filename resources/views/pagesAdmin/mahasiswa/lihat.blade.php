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
                        <p class="text-muted text-center">Mahasiswa</p>
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
                                <h3>Informasi Mahasiswa</h3>
                            </div>
                            <div class="col-sm-6 text-end align-middle">
                                <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-primary">Edit User</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="post">
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">ID</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $mahasiswa->id }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $mahasiswa->nama }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $mahasiswa->email }}">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

@endsection