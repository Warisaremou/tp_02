@extends('layout')

@section('title', '- Ajouter Emprunt')

@section('content')
    <div class="container" style="max-width: 50rem;">
        @include('emprunt.breadcrumb')

        <div class="card">
            <div class="card-body">
                <h3 class="card-title fw-medium mb-5 text-center">Ajouter un emprunt</h3>

                <form method="POST" action="{{ route('emprunt.store') }}" class="card-text">
                    @csrf
                    <div class="row my-3">
                        <label for="id_livre" class="col-md-4 col-form-label">Livre:</label>
                        <div class="col-md-6">
                            <select name="id_livre"
                                class="form-select ms-2 form-control @error('id_livre') is-invalid @enderror"
                                aria-label="Select option">
                                <option>Sélectionner le livre</option>
                                @foreach ($livres as $livre)
                                    <option name="{{ $livre->titre }}" value="{{ $livre->id_livre }}">
                                        {{ $livre->titre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_livre')
                                <span class="invalid-feedback text-start" role="alert">
                                    <p>Veuillez sélectionner le livre</p>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row my-3">
                        <label for="id_etudiant" class="col-md-4 col-form-label">Etudiant:</label>
                        <div class="col-md-6">
                            <select name="id_etudiant"
                                class="form-select ms-2 form-control @error('id_etudiant') is-invalid @enderror"
                                aria-label="Select option">
                                <option>Sélectionner le l'étudiant</option>
                                @foreach ($etudiants as $etudiant)
                                    <option name="{{ $etudiant->nom }} {{ $etudiant->prenom }}"
                                        value="{{ $etudiant->id_etudiant }}">
                                        {{ $etudiant->nom }} {{ $etudiant->prenom }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_etudiant')
                                <span class="invalid-feedback text-start" role="alert">
                                    <p>Veuillez sélectionner l'étudiant</p>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="date_emprunt" class="col-md-4 col-form-label">Date d'emprunt:</label>
                        <div class="col-md-6">
                            <input id="date_emprunt" type="date"
                                class="form-control @error('date_emprunt') is-invalid @enderror" name="date_emprunt"
                                autofocus>
                            @error('date_emprunt')
                                <span class="invalid-feedback text-start" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="date_retour_prevue" class="col-md-4 col-form-label">Date de retour prevue:</label>
                        <div class="col-md-6">
                            <input id="date_retour_prevue" type="date"
                                class="form-control @error('date_retour_prevue') is-invalid @enderror"
                                name="date_retour_prevue" autofocus>
                            @error('date_retour_prevue')
                                <span class="invalid-feedback text-start" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="date_retour_effective" class="col-md-4 col-form-label">Date de retour effective:</label>
                        <div class="col-md-6">
                            <input id="date_retour_effective" type="date"
                                class="form-control @error('date_retour_effective') is-invalid @enderror"
                                name="date_retour_effective" autofocus>
                            @error('date_retour_effective')
                                <span class="invalid-feedback text-start" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="col-4 btn btn-primary">
                            Ajouter
                        </button>
                    </div>

                </form>
            </div>

            @if (session('success'))
                <div class="alert alert-success col-md-5 mx-auto" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
@endsection
