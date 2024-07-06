@extends('app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Matakuliah <a href="/dosen/matakuliah/create" class="btn btn-outline-dark btn-sm">Tambah Matakuliah</a></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" style="text-decoration: none;">Home</a></li>
                    <li class="breadcrumb-item active">Matakuliah</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">

        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($matakuliah as $mat)
            @php
            $jurusan = $mat->getJurusan->nama;
            $dosen = $mat->getDosen ? $mat->getDosen->nama : 'Admin';
            $gabung = $jurusan ." ". $dosen;
            @endphp
            <div class="col">
                <div class="card">
                    @if (!empty($mat->foto) && $mat->foto !== 'noo')
                    <img src="{{ asset('storage/'. $mat->foto) }}" class="card-img-top" alt="..." style="object-fit: cover; height: 200px; float:center">
                    @else
                    <img src="{{ asset('storage/upload/cover.jpg') }}" class="card-img-top" alt="..." style="object-fit: cover; height: 200px; float:center">
                    @endif

                    <div class="card-body">
                        <a href="{{ route('dosen.matakuliah.lihat', $mat->id) }}" class="link-secondary">
                            <h5 class="card-title">{{ $mat->nama }}</h5>
                        </a>
                        <p class="card-text">{{ substr($gabung, 0, 40)."..." }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


@endsection