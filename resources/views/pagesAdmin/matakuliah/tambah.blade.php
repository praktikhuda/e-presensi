@extends('app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Matakuliah</h1>
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
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
            </div>
            <form action="/admin/matakuliah" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <input type="hidden" value="{{ auth()->user()->id }}" name="dosen_id">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Matakuliah</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Enter Matakuliah" value="{{ old('nama') }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control @error('jurusan_id') is-invalid @enderror" name="jurusan_id">
                            <option disabled selected>Pilih Jurusan</option>
                            @foreach ($jurusan as $jur)
                            <option value="{{ $jur->id }}">{{ $jur->nama }}</option>
                            @endforeach
                        </select>
                        @error('jurusan_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <img class="img-preview col-sm-3" id="img-preview">
                    <div class="form-group">
                        <label for="formFile" class="col-sm-2 col-form-label">Foto</label>
                        <input class="form-control @error('foto') is-invalid @enderror" type="file" id="image" name="foto" onchange="previewImage()">
                        @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Tambah Matakuliah</button>
                </div>
            </form>
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