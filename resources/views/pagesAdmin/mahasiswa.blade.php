@extends('app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Mahasiswa <a href="/admin/mahasiswa/create" class="btn btn-outline-dark btn-sm">Tambah Mahasiswa</a></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" style="text-decoration: none;">Home</a></li>
                    <li class="breadcrumb-item active">Mahasiswa</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Responsive Hover Table</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
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
                                @foreach ($mahasiswa as $mas)
                                <tr>
                                    <td class="align-middle">{{ $mas->id }}</td>
                                    <td class="align-middle">{{ $mas->nama }}</td>
                                    <td class="align-middle">{{ $mas->email }}</td>
                                    <td class="align-middle">{{ $mas->getJurusan->kode_jurusan }}</td>
                                    <td class="">
                                        <div class="input-group-prepend align-middle text-center">
                                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item text-center">{{ $mas->id }}</li>
                                                <li class="dropdown-divider"></li>
                                                <li class="dropdown-item"><a href="{{ route('mahasiswa.lihat', $mas->id) }}" class="btn">Lihat</a></li>
                                                <li class="dropdown-item"><a href="{{ route('mahasiswa.edit', $mas->id) }}" class="btn">Edit</a></li>
                                                <li class="dropdown-item">
                                                    <form action="{{ route('mahasiswa.hapus', $mas->id) }}" method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn link-danger" onclick="return confirm('Apakah yakin ingin menghapus {{ $mas->nama }}')">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection