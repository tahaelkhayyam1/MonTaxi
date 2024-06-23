@include('includes.headerb')

<section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">				
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
Welcome                    </h1>	
                    <p class="text-white link-nav"><a href="/admin/home">Home </a>  <span class="lnr lnr-arrow-right"></span>  <span> affecter-taxi</span></p>
                </div>	
            </div>
        </div>
    </section> 


    <section class="reviews-area section-gap">


    <div class="container">
        <h1>Affecter Taxi à {{ $chauffeur->prenom }} {{ $chauffeur->nom }}</h1>
        <form action="{{ route('admin.chauffeurs.affecter-taxi.store', ['id' => $chauffeur->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="marque">Marque du Taxi</label>
                <input type="text" class="form-control" id="marque" name="marque" required>
            </div>
            <div class="form-group">
                <label for="model_year">Année du modèle</label>
                <input type="number" class="form-control" min='2012' id="model_year" name="model_year" required>
            </div>
            <div class="form-group">
                <label for="plate">Plaque d'immatriculation</label>
                <input type="text" class="form-control" id="plate" name="plate" required>
            </div>
            <div class="form-group">
                <label for="color">Couleur du Taxi</label>
                <input type="text" class="form-control" id="color" name="color" required>
            </div>
            <button type="submit" class="btn btn-primary">Affecter Taxi</button>
        </form>
    </div>
    </section>
</body>
</html>
