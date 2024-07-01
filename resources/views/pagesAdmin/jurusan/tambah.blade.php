@extends('app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Jurusan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" style="text-decoration: none;">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" style="text-decoration: none;">Jurusan</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
            </div>
            <form action="/admin/jurusan" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="kodeJurusan">Kode Jurusan</label>
                        <input type="text" class="form-control @error('kode_jurusan') is-invalid @enderror" name="kode_jurusan" id="kode_jurusan" placeholder="Enter Kode Jurusan" value="{{ old('kode_jurusan') }}">
                        @error('kode_jurusan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="namaJurusan">Nama Jurusan</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Enter Nama Jurusan" value="{{ old('nama') }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gelar">Gelar</label>
                        <input type="text" class="form-control @error('gelar') is-invalid @enderror" name="gelar" id="gelar" placeholder="Enter Gelar" value="{{ old('gelar') }}">
                        @error('gelar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="akreditasu">Akreditasi</label>
                        <input type="text" class="form-control @error('akreditasi') is-invalid @enderror" name="akreditasi" id="akreditasi" placeholder="Enter Akreditasi" value="{{ old('akreditasi') }}">
                        @error('akreditasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Ketua Jurusan</label>
                        <select class="form-control @error('dosen_id') is-invalid @enderror" name="dosen_id">
                            <option disabled selected>Pilih Dosen</option>
                            @foreach ($dosen as $dos)
                            <option value="{{ $dos->id }}">{{ $dos->nama }}</option>
                            @endforeach
                        </select>
                        @error('dosen_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Tambah Dosen</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection