@extends('app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Jurusan {{ $jurusan->kode_jurusan }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" style="text-decoration: none;">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" style="text-decoration: none;">Jurusan</a></li>
                    <li class="breadcrumb-item active">{{ $jurusan->nama }}</li>
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
            <form action="/admin/jurusan/{{ $jurusan->id }}" method="post" enctype="multipart/form-data" id="edit-form">
                @method('put')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="kodeJurusan">Kode Jurusan</label>
                        <input type="text" class="form-control @error('kode_jurusan') is-invalid @enderror" name="kode_jurusan" id="kode_jurusan" placeholder="Enter Kode Jurusan" value="{{ old('kode_jurusan', $jurusan->kode_jurusan) }}">
                        @error('kode_jurusan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="namaJurusan">Nama Jurusan</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Enter Nama Jurusan" value="{{ old('nama', $jurusan->nama) }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gelar">Gelar</label>
                        <input type="text" class="form-control @error('gelar') is-invalid @enderror" name="gelar" id="gelar" placeholder="Enter Gelar" value="{{ old('gelar', $jurusan->gelar) }}">
                        @error('gelar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="akreditasu">Akreditasi</label>
                        <input type="text" class="form-control @error('akreditasi') is-invalid @enderror" name="akreditasi" id="akreditasi" placeholder="Enter Akreditasi" value="{{ old('akreditasi', $jurusan->akreditasi) }}">
                        @error('akreditasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Ketua Jurusan</label>
                        <select class="form-control @error('dosen_id') is-invalid @enderror" name="dosen_id">
                            @foreach ($dosen as $dos)
                            @if (old('dosen_id', $jurusan->dosen_id) == $dos->id)
                            <option value="{{ $dos->id }}" selected>{{ $dos->nama }}</option>
                            @else
                            <option value="{{ $dos->id }}">{{ $dos->nama }}</option>
                            @endif
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
                    <button type="submit" class="btn btn-primary">Edit Jurusan</button>
                    <button type="button" class="btn btn-secondary" id="exit-btn">Keluar</button>
                </div>
            </form>
        </div>
    </div>

</section>

<!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Konfirmasi</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin keluar tanpa menyimpan perubahan?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="confirm-exit-btn">Ya, Keluar</button>
            </div>
        </div>
    </div>
</div>

<script>
    const initialFormData = new FormData(document.getElementById('edit-form'));

    function isFormChanged() {
        const currentFormData = new FormData(document.getElementById('edit-form'));
        for (const [key, value] of initialFormData.entries()) {
            if (currentFormData.get(key) !== value) {
                return true;
            }
        }
        return false;
    }

    document.getElementById('exit-btn').addEventListener('click', function(event) {
        if (isFormChanged()) {
            $('#confirmModal').modal('show');
        } else {
            window.location.href = '/admin/jurusan';
        }
    });

    document.getElementById('confirm-exit-btn').addEventListener('click', function() {
        window.location.href = '/admin/jurusan';
    });
</script>

@endsection