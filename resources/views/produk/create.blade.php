@extends('layout.main')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Buku</h1>
      <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Products</li>
            <li class="breadcrumb-item"><a href="{{ route('buku') }}">Daftar Buku</a></li>
            <li class="breadcrumb-item active">Tambah Buku</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section" style="border-radius: 40px;">
        <div class="row">
            <div class="col-xl-12">
                <div class="card pt-2">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Data Buku</h5>
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert" style="margin-top:4px">
                                @foreach($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('aksi_t_buku') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h6 style="margin-top:16px">Nama Buku</h6>
                                <input class="form-control" name="produk_nama" type="text" placeholder="Nama Produk" aria-label="default input example">
                            <h6 style="margin-top:16px">Harga Buku</h6>
                                <input class="form-control" name="produk_harga" type="text" placeholder="Harga" aria-label="default input example">
                            <h6 style="margin-top:16px">Pilih Gambar Buku</h6>
                                <img id="imagePreview" style="max-width: 200px; max-height: 200px; margin-bottom: 16px;">
                                <input type="file" name="produk_foto" class="form-control"  class="file-upload"  onchange="previewImage(this)">
                            <h6 style="margin-top:16px">Deskripsi Buku</h6>
                                <div class="form-floating">
                                    <textarea class="form-control" name="produk_deskripsi" placeholder="Deskripsi" style="height: 100px"></textarea>
                                </div>
                            <h6 style="margin-top:16px">Status Buku</h6>
                                <select class="form-select" name="produk_status" aria-label="Default select example">
                                    <option value="1" {{ 1 }} selected>Aktif</option>
                                    <option value="0" {{ 0 }}>Tidak Aktif</option>
                                </select>
                            <input style="margin-top:24px;" type="submit" name="submit" value="Submit" class="btn btn-primary">
                            <h6 style="padding-top:10px;">klik
                                <a href="{{ route('buku') }}" style="color:#0e45fc;">disini</a> untuk kembali
                            </h6>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


  </main><!-- End #main -->

  <script>
    function previewImage(input) {
        var preview = document.getElementById('imagePreview');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
        }
    }
</script>

  @endsection
