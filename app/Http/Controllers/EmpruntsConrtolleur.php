<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmpruntsRequest;
use App\Http\Requests\SearchEmpruntRequest;
use App\Models\Emprunts;
use App\Models\Etudiants;
use App\Models\Livres;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EmpruntsConrtolleur extends Controller
{
    public function index(): View
    {
        return view('emprunt.index', [
            'emprunts' => Emprunts::paginate(6),
            'livres' => Livres::all(),
            'etudiants' => Etudiants::all(),
        ]);
    }

    public function create(): View
    {
        return view('emprunt.create', [
            'livres' => Livres::all(),
            'etudiants' => Etudiants::all(),
        ]);
    }

    public function show(int $empruntID): View
    {
        // Sejour::where("id_sejour", $sejourID)->get();

        return view("emprunt.show", [
            "sejour" => Emprunts::where('id_emprunt', $empruntID)->get(),
            'livres' => Livres::all(),
            'etudiants' => Etudiants::all(),
        ]);
    }

    public function store(CreateEmpruntsRequest $request)
    {
        // dd($request->validated());
        $livre = new Emprunts;

        $livre->id_livre = $request->id_livre;
        $livre->id_etudiant = $request->id_etudiant;
        $livre->date_emprunt = $request->date_emprunt;
        $livre->date_retour_prevue = $request->date_retour_prevue;
        $livre->date_retour_effective = $request->date_retour_effective;

        $livre->save();
        return redirect()->route('emprunt.create')->with('success', "L'emprunt a été ajouté avec succès");
    }

    public function delete(int $empruntID)
    {
        Emprunts::where("id_emprunt", $empruntID)->delete();
        // dd($livre);
        return redirect()->route("emprunt.index")->with('delete', "L'emprunt à été supprimé avec succès");
    }

    public function edit(int $empruntID): View
    {
        return view("emprunt.edit", [
            "emprunt" => Emprunts::where('id_emprunt', $empruntID)->get(),
            'livres' => Livres::all(),
            'etudiants' => Etudiants::all(),
        ]);
    }

    public function update(int $empruntID, CreateEmpruntsRequest $request)
    {
        // dd($request->validated());
        $emprunt = Emprunts::where("id_emprunt", $empruntID)->update([
            'id_livre' => $request->input('id_livre'),
            'id_etudiant' => $request->input('id_etudiant'),
            'date_emprunt' => $request->input('date_emprunt'),
            'date_retour_prevue' => $request->input('date_retour_prevue'),
            'date_retour_effective' => $request->input('date_retour_effective'),
        ]);
        return redirect()->route('emprunt.index')->with('success', "L'emprunt à été modifié avec succès");
    }

    public function searchByDate(): View
    {
        return view("emprunt.search");
    }

    public function search(SearchEmpruntRequest $request): View
    {
        // dd($request->validated());
        $empruntList = Emprunts::where('date_emprunt', $request->date_emprunt)->get();
        // $empruntList = Emprunts::query()->where('date_emprunt', 'LIKE', '%' . $request->input('date_emprunt') . '%');
        // dd($empruntList);
        return view('emprunt.search', [
            'empruntsList' => $empruntList,
            'livres' => Livres::all(),
            'etudiants' => Etudiants::all(),
            'input' => $request->validated(),
        ]);
    }
}
