@extends('adminlte::page')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center mb-4">
                <h3 class="my-4">DATA PROGRAM STUDI</h3>
                <h5><a href="#">UNIVERSITAS MUHAMMADIYAH KARANGANYAR</a></h5>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('posts.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">NAMA PRODI</th>
                                    <th scope="col">FAKULTAS</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->kode_prodi }}</td>
                                    <td>{{ $post->nama_prodi }}</td>
                                    <td>{!! $post->fakultas ? $post->fakultas->nama_fakultas : 'Tidak ada fakultas' !!}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">Data Post belum Tersedia.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('adminlte_css')
<style>
    .card {
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .btn-primary,
    .btn-danger {
        padding: 0.375rem 0.75rem;
    }

    .table th,
    .table td {
        vertical-align: middle;
    }

    .table th {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .table td,
    .table th {
        border: 1px solid #dee2e6;
    }

    .table-responsive {
        overflow-x: auto;
    }
</style>
@stop

@section('adminlte_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(session()->has('success'))
        toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif(session()->has('error'))
        toastr.error('{{ session('error') }}', 'GAGAL!');
    @endif
</script>
@stop
