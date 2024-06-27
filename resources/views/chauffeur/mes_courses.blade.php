@include('includes.headerb')

    <!-- Start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">				
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
Welcome                    </h1>	
                    <p class="text-white link-nav"><a href="home">Home </a>  <span class="lnr lnr-arrow-right"></span>  <span href="/reviews"> Profil</span></p>
                </div>	
            </div>
        </div>
    </section>
    <section class="reviews-area section-gap">

<div class="container">
    <h1>Mes Courses</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nom du Passager</th>
                <th>Prénom du Passager</th>
                <th>Numéro de Téléphone</th>
                <th>Lieu de Départ</th>
                <th>Lieu d'Arrivée</th>
                <th>Heure de Départ</th>
                <th>Taxi</th>
                <th>Statut</th>
                <th>Tarif</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($reservations as $reservation)
<tr>
    <td>{{ $reservation->utilisateur->nom }}</td>
    <td>{{ $reservation->utilisateur->prenom }}</td>
    <td>{{ $reservation->utilisateur->phonenumber }}</td>
    <td>{{ $reservation->lieu_depart }}</td>
    <td>{{ $reservation->lieu_arrivee }}</td>
    <td>{{ \Carbon\Carbon::parse($reservation->heure_depart)->format('d/m/Y H:i') }}</td>
    <td>{{ $reservation->taxi->marque ?? 'N/A' }} ({{ $reservation->taxi->plate ?? 'N/A' }})</td>
    <td>{{ $reservation->statut }}</td>
    <td>{{ $reservation->tarif ?? 'N/A' }} DH</td>
</tr>
@endforeach

        </tbody>
    </table>
</div>
  
</section>



 





</body>
</html>
