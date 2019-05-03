<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProblemeRequest;
use App\Http\Resources\Probleme as ProblemeResource;
use App\Probleme;

class ProblemeController extends Controller
{
    public function index()
    {
        $probleme = Probleme::paginate(15);
        return ProblemeResource::collection($probleme);
    }

    public function show($id)
    {
        $probleme = Probleme::findOrfail($id);
        return new ProblemeResource($probleme);
    }

    public function destroy($id)
    {
        $probleme = Probleme::findOrfail($id);

        if ($probleme->delete()) {
            return new ProblemeResource($probleme);
        }

    }

    public function store(StoreProblemeRequest $request)
    {
        $probleme = $request->isMethod('put') ? Probleme::findOrFail($request->id) : new Probleme;

        $probleme->personne()->associate($request->get('personne'));
        $probleme->categorie()->associate($request->get('categorie'));
        $probleme->type()->associate($request->get('type'));
        $probleme->accompagnement()->associate($request->get('accompagnement'));

        if ($probleme->save()) {
            return new ProblemeResource($probleme);
        }
    }
}
