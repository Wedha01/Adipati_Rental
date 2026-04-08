<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>GetGood</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Core theme CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Montserrat', sans-serif;
        }

        .masthead {
            position: relative;
            height: 100vh;
            min-height: 500px;
            @if ($i->isNotEmpty())
                background: url('{{ asset($i->first()->banner) }}') no-repeat center center;
                background-size: cover;
                background-position: center;
            @endif
        }

        .masthead::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .masthead .container {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
            top: 50%;
            transform: translateY(-50%);
        }

        .masthead-subheading {
            font-size: 50px;
            font-weight: 700;
            text-transform: uppercase;
            animation: fadeInDown 1s ease-out;
        }

        .masthead-heading {
            font-size: 24px;
            font-weight: 300;
            margin: 20px 0;
            animation: fadeInUp 1s ease-out;
            color: #ffc107;
        }

        .masthead .btn {
            font-size: 18px;
            padding: 15px 30px;
            background-color: #ffc107;
            border: none;
            color: #000;
            text-transform: uppercase;
            font-weight: 700;
            animation: fadeInUp 1s ease-out 0.5s;
            animation-fill-mode: both;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .masthead .btn:hover {
            background-color: #e0a800;
            color: #fff;
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Form Section Styling */
        .order-section {
            padding: 60px 0;
            background-color: #f8f9fa;
        }

        .order-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .order-form h2 {
            color: #212529;
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
            text-transform: uppercase;
        }

        .form-group label {
            font-weight: 600;
            color: #212529;
        }

        .form-control:focus {
            border-color: #ffc107;
            box-shadow: 0 0 0 0.2rem rgba(255,193,7,0.25);
        }

        .btn-submit {
            background-color: #ffc107;
            color: #000;
            font-weight: 700;
            padding: 12px 30px;
            border: none;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #e0a800;
            color: #fff;
        }

        .orders-list {
            max-width: 600px;
            margin: 30px auto 0;
        }

        .orders-list h3 {
            color: #212529;
            font-weight: 700;
            margin-bottom: 20px;
        }
    </style>
</head>
<body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
        <img src="{{ $i->isNotEmpty() ? asset($i->first()->logo) : '' }}" height="50" alt="Adipati Rental" />
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('characters.index') }}">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('characters.page') }}">UNIT</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('characters.pendaftaran') }}">PESAN</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Masthead -->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Adipati Rental</div>
            <div class="masthead-heading">What's The Plan Today?</div>
        </div>
    </header>

    <!-- Order Form Section -->
    <section class="order-section">
        <div class="container">
            <div class="order-form">
                <h2>Pemesanan</h2>
                <h5>Pesanan akan langsung ke Whatsapp</h5>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                <form action="{{ route('pendaftaran.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="jam">Jam</label>
                        <input type="time" class="form-control" name="jam" id="jam value="{{ old('jam') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="unit">Unit</label>
                        <input type="text" class="form-control" name="unit" id="unit" value="{{ old('unit') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="driver">Driver (optional)</label>
                        <input type="text" class="form-control" name="driver" id="driver" value="{{ old('driver') }}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="tambahan">Tambahan/Tujuan</label>
                        <textarea class="form-control" name="tambahan" id="tambahan" rows="3">{{ old('tambahan') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-submit w-100">Place Order</button>
                </form>
            </div>



    <!-- Footer -->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright © Adipati Rental</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/get_good.1/" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>