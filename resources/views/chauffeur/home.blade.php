@include('includes.headera')

<header id="header">
  <div class="header-top"></div>
  <div class="container main-menu">
    <div class="row align-items-center justify-content-between d-flex">
      <a href="/"><img src="{{ asset('img/logo.png') }}" alt="Logo" title="" /></a>
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="home">Accueil</a></li>
          <li class="menu-active"><a href="courses">Mes Courses</a></li>




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
  <div class="container">
    <h2>My Reservations</h2>
    @if ($reservations->isEmpty())
    <p>No reservations found.</p>
    @else
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Lieu de Départ</th>
          <th>Lieu d'Arrivée</th>
          <th>Date et Heure de Départ</th>
          <th>Statut</th>
          <th>Tarif</th>
          <th>Action</th> <!-- New column for Cancel button -->
        </tr>
      </thead>
      <tbody>
        @foreach ($reservations as $reservation)
        <tr>
          <td>{{ $reservation->reservation_id }}</td>
          <td>{{ $reservation->lieu_depart }}</td>
          <td>{{ $reservation->lieu_arrivee }}</td>
          <td>{{ \Carbon\Carbon::parse($reservation->heure_depart)->format('d/m/Y H:i') }}</td>
          <td>
            <label class="badge badge-danger">
              {{ $reservation->statut }}
            </label>
          </td>
          <td>{{ $reservation->tarif ?? 'N/A' }} DH</td>
          <td>
             <form action="{{ route('passager.cancelReservation', $reservation->reservation_id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-warning btn-sm">prendre</button>
            </form>
          
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</section>



</html>