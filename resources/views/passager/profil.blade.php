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

    input {
      border: 0.5px !important;
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
            Welcome </h1>
          <p class="text-white link-nav"><a href="/passager/home">Home </a> <span class="lnr lnr-arrow-right"></span> <span href="/reviews"> Profil</span></p>
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
                  <div class="mt-3">
                    <h4>{{ $user->name }}</h4>
                    <p class="text-secondary mb-1">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</p>
                    <p class="text-muted font-size-sm">{{ $user->email }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card mb-3">
              <div class="card-body">
                <form action="" method="POST">
                  @csrf <!-- Add this if you're using Laravel's CSRF protection -->

                  <div class="row">

                    <div class="col-sm-9 text-secondary">
                      <div class="container">
                        <div class="row justify-content-around">
                          <div class="col-6">
                            <h6 class="mb-0">Nom</h6>
                            <input type="text" name="nom" class="form-control txt-field" value="{{ Auth::user()->nom }}">
                          </div>
                          <div class="col-6">
                            <h6 class="mb-0">Prenom</h6>
                            <input type="text" name="prenom" class="form-control txt-field" value="{{ Auth::user()->prenom }}">
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">CNI</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="CNI" class="form-control txt-field" value="{{ $user->CNI }}">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="phonenumber" class="form-control txt-field" value="{{ $user->phonenumber }}">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="email" name="email" class="form-control txt-field" value="{{ $user->email }}">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date de Naissance</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="date" name="datenaissance" value="{{ $user->datenaissance }}" class="form-control txt-field">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Lieu de Naissance</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="lieu" class="form-control txt-field" value="{{ $user->lieu }}">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-info">Edit</button>
                    </div>
                  </div>
                </form>
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