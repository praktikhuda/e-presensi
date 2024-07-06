@extends('app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Presensi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" style="text-decoration: none;">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" style="text-decoration: none;">Matakuliah</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card mb-3">
            @if (!empty($matakuliah->foto) && $matakuliah->foto !== 'noo')
            <img src="{{ asset('storage/'. $matakuliah->foto) }}" class="card-img-top" alt="..." style="object-fit: cover; height: 200px; float:center">
            @else
            <img src="{{ asset('storage/upload/cover.jpg') }}" class="card-img-top" alt="..." style="object-fit: cover; height: 200px; float:center">
            @endif
            <div class="card-img-overlay">
                <button type="button" class="btn" data-toggle="dropdown">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-gear-wide-connected" viewBox="0 0 16 16">
                        <path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5m0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78zM5.048 3.967l-.087.065zm-.431.355A4.98 4.98 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8zm.344 7.646.087.065z" />
                    </svg>
                </button>
                <ul class="dropdown-menu">
                    <li class="dropdown-item text-center">{{ $matakuliah->getJurusan->kode_jurusan }}</li>
                    <li class="dropdown-divider"></li>
                    <li class="dropdown-item"><a href="{{ route('matakuliah.presensi', $matakuliah->id) }}" class="btn">Tambah Presensi</a></li>
                    <li class="dropdown-item"><a href="{{ route('matakuliah.edit', $matakuliah->id) }}" class="btn">Edit Matakuliah</a></li>
                    <li class="dropdown-item"><a href="{{ route('matakuliah.lihatMahasiswa', $matakuliah->id) }}" class="btn">Lihat Mahasiswa</a></li>
                </ul>
            </div>
            <div class="card-body">
                <h1 class="card-title fs-1">{{ $matakuliah->nama }}</h1>
                <p class="card-text">{{ $matakuliah->getJurusan->nama }} ({{ $matakuliah->getJurusan->kode_jurusan }}) {{ $matakuliah->getDosen ? $matakuliah->getDosen->nama : 'Admin' }}</p>
            </div>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
            </div>
            <form action="{{ route('matakuliah.presensi.tambah', $matakuliah->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Presensi </label>
                        <input type="date" class="form-control @error('tanggal_presensi') is-invalid @enderror" name="tanggal_presensi" placeholder="Enter Matakuliah" value="{{ old('tanggal_presensi') }}">
                        @error('tanggal_presensi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Catatan</label>
                        <textarea class="form-control @error('catatan') is-invalid @enderror" rows="3" name="catatan">{{ old('catatan') }}</textarea>
                        @error('catatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Tambah Presentasi</button>
                </div>
            </form>
        </div>
    </div>
</section>


@endsection