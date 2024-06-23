<!-- resources/views/admin/affecter_taxi_form.blade.php -->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affecter Taxi</title>
    <!-- Include your CSS and JS dependencies here -->
</head>
<body>
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
</body>
</html>
