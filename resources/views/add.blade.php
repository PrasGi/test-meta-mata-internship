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
            <h2 class="text-secondary">Tulis Resepmu ...</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-6">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @error('error')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            <form action="{{ route('add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                        name="judul">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                    <textarea type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="deskripsi"> </textarea>
                </div>
                <div class="" id="bahan-container">
                    <label for="exampleInputPassword1" class="form-label">Bahan Bahan</label>
                    <input type="text" class="form-control mb-1" name="bahan[]">
                </div>
                <div class="mb-3">
                    <a href="#" onclick="addBahan()">+ item bahan</a>
                </div>
                <div class="" id="langkah-container">
                    <label for="exampleInputPassword1" class="form-label">Langkah Lagkah</label>
                    <input type="text" class="form-control mb-1" name="langkah[]">
                </div>
                <div class="mb-3">
                    <a href="#" onclick="addLangkah()">+ item langkah</a>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Uplode foto masakan</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="gambar">
                </div>
                <div class="w-100">
                    <button type="submit" class="btn btn-secondary w-100">Terbitkan Resep</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script>
        function addBahan() {
            var container = document.getElementById("bahan-container");
            var input = document.createElement("input");
            input.type = "text";
            input.className = "form-control";
            input.name = "bahan[]";
            container.appendChild(input);
        }

        function addLangkah() {
            var container = document.getElementById("langkah-container");
            var input = document.createElement("input");
            input.type = "text";
            input.className = "form-control";
            input.name = "langkah[]";
            container.appendChild(input);
        }
    </script>
</body>

</html>
