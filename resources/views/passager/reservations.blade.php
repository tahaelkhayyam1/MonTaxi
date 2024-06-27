@include('includes.headerb')

<!-- Start banner Area -->
<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Welcome </h1>
                <p class="text-white link-nav"><a href="home">Home </a> <span class="lnr lnr-arrow-right"></span> <span href="/reviews"> Reservations</span></p>
            </div>
        </div>
    </div>
</section>
<section class="reviews-area section-gap">

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
                    <td>{{ $reservation->heure_depart->format('d/m/Y H:i') }}</td>
                    <td>
                        <label class="badge 
        @if($reservation->statut == 'en_attente') 
            badge-warning
        @elseif($reservation->statut == 'terminee') 
            badge-success
        @elseif($reservation->statut == 'annulee') 
            badge-danger
        @else
            badge-success
        @endif">
                            {{$reservation->statut}}
                        </label>
                    </td>
                    <td>{{ $reservation->tarif ?? 'N/A' }}</td>
                    <td>
                        @if ($reservation->statut === 'en_attente')
                        <form action="{{ route('passager.cancelReservation', $reservation->reservation_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Annuler</button>
                        </form>


                        @elseif ($reservation->statut === 'encours')
                        <form action="{{ route('passager.terminercourse', $reservation->reservation_id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-info">Terminer Cours</button>
                        </form>
                        @elseif ($reservation->statut === 'terminee')
                        <a href="LaisserAvis">    <span class="text-muted">Laisser votre <span class="badge-info">avis</span> </span></a>
                        @else
                        <a href="LaisserAvis">    <span class="text-muted">Non <span >annulable</span> </span></a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>