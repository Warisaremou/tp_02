@extends('layout')

@section('title', '- Emprunt')

@section('content')
    {{-- @dump(date('Y-m-d')) --}}
    @php
        $currentDate = date('Y-m-d');
    @endphp

    <div>
        <div class="d-flex align-items-center justify-content-between">
            <h4 class="fw-semibold fs-3">Liste des emprunts</h4>
            <a href="{{ route('emprunt.create') }}" class="btn btn-outline-primary">Ajouter un emprunt</a>
        </div>

        <table class="table table-hover table-bordered mt-3 mb-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom livre</th>
                    <th scope="col">Nom et prénom étudiant</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emprunts as $emprunt)
                    <?php
                    $emprunt_livre_id = $emprunt->id_livre;
                    $emprunt_etudiant_id = $emprunt->id_etudiant;
                    ?>
                    <tr>
                        <td> {{ $emprunt->id_emprunt }} </td>
                        <td class="d-flex align-items-center gap-2">
                            @foreach ($livres as $livre)
                                @if ($emprunt_livre_id == $livre->id_livre)
                                    {{ $livre->titre }}
                                    @if ($emprunt->date_retour_prevue == $currentDate)
                                        <span class="badge text-bg-warning text-white">A retourner aujourd'hui</span>
                                    @endif
                                    {{-- <a href="{{ route('emprunt.show', $livre->id_livre) }}">
                                        {{ $livre->titre }}
                                    </a> --}}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($etudiants as $etudiant)
                                @if ($emprunt_etudiant_id == $etudiant->id_etudiant)
                                    {{ $etudiant->nom }} {{ $etudiant->prenom }}
                                @endif
                            @endforeach
                        </td>
                        <td class="dropdown">
                            <button class="btn border-secondary border-1 dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            </button>
                            {{-- @dump($sejour) --}}
                            <ul class="dropdown-menu">
                                <button class="dropdown-item text-primary">
                                    <a class="nav-link"
                                        href="{{ route('emprunt.edit', $emprunt->id_emprunt) }}">Modifier</a>
                                </button>
                                <form method="POST" action="{{ route('emprunt.delete', $emprunt->id_emprunt) }}">
                                    {{ method_field('delete') }}
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Supprimer</button>
                                </form>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if (session('delete'))
            <div class="alert alert-danger col-md-5 mx-auto fw-light" role="alert">
                {{ session('delete') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success col-md-5 mx-auto fw-light" role="alert">
                {{ session('success') }}
            </div>
        @endif

        {{ $emprunts->links() }}
    </div>
@endsection
