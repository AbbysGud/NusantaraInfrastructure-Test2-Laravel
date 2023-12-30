@extends('layout.main')

@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
        <h1>Daftar Buku</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Products</li>
                <li class="breadcrumb-item active">Daftar Buku</li>
            </ol>
        </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card pt-2">
                        <div class="card-body">
                            <h5 class="card-title">Tabel Buku</h5>
                            @if(session('success'))
                                <div class="alert alert-success" role="alert" style="margin-top:4px">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <a href="{{ route('t_buku') }}"><button type="button" class="btn btn-primary">Tambah Data</button></a>
                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Buku</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produk as $no => $hasil)
                                        <tr>
                                            <th>{{ $no+1 }}</th>
                                            <td>{{ $hasil->produk_nama }}</td>
                                            <td>Rp. {{ number_format($hasil->produk_harga, 2) }}</td>
                                            <td>
                                                <a href="{{ asset('global/assets/produk') }}/{{ $hasil->produk_foto }}" target="_blank">
                                                    <img src="{{ asset('global/assets/produk') }}/{{ $hasil->produk_foto }}" style="max-width:110px; max-height:20%;">
                                                </a>
                                            </td>
                                            <td>@if($hasil->produk_status==1) <b class="text-success">Aktif</b> @else <b class="text-danger">Tidak Aktif</b> @endif</td>
                                            <td>
                                                <form action="{{ route('aksi_h_buku', $hasil->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('e_buku', $hasil->id) }}" class="btn btn-primary">Edit</a>
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

  @endsection
