@extends('layout')

@section('title', '- Livre')

@section('content')
    <div>
        {{-- @dump($logements) --}}
        <div class="d-flex align-items-center justify-content-between">
            <h4 class="fw-semibold fs-3">Liste des livres</h4>
            <a href="{{ route('livre.create') }}" class="btn btn-outline-primary">Ajouter un livre</a>
        </div>

        <div class="mt-5 d-flex colum-gap-4 gap-4 mb-4">
            @forelse ($livres as $livre)
                <div class="card position-relative" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Titre: {{ $livre->titre }} </h5>
                        <div class="card-text">
                            <h4 class="">Auteur: {{ $livre->auteur }}</h4>
                            <p>Resume: {{ $livre->resume }}</p>
                            <p>Localisation: {{ $livre->localisation }}</p>
                        </div>
                        <span
                            class="badge @if ($livre->disponibilite == 'disponible') text-bg-primary @else text-bg-warning text-white @endif"
                            style="position: absolute; top: 10px; right: 10px;">{{ $livre->disponibilite }}</span>
                        <div class="d-flex justify-content-center gap-4">
                            {{-- @dump($livre->id_livre) --}}
                            <a href="{{ route('livre.edit', $livre->id_livre) }}" class="btn btn-primary">Modifier</a>
                            <form method="POST" action="{{ route('livre.delete', $livre->id_livre) }}">
                                {{ method_field('delete') }}
                                @csrf
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>

            @empty
                <h5 class="col-5 mx-auto text-danger">Aucun livre disponible !</h5>
            @endforelse
        </div>

        @if (session('delete'))
            <div class="alert alert-danger col-md-5 mx-auto fw-light mb-5" role="alert">
                {{ session('delete') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success col-md-5 mx-auto fw-light mb-5" role="alert">
                {{ session('success') }}
            </div>
        @endif

        {{ $livres->links() }}

    </div>
@endsection
