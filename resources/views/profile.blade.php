@extends('layout.main')

@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="card">
                    <div class="card-body pt-2">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">My Profile</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                        </li>

                        <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                        </li>
                    </ul>

                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">Profile Details</h5>
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert" style="margin-top: 4px">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success" role="alert" style="margin-top:4px">
                                    {{ session('success') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert" style="margin-top:4px">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="row">
                                <img src="{{ asset('global/assets/user') }}/{{ auth()->user()->image }}" alt="Profile" class="col-lg-4 col-md-4" style="max-width: 250px; max-height: 250px;">
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Name</div>
                                <div class="col-lg-9 col-md-8">{{ auth()->user()->name }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Username</div>
                                <div class="col-lg-9 col-md-8">{{ auth()->user()->username }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Phone Number</div>
                                <div class="col-lg-9 col-md-8">{{ auth()->user()->telepon }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8">{{ auth()->user()->email }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Alamat</div>
                                <div class="col-lg-9 col-md-8">{{ auth()->user()->alamat }}</div>
                            </div>
                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                            <!-- Profile Edit Form -->
                            <form action="{{ route('editProfil')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="image" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
                                    <div class="col-md-8 col-lg-9">
                                        <img id="imagePreview" src="{{ asset('global/assets/user') }}/{{auth()->user()->image}}" width="100px" onchange="">
                                        <input type="hidden" name="foto" value="{{ asset('global/assets/user') }}/{{auth()->user()->image}}">
                                        <br>
                                        <input type="file" name="image" class="col-md-4 col-lg-3 col-form-label"  onchange="previewImage(this)">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input class="form-control" name="name" id="name" type="text" value="{{auth()->user()->name}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input class="form-control" name="username" id="username" type="text" value="{{auth()->user()->username}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="telepon" class="col-md-4 col-lg-3 col-form-label">Nomor Telephone</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input class="form-control" name="telepon" id="telepon" type="telepon" value="{{auth()->user()->telepon}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input class="form-control" name="email" id="email" type="text" value="{{auth()->user()->email}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input class="form-control" name="alamat" id="alamat" type="text" value="{{auth()->user()->alamat}}">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                                </div>
                            </form><!-- End Profile Edit Form -->
                        </div>

                        </div>

                        <div class="tab-pane fade pt-3" id="profile-change-password">
                            <!-- Change Password Form -->
                            <form action="{{ route('gantiPassword')}}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="password" name="current_pw" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="password" name="confirmpw" class="form-control" required>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <input type="submit" name="submit" value="Change Password" class="btn btn-primary">
                                </div>
                            </form>
                        </div>

                    </div><!-- End Bordered Tabs -->
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
