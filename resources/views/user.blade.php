@extends('layout.main')

@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Daftar User</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Pengelolaan User</li>
                <li class="breadcrumb-item active">Data User</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card pt-2">
                        <div class="card-body">
                            <h5 class="card-title">Tabel User</h5>
                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">No. Telp</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Foto Profil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($user as $hasil)
                                        <tr>
                                            <th>{{ $no++ }}</th>
                                            <td>{{ $hasil->name }}</td>
                                            <td>{{ $hasil->telepon }}</td>
                                            <td>{{ $hasil->email}}</td>
                                            <td>{{ $hasil->alamat }}</td>
                                            <td>
                                                <a href="{{ asset('global/assets/user') }}/{{ $hasil->image }}" target="_blank">
                                                    <img src="{{ asset('global/assets/user') }}/{{ $hasil->image }}" width="100px">
                                                </a>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

  @endsection
