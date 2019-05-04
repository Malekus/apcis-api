<?php

namespace App\Http\Controllers;

use App\Action;
use App\Http\Requests\StoreActionRequest;
use App\Http\Resources\Action as ActionResource;

class ActionController extends Controller
{
    public function index()
    {
        $actions = Action::paginate(15);
        return ActionResource::collection($actions);
    }

    public function show($id)
    {
        $action = Action::findOrfail($id);
        return new ActionResource($action);
    }

    public function destroy($id)
    {
        $action = Action::findOrfail($id);

        if ($action->delete()) {
            return new ActionResource($action);
        }

    }

    public function store(StoreActionRequest $request)
    {
        $action = $request->isMethod('put') ? Action::findOrFail($request->id) : new Action;

        $action->deplacement = $request->get('deplacement') ?? 0;
        $action->duree = $request->get('duree') ?? 0;
        $action->dateAction = $request->get('dateAction') ?? \Carbon\Carbon::now();
        $action->information = $request->get('information') ?? false;
        $action->droitOuvert = $request->get('droitOuvert') ?? false;
        $action->maintienDroit = $request->get('maintienDroit') ?? false;
        $action->conflit = $request->get('conflit') ?? false;
        $action->perduDeVue = $request->get('perduDeVue') ?? false;
        $action->judiciarisation = $request->get('judiciarisation') ?? false;
        $action->avancement = $request->get('avancement') ?? "en cours";

        $action->probleme()->associate($request->get('probleme'));
        $action->action()->associate($request->get('action'));
        $request->get('complement') ? $action->complement()->associate($request->get('complement')) : $action->complement()->associate(null);

        if ($action->save()) {
            return new ActionResource($action);
        }
    }
}
