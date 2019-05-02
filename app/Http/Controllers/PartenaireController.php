<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartenaireRequest;
use App\Http\Resources\Partenaire as PartenaireResource;
use App\Partenaire;

class PartenaireController extends Controller
{


    public function index()
    {
        $partenaire = Partenaire::paginate(15);
        return PartenaireResource::collection($partenaire);
    }

    public function show($id)
    {
        $partenaire = Partenaire::findOrfail($id);
        return new PartenaireResource($partenaire);
    }

    public function destroy($id)
    {
        $partenaire = Partenaire::findOrfail($id);

        if ($partenaire->delete()) {
            return new PartenaireResource($partenaire);
        }

    }

    public function store(StorePartenaireRequest $request)
    {
        $partenaire = $request->isMethod('put') ? Partenaire::findOrFail($request->id) : new Partenaire;

        $partenaire->nom = $request->get('nom');
        $partenaire->prenom = $request->get('prenom');
        $partenaire->sexe = $request->get('sexe');
        $partenaire->structure()->associate($request->get('logement'));
        $partenaire->type()->associate($request->get('csp'));

        if ($partenaire->save()) {
            return new PartenaireResource($partenaire);
        }
    }
}
