@include('includes.headera')

<header id="header">
    <div class="header-top"></div>
    <div class="container main-menu">
      <div class="row align-items-center justify-content-between d-flex">
        <a href="/"><img src="{{ asset('img/logo.png') }}" alt="Logo" title="" /></a>
        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li class="menu-active"><a href="/">Accueil</a></li>
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
  <div class="wrapper">




    <!-- Main content -->
    <section class="home-about-area section-gap" id="home">
      
    @if(session('success'))
  <div class="alert alert-success" id="success-alert">
    {{ session('success') }}
  </div>
@endif



  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h1>All Chauffeurs</h1>
            <a href="" class="btn btn-success">Ajouter chauffeur</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @extends('layouts.app')

            <div class="container">
            <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>CNI</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Date de Naissance</th>
                <th>Lieu</th>
                <th>Taxis</th>
                <th class="noprint">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chauffeurs as $chauffeur)
                <tr>
                    <td>{{ $chauffeur->CNI }}</td>
                    <td>{{ $chauffeur->nom }}</td>
                    <td>{{ $chauffeur->prenom }}</td>
                    <td>{{ $chauffeur->email }}</td>
                    <td>{{ $chauffeur->datenaissance }}</td>
                    <td>{{ $chauffeur->lieu }}</td>
                    <td>
                        @if($chauffeur->taxis->isEmpty())
                            No Taxis Assigned
                        @else
                            <ul>
                                @foreach($chauffeur->taxis as $taxi)
                                    <li> {{ $taxi->marque }} ({{ $taxi->model_year }})
                                    <br> Plate: {{ $taxi->plate }}</li>
                                    <br>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <td class="noprint">
                    <a href="{{ route('admin.chauffeurs.view', ['id' => $chauffeur->id]) }}" class="btn btn-warning">Details</a>
                    <a href="{{ route('admin.chauffeurs.edit', $chauffeur->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.chauffeurs.delete', $chauffeur->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>CNI</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Date de Naissance</th>
                <th>Lieu</th>
                <th>Taxis</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
            </div>
          </div>
          <!-- /.card-body -->
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
    <script>
      $(function() {
        $("#example1").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      });
    </script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var successAlert = document.getElementById('success-alert');
    if (successAlert) {
      setTimeout(function() {
        successAlert.style.display = 'none';
      }, 5000); 
    }
  });
</script>
</body>

</html>