<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonneRequest;
use App\Http\Resources\Personne as PersonneResource;
use App\Personne;

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

        $personne->nom = $request->get('nom') ?? null;
        $personne->prenom = $request->get('prenom') ?? null;
        $personne->date_naissance = $request->get('date_naissance') ?? null;
        $personne->sexe = $request->get('sexe') ?? null;
        $personne->enfant = $request->get('enfant') ?? 0;
        $personne->nationalite = $request->get('nationalite') ?? null;
        $personne->telephone = $request->get('telephone') ?? null;
        $personne->email = $request->get('email') ?? null;
        $personne->adresse = $request->get('adresse') ?? null;
        $personne->code_postale = $request->get('code_postale') ?? null;
        $personne->ville = $request->get('ville') ?? null;
        $personne->prioritaire = $request->get('prioritaire') ?? null;
        $personne->matricule_caf = $request->get('matricule_caf') ?? null;

        $personne->logement()->associate($request->get('logement') ?? null);
        $personne->csp()->associate($request->get('csp') ?? null);
        $personne->categorie()->associate($request->get('categorie') ?? null);

        if ($personne->save()) {
            return new PersonneResource($personne);
        }
    }
}
