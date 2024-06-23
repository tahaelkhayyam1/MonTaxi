@include('includes.headera')

  <header id="header">
    <div class="header-top"></div>
    <div class="container main-menu">
      <div class="row align-items-center justify-content-between d-flex">
        <a href="/"><img src="{{ asset('img/logo.png') }}" alt="Logo" title="" /></a>
        <nav id="nav-menu-container">
          <ul class="nav-menu">
          <li class="menu-active"><a href="home">Accueil</a></li>
            <li class="menu-active"><a href="chauffeurs">Chaufeurs</a></li>
       
       
       
       
            <li class="menu-has-children">
              <a href="">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</a>
              <ul>
                <li><a href="profil">Profil</a></li>
                <li>
                  <a href="/login">
                    <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Logout</button>
                    </form>
                  </a>
                </li>
              </ul>
            </li>








            
          </ul>
        </nav>
      </div>
    </div>
  </header>
  <section class="home-about-area section-gap" id="home">
  <div class="wrapper">
    <div class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Users Per Month</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">{{ $passagerData->sum() + $chauffeurData->sum() }}</span>
                    <span>Users Over Time</span>
                  </p>
                </div>
                <div class="position-relative mb-4" style="height: 300px;">
                  <canvas id="users-chart" style="width: 100%; height: 100%;"></canvas>
                </div>
                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Passagers
                  </span>
                  <span>
                    <i class="fas fa-square text-gray"></i> Chauffeurs
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



  <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Liens rapides</h6>
                        <ul>
                            <li><a href="#">Emplois</a></li>
                            <li><a href="#">Actifs de la marque</a></li>
                            <li><a href="#">Relations avec les investisseurs</a></li>
                            <li><a href="#">Conditions d'utilisation</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Caractéristiques</h6>
                        <ul>
                            <li><a href="#">Emplois</a></li>
                            <li><a href="#">Actifs de la marque</a></li>
                            <li><a href="#">Relations avec les investisseurs</a></li>
                            <li><a href="#">Conditions d'utilisation</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Ressources</h6>
                        <ul>
                            <li><a href="#">Guides</a></li>
                            <li><a href="#">Recherche</a></li>
                            <li><a href="#">Experts</a></li>
                            <li><a href="#">Agences</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                    <div class="single-footer-widget">
                        <h6>Suivez-nous</h6>
                        <p>Soyons sociaux</p>
                        <div class="footer-social d-flex align-items-center">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Newsletter</h6>
                        <p>Restez à jour avec nos dernières nouvelles</p>
                        <div class="" id="mc_embed_signup">
                            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
                                <input class="form-control" name="EMAIL" placeholder="Entrer votre email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Entrer votre email '" required="" type="email">
                                <button class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>
                                <div style="position: absolute; left: -5000px;">
                                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                </div>
                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <p class="mt-80 mx-auto footer-text col-lg-12">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> Tous droits réservés | <i class="fa fa-heart-o" aria-hidden="true"></i> par <a href="https://emsi.ma/" target="_blank">Emsi</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
        <img class="footer-bottom" src="img/footer-bottom.png" alt="">
    </footer>
   <script src="{{ asset('js/app.js') }}"></script>






</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('users-chart').getContext('2d');
        var usersChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [
                    {
                        label: 'Passagers',
                        data: @json(array_values($passagerData->toArray())),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Chauffeurs',
                        data: @json(array_values($chauffeurData->toArray())),
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

</html>
