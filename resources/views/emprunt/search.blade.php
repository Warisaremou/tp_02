@extends('layout')

@section('title', '- Rechercher Emprunt')

@section('content')
    @php
        $currentDate = date('Y-m-d');
    @endphp
    <div>
        <form method="GET" action="{{ route('emprunt.search') }}" class="d-flex justify-content-end gap-5 mb-5">
            <div class="d-flex gap-52">
                <div class="col-12">
                    <input id="date_emprunt" type="date" class="form-control @error('date_emprunt') is-invalid @enderror"
                        name="date_emprunt" autofocus value="{{ $input['date_emprunt'] ?? '' }}">
                    @error('date_emprunt')
                        <span class="invalid-feedback text-start" role="alert">
                            <p>{{ $message }}</p>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="">
                <button type="submit" class="btn btn-primary">
                    Rechercher
                </button>
            </div>
        </form>

        @if (isset($empruntsList))
            <h3 class="fw-medium text-decoration-underline">Liste des emprunts</h3>
            @forelse ($empruntsList as $emprunt)
                {{-- @dump($sejourInfo) --}}
                <div class="mt-3 p-4 rounded-3" style="background-color: #e2e8f0">
                    <div class="d-flex gap-2 align-items-center">
                        <h5> Emprunt n°: {{ $emprunt->id_emprunt }} </h5>
                        @if ($emprunt->date_retour_prevue == $currentDate)
                            <h5 class="badge text-bg-warning text-white">A retourner aujourd'hui</h5>
                        @endif
                    </div>
                    <div>
                        @foreach ($livres as $livre)
                            @if ($emprunt->id_livre == $livre->id_livre)
                                <h5>Titre du livre: {{ $livre->titre }} </h5>
                                <h5>Auteur du livre: {{ $livre->auteur }} </h5>
                            @endif
                        @endforeach
                    </div>
                    <div>
                        @foreach ($etudiants as $etudiant)
                            @if ($emprunt->id_etudiant == $etudiant->id_etudiant)
                                <h5>Nom et prénom de l'étudiant: {{ $etudiant->nom }} {{ $etudiant->prenom }} </h5>
                            @endif
                        @endforeach
                    </div>
                    <div>
                        <h5>Date de l'emprunt {{ $emprunt->date_emprunt }}</h5>
                        <h5>Date de retour prévue {{ $emprunt->date_retour_prevue }}</h5>
                        @if ($emprunt->date_retour_effective)
                            <h6 class="badge text-bg-primary p-1 text-white rounded">Retourné le:
                                {{ $emprunt->date_retour_effective }}</h6>
                        @else
                            <h6 class="badge p-1 text-bg-danger text-white rounded">Pas encore retourné</h6>
                        @endif
                    </div>
                </div>
            @empty
                <h5 class="text-danger mt-3 text-center">Aucun emprunt n'est enregistré à cette date!</h5>
            @endforelse
        @endif
    </div>
@endsection
