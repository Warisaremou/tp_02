<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLivresRequest;
use App\Models\Livres;
use Illuminate\Contracts\View\View;

class LivresConrtolleur extends Controller
{
    public function index(): View
    {
        return view('livre.index', [
            'livres' => Livres::paginate(4),
        ]);
    }

    public function create(): View
    {
        return view('livre.create');
    }

    public function store(CreateLivresRequest $request)
    {
        // dd($request->validated());
        $livre = new Livres;

        $livre->titre = $request->titre;
        $livre->auteur = $request->auteur;
        $livre->resume = $request->resume;
        $livre->disponibilite = $request->disponibilite;
        $livre->localisation = $request->localisation;

        $livre->save();
        return redirect()->route('livre.create')->with('success', "Le livre a été ajouté avec succès");
    }

    public function delete(int $livreID)
    {
        Livres::where("id_livre", $livreID)->delete();
        // dd($livre);
        return redirect()->route("livre.index")->with('delete', "Le livre à été supprimé avec succès");
    }

    public function edit(int $livreID): View
    {
        return view("livre.edit", [
            "livre" => Livres::where('id_livre', $livreID)->get(),
        ]);
    }

    public function update(int $livreID, CreateLivresRequest $request)
    {
        // dd($request->validated());
        $livre = Livres::where("id_livre", $livreID)->update([
            'titre' => $request->input('titre'),
            'auteur' => $request->input('auteur'),
            'resume' => $request->input('resume'),
            'disponibilite' => $request->input('disponibilite'),
            'localisation' => $request->input('localisation'),
        ]);
        return redirect()->route('livre.index')->with('success', 'Le livre à été modifié avec succès');
    }
}
