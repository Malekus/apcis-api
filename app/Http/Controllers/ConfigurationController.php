<?php

namespace App\Http\Controllers;


use App\Configuration;
use App\Http\Requests\StoreConfigurationRequest;
use App\Http\Resources\Configuration as ConfigurationResource;

class ConfigurationController extends Controller
{
    public function index()
    {
        $configurations = Configuration::paginate(15);
        //return response()->json(['success' => ConfigurationResource::collection($configurations)]);
        return ConfigurationResource::collection($configurations);
    }

    public function show($id)
    {
        $configuration = Configuration::findOrfail($id);
        return new ConfigurationResource($configuration);
    }

    public function destroy($id)
    {
        $configuration = Configuration::findOrfail($id);

        if ($configuration->delete()) {
            return new ConfigurationResource($configuration);
        }

    }

    public function store(StoreConfigurationRequest $request)
    {
        $configuration = $request->isMethod('put') ? Configuration::findOrFail($request->id) : new Configuration;
        $model = Configuration::where(['categorie'=> $request->input('categorie'), 'champ'=>$request->input('champ'), 'libelle'=>$request->input('libelle')])->get();
        if(!$model->isEmpty())
            return response()->json(['error' => "Cette configuration existe déjà"]);
        $configuration->categorie = $request->input('categorie');
        $configuration->champ = $request->input('champ');
        $configuration->libelle = $request->input('libelle');

        if ($configuration->save()) {
            return new ConfigurationResource($configuration) ; //response()->json(['success'=> new ConfigurationResource($configuration)]);
        }
    }
}
