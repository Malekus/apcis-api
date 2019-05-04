<?php

namespace App\Http\Controllers;

use App\Caf;
use App\Http\Requests\StoreCafRequest;
use App\Http\Resources\Caf as CafResource;

class CafController extends Controller
{
    public function index()
    {
        $cafs = Caf::paginate(15);
        return CafResource::collection($cafs);
    }

    public function show($id)
    {
        $caf = Caf::findOrfail($id);
        return new CafResource($caf);
    }

    public function destroy($id)
    {
        $caf = Caf::findOrfail($id);

        if ($caf->delete()) {
            return new CafResource($caf);
        }

    }

    public function store(StoreCafRequest $request)
    {
        $caf = $request->isMethod('put') ? Caf::findOrFail($request->id) : new Caf;

        $caf->dateCaf = $request->get('dateCaf');

        $caf->personne()->associate($request->get('personne'));
        $caf->motif()->associate($request->get('motif') ?? null);

        if ($caf->save()) {
            return new CafResource($caf);
        }
    }
}
