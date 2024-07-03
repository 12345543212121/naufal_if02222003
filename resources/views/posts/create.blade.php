@extends('adminlte::page')
@section('content')

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded bg-white">
                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">KODE PRODI</label>
                            <input type="text" class="form-control custom-input @error('kode_prodi') is-invalid @enderror" name="kode_prodi" value="{{ old('kode_prodi') }}" placeholder="Masukkan Kode Prodi">
                            @error('kode_prodi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">NAMA PRODI</label>
                            <input type="text" class="form-control custom-input @error('nama_prodi') is-invalid @enderror" name="nama_prodi" value="{{ old('nama_prodi') }}" placeholder="Masukkan Nama Prodi">
                            @error('nama_prodi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">ID FAKULTAS</label>
                            <select class="form-control custom-select @error('fakultas_id') is-invalid @enderror" style="width: 100%;" name="fakultas_id" id="fakultas_id">
                                <option disabled selected>PILIH FAKULTAS</option>
                                @foreach ($fak as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_fakultas }}</option>
                                @endforeach
                            </select>
                            @error('fakultas_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-danger">RESET</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('adminlte_css')
<style>
    .custom-input {
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
    }

    .custom-select {
        border: 1px solid #ced4da;
    }

    .card {
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
</style>
@stop

@section('adminlte_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
@stop
