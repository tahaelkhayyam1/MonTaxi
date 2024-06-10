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
Welcome                    </h1>	
                    <p class="text-white link-nav"><a href="/admin/home">Home </a>  <span class="lnr lnr-arrow-right"></span>  <span href="/reviews"> Profil</span></p>
                </div>	
            </div>
        </div>
    </section>
    <section class="reviews-area section-gap">

    <div class="container">
    <div class="main-body">    
      <div class="row gutters-sm">
        <div class="col-md-4 mb-6">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="data:image/jpeg;base64,{{ base64_encode($user->user_img) }}" alt="Admin" class="rounded-circle" width="150">
                <div class="mt-3">
                  <h4>{{ $user->name }}</h4>
                  <p class="text-secondary mb-1">{{ $user->email }}</p>
                  <p class="text-muted font-size-sm">{{ $user->profession }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Full Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                {{ Auth::user()->nom }} {{Auth::user()->prenom }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">CNE</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $user->CNI }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Phone</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $user->tel }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $user->email }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Role</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $user->role }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-12">
                  <a class="btn btn-info " href="">Edit</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





  
</section>









</body>
</html>
