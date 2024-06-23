<!-- resources/views/passager/reservations.blade.php -->

@extends('layouts.app') <!-- Adjust based on your layout structure -->

@section('content')
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
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->lieu_depart }}</td>
                            <td>{{ $reservation->lieu_arrivee }}</td>
                            <td>{{ $reservation->heure_depart->format('d/m/Y H:i') }}</td>
                            <td>{{ $reservation->statut }}</td>
                            <td>{{ $reservation->tarif ?? 'N/A' }}</td>
                            <td>
                                @if ($reservation->statut === 'en_attente')
                                    <form action="{{ route('passager.cancelReservation', $reservation->reservation_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Annuler</button>
                                    </form>
                                @else
                                    <span class="text-muted">Non annulable</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
