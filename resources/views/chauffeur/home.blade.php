@include('includes.headera')

<header id="header">
  <div class="header-top"></div>
  <div class="container main-menu">
    <div class="row align-items-center justify-content-between d-flex">
      <a href="/"><img src="{{ asset('img/logo.png') }}" alt="Logo" title="" /></a>
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="home">Accueil</a></li>
          <li class="menu-active"><a href="{{ route('chauffeur.mes_courses') }}">Mes Courses</a></li>




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
    <h2>My Reservations "hada chauffeur dashboard"</h2>
    @if ($reservations->isEmpty())
    <p>No reservations found.</p>
    @else
    <table class="table">
      <thead>
        <tr>
          <th>Client</th>
          <th>Tel</th>
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
        <td>
            <p>{{ $reservation->utilisateur->nom }} {{ $reservation->utilisateur->prenom }}</p>
        </td>
        <td>
            <p>{{ $reservation->utilisateur->phonenumber }}</p>
        </td>
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
            @php 
                $taxisCount = $taxis->count(); 
            @endphp

            @if($taxisCount > 0)
                <form action="{{ route('chauffeur.prendrecourse', $reservation->reservation_id) }}" method="POST">
                    @csrf
                    @method('POST')
                    
                    @if($taxisCount > 1)
                    <label for="">Pick your Taxi : </label> <br>

                        <select name="selected_taxi" class="form-control">
                            @foreach($taxis as $taxi)
                                <option value="{{ $taxi->id }}">{{ $taxi->marque }} ({{ $taxi->plate }})</option>
                            @endforeach
                        </select>
                    @else
                        @php 
                            $taxi = $taxis->first(); 
                        @endphp
                        <label for="">Your Taxi : </label> <br>
                        <input type="hidden" name="selected_taxi" value="{{ $taxi->id }}">
                        <label for=""> {{ $taxi->marque }} ({{ $taxi->plate }})</label> <br>

                         
                    @endif
                    
                    <button type="submit" class="btn btn-warning btn-sm mt-2">Prendre</button>
                </form>
            @else
                <p>Aucun taxi disponible</p>
            @endif
        </td>
    </tr>
    @endforeach
</tbody>

    </table>
    @endif
  </div>
</section>



</html>