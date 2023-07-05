<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary shadow-sm" data-aos="fade-down" data-aos-delay="200">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <h3>ResepKu</h3>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('addForm') }}">Tulis Resep</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    {{-- content --}}
    <div class="row justify-content-center">
        <div class="col-6 mt-4 mb-1">
            <b>Resep Terbaru</b>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="row justify-content-start">
                @foreach ($datas as $data)
                    <div class="col-sm-4 p-2">
                        <div class="card" style="width: 15rem;">
                            <img src="{{ asset('foto1.png') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="text-secondary">{{ $data->suka }} orang Menyukai ini</p>
                                <a href="{{ route('detail', $data->id) }}"
                                    class="card-title text-decoration-none text-secondary fs-4">{{ $data->judul }}</a>
                                <p class="card-text">{{ $data->deskripsi }}</p>
                                <a href="{{ route('suka', $data->id) }}" class="btn btn-secondary w-100">Suka</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
