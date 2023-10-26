@extends('layout')

@section('title', '- Ajouter livre')

@section('content')
    <div class="container" style="max-width: 50rem;">
        @include('livre.breadcrumb')

        <div class="card">
            <div class="card-body">
                <h3 class="card-title fw-medium mb-5 text-center">Ajouter un livre</h3>

                <form method="POST" action="{{ route('livre.store') }}" class="card-text">
                    @csrf
                    <div class="row mb-3">
                        <label for="titre" class="col-md-4 col-form-label text-start">Titre:</label>

                        <div class="col-md-6">
                            <input id="titre" type="text" class="form-control @error('titre') is-invalid @enderror"
                                name="titre" autofocus>
                            @error('titre')
                                <span class="invalid-feedback text-start" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="auteur" class="col-md-4 col-form-label text-start">Auteur:</label>

                        <div class="col-md-6">
                            <input id="auteur" type="text" class="form-control @error('auteur') is-invalid @enderror"
                                name="auteur" autofocus>
                            @error('auteur')
                                <span class="invalid-feedback text-start" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="resume" class="col-md-4 col-form-label text-start">Resume:</label>
                        <div class="col-md-6">
                            <input id="resume" type="texte" class="form-control @error('resume') is-invalid @enderror"
                                name="resume" autofocus>
                            @error('resume')
                                <span class="invalid-feedback text-start" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="localisation" class="col-md-4 col-form-label text-start">Localisation:</label>
                        <div class="col-md-6">
                            <input id="localisation" type="text"
                                class="form-control @error('localisation') is-invalid @enderror" name="localisation"
                                autofocus>
                            @error('localisation')
                                <span class="invalid-feedback text-start" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div class="form-check form-switch col-5 mx-auto">
                            <input type="hidden" value="disponible" name="disponibilite">
                            <input @checked($value ?? false)
                                class="form-check-input @error('disponibilite') is-invalid @enderror" type="checkbox"
                                role="switch" id="disponibilite" value="emprunte" name="disponibilite">
                            <label class="form-check-label" for="disponibilite">
                                Disponible ou Emprunté
                            </label>
                        </div>
                        @error('disponibilite')
                            <span class="invalid-feedback text-start" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
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
