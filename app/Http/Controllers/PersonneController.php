<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonneRequest;
use App\Personne;
use Illuminate\Http\Request;
use App\Http\Resources\Personne as PersonneResource;

class PersonneController extends Controller
{
    public function index()
    {
        $personnes = Personne::paginate(15);
        return PersonneResource::collection($personnes);
    }

    public function show($id)
    {
        $personne = Personne::findOrfail($id);
        return new PersonneResource($personne);
    }

    public function destroy($id)
    {
        $personne = Personne::findOrfail($id);

        if ($personne->delete()) {
            return new PersonneResource($personne);
        }

    }

    public function store(StorePersonneRequest $request)
    {
        $personne = $request->isMethod('put') ? Personne::findOrFail($request->id) : new Personne;

        $personne->nom = $request->get('nom');
        $personne->prenom = $request->get('prenom');
        $personne->date_naissance = $request->get('date_naissance');
        $personne->sexe = $request->get('sexe');
        $personne->enfant = $request->get('enfant');
        $personne->nationalite = $request->get('nationalite');
        $personne->telephone = $request->get('telephone');
        $personne->email = $request->get('email');
        $personne->adresse = $request->get('adresse');
        $personne->code_postale = $request->get('code_postale');
        $personne->ville = $request->get('ville');
        $personne->prioritaire = $request->get('prioritaire');
        $personne->matricule_caf = $request->get('matricule_caf');
        $personne->logement()->associate($request->get('logement'));
        $personne->csp()->associate($request->get('csp'));
        $personne->categorie()->associate($request->get('categorie'));

        if ($personne->save()) {
            return new PersonneResource($personne);
        }
    }
}
