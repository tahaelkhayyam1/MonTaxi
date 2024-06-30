@include('includes.headerb')

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
                 <div class="mt-3">
                  <h4>{{ $user->name }}</h4>
                  <p class="text-secondary mb-1">                {{ Auth::user()->nom }} {{Auth::user()->prenom }}
                  </p>
                  <p class="text-muted font-size-sm">{{ $user->email }}</p>
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
                  {{ $user->phonenumber }}
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
                  <h6 class="mb-0">Data de Naissance</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $user->datenaissance }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Lieu de Naissance</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $user->lieu }}
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
