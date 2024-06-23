@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Chauffeur</h1>
    <form id="editChauffeurForm" method="POST" action="{{ route('admin.chauffeurs.update', $chauffeur->id) }}">
        @csrf
        @method('PUT')
        <div id="chauffeur-section">
            <div class="form-group">
                <label for="CNI">CNI</label>
                <input type="text" class="form-control" id="CNI" name="CNI" value="{{ $chauffeur->CNI }}" required>
            </div>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ $chauffeur->nom }}" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $chauffeur->prenom }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $chauffeur->email }}" required>
            </div>
            <div class="form-group">
                <label for="datenaissance">Date de Naissance</label>
                <input type="date" class="form-control" id="datenaissance" name="datenaissance" value="{{ $chauffeur->datenaissance }}" required>
            </div>
            <div class="form-group">
                <label for="lieu">Lieu</label>
                <input type="text" class="form-control" id="lieu" name="lieu" value="{{ $chauffeur->lieu }}" required>
            </div>
            <div class="form-group">
                <label for="phonenumber">Numéro de Téléphone</label>
                <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="{{ $chauffeur->phonenumber }}" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
</div>
@endsection
