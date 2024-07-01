@extends('app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Matakuliah</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" style="text-decoration: none;">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" style="text-decoration: none;">Mahasiswa</a></li>
                    <li class="breadcrumb-item active">{{ $matakuliah->nama }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card mb-3">
            <img src="{{ asset('storage/upload/cover.jpg') }}" class="card-img-top" alt="..." style="object-fit: cover; height: 200px; float:center">
            <div class="card-body">
                <h1 class="card-title fs-1">{{ $matakuliah->nama }}</h1>
                <p class="card-text">{{ $matakuliah->getJurusan->nama }} ({{ $matakuliah->getJurusan->kode_jurusan }}) {{ $matakuliah->getDosen ? $mat->getDosen->nama : 'Admin' }}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <div class="input-group-append">
                            <a href="" class="btn btn-primary">Tambah Presensi</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Mahasiswa</th>
                            <th>Email Mahasiswa</th>
                            <th>Nama Jurusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>223110</td>
                            <td>Muhammad Samsul Huda</td>
                            <td>praktikhuda@gamil.com</td>
                            <td>Rekayasa Perangkat Lunak Aplikasi</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection