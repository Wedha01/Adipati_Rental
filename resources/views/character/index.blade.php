<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Adipati Rental</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Bootstrap 5 CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Core theme CSS-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
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

        .portfolio-caption {
            text-align: center;
        }

        /* Ensure portfolio images are square and uniform */
        .portfolio-img-square {
            width: 300px; /* Fixed width */
            height: 300px; /* Fixed height */
            object-fit: cover; /* Crop image to fit square */
            aspect-ratio: 1/1; /* Enforce square aspect ratio */
            display: block;
            margin: 0 auto; /* Center image */
        }

        /* Ensure portfolio item container centers the image */
        .portfolio-item {
            text-align: center;
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .portfolio-img-square {
                width: 100%; /* Full width on small screens */
                height: 250px; /* Slightly smaller height */
            }
        }
    </style>
</head>
<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="{{ route('characters.index') }}">
                <img src="{{ $i->isNotEmpty() ? asset($i->first()->logo) : '' }}" height="50" alt="Adipati Rental" />
            </a>
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
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Adipati Rental</div>
            <div class="masthead-heading">What's The Plan Today?</div>
        </div>
    </header>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">DRIVER</h2>
            </div>
            <div class="row">
                @foreach ($e as $ev)
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item -->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal{{ $ev->id }}">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid portfolio-img-square" src="{{ asset($ev->file) }}" alt="Driver Image" />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">{{ $ev->nama }}</div>
                            <div class="portfolio-caption-subheading text-muted">{{ $ev->status }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright © Adipati Rental</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/get_good.1/" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Portfolio Modals-->
    @foreach ($e as $ev)
    <div class="modal fade" id="portfolioModal{{ $ev->id }}" tabindex="-1" aria-labelledby="portfolioModalLabel{{ $ev->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase" id="portfolioModalLabel{{ $ev->id }}">{{ $ev->nama }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    @if ($ev->file)
                        <img class="img-fluid d-block mx-auto mb-4" src="{{ asset($ev->file) }}" alt="Driver Image" />
                    @else
                        <p class="text-muted">No image available</p>
                    @endif
                    <p class="item-intro text-muted">{{ $ev->status ?? 'No description available' }}</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary text-uppercase" data-bs-dismiss="modal" type="button">
                        <i class="fas fa-times me-1"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Bootstrap 5 JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="{{ asset('js/scripts.js') }}" defer></script>
    <!-- SB Forms JS -->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>