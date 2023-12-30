@extends('layout.main')

@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
        </div><!-- End Page Title -->

        <section class="section" style="border-radius: 40px;">
        <div class="row">
            <div class="col-xl-12">
            <div class="card pt-2">
                <div class="card-body">
                <marquee><h3>Selamat datang di aplikasi CRUD Nusantara Infrastructure</h3></marquee>
                </div>
            </div>
            </div>
        </div>
        </section>


    </main><!-- End #main -->

@endsection
