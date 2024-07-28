@extends('kerangka.master')

@section('title', 'Perpustakaan')

@section('header', 'Perpustakaan')

@section('subheader', 'List Buku')

@section('link-header', '/perpuses')

@section('content')
    <!-- Basic Tables start -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <h3 class="card-title">List Buku</h3>
                            <div class="card-tools">
                                <a href="{{ route('perpuses.create') }}" class="btn btn-primary btn-sm">Tambah Data Buku</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">NO</th>
                                            <th>ISBN</th>
                                            <th>Judul</th>
                                            <th>Penulis</th>
                                            <th>Penerbit</th>
                                            <th>Tahun</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th style="width: 150px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($perpuses as $perpus)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $perpus->isbn }}</td>
                                                <td>{{ $perpus->title }}</td>
                                                <td>{{ $perpus->author }}</td>
                                                <td>{{ $perpus->publisher }}</td>
                                                <td>{{ $perpus->year }}</td>
                                                <td>
                                                    @if ($perpus->status == 'Tersedia')
                                                        <span class="badge bg-success">{{ $perpus->status }}</span>
                                                    @else
                                                        <span class="badge bg-danger">{{ $perpus->status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <img src="{{ asset('storage/' . $perpus->image) }}" alt="Gambar Buku"
                                                        class="img-thumbnail" style="max-width: 5rem; width: 100%; max-height: 5rem; object-fit: cover; object-position: center; border-radius: 0.25rem;">

                                                </td>
                                                <td>
                                                    <a href="{{ route('perpuses.edit', $perpus->id) }}"
                                                        class="btn btn-sm btn-warning">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('perpuses.destroy', $perpus->id) }}"
                                                        method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button
                                                            onclick="return confirm('Apakah Benar ingin Menghapus ini?')"
                                                            class="btn btn-sm btn-danger">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <div class="card-footer">
                                {{ $perpuses->links() }}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Tables end -->
@endsection
