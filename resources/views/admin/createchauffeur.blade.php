@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter Chauffeur</h1>
    <form id="chauffeurForm" method="POST" action="{{ route('admin.chauffeurs.store') }}">
        @csrf
        <div id="chauffeur-section">
            <div class="form-group">
                <label for="CNI">CNI</label>
                <input type="text" class="form-control" id="CNI" name="CNI" required>
            </div>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="datenaissance">Date de Naissance</label>
                <input type="date" class="form-control" id="datenaissance" name="datenaissance" required>
            </div>
            <div class="form-group">
                <label for="lieu">Lieu</label>
                <input type="text" class="form-control" id="lieu" name="lieu" required>
            </div>
            <div class="form-group">
                <label for="phonenumber">Numéro de Téléphone</label>
                <input type="text" class="form-control" id="phonenumber" name="phonenumber" required>
            </div>
            <button type="button" id="nextButton" class="btn btn-primary">Suivant</button>
        </div>
        
        <div id="taxi-section" style="display: none;">
            <h3>Ajouter Taxi</h3>
            <div class="form-group">
                <label for="marque">Marque</label>
                <input type="text" class="form-control" id="marque" name="marque">
            </div>
            <div class="form-group">
                <label for="model_year">Model Year</label>
                <input type="number" class="form-control" id="model_year" name="model_year">
            </div>
            <div class="form-group">
                <label for="plate">Plate</label>
                <input type="text" class="form-control" id="plate" name="plate">
            </div>
            <div class="form-group">
                <label for="color">Color</label>
                <input type="text" class="form-control" id="color" name="color">
            </div>
            <button type="submit" class="btn btn-success">Ajouter</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('nextButton').addEventListener('click', function () {
        const chauffeurSection = document.getElementById('chauffeur-section');
        const taxiSection = document.getElementById('taxi-section');
        
        // Validate chauffeur form
        let valid = true;
        const inputs = chauffeurSection.querySelectorAll('input');
        inputs.forEach(input => {
            if (!input.checkValidity()) {
                valid = false;
                input.reportValidity();
            }
        });
        
        // If valid, show taxi section
        if (valid) {
            chauffeurSection.style.display = 'none';
            taxiSection.style.display = 'block';
        }
    });
</script>
@endsection
