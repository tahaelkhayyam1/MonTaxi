<!doctype html>
<html lang="en">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Taxi - All Reviews</title>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Taxi - Login</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/linearicons@1.0.0/dist/font/linearicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .card {
            border: 1px solid #f9d700;
            border-radius: 15px;
        }
        .card-header {
            background-color: #f9d700;
            color: #222;
            text-align: center;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .btn-primary {
            background-color: #f9d700;
            border-color: #f9d700;
            color: #222;
        }
        .btn-primary:hover {
            background-color: #f9d700;
            border-color: #f9d700;
        }
    </style>
</head>
<body>
    <!-- Start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">				
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        All Reviews				
                    </h1>	
                    <p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/reviews"> All Reviews</a></p>
                </div>	
            </div>
        </div>
    </section>
 





    <section class="reviews-area section-gap">
    <div class="container">
        <div class="row section-title">
            <h1>Avis des clients</h1>
            <p>Pour ceux qui sont extrêmement attachés au système respectueux de l'environnement.</p>
        </div>                    
        <div class="row">
            @if($reviews->isEmpty())
                <div class="col-12">
                    <p>Aucun avis pour le moment.</p>
                </div>
            @else
            @foreach ($reviews as $review)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-review">
                            <h4>{{ $review->name }}</h4>
                            <p>{{ $review->review }}</p>
                            <div class="star">
                                @for ($i = 0; $i < 5; $i++)
                                    <span class="fa fa-star {{ $i < $review->rating ? 'checked' : '' }}"></span>
                                @endfor
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    
    </div>    
</section>









</body>
</html>
