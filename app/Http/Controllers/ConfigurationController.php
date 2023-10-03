<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{


    public function index()

    {
        $configurations = Configuration::latest()->paginate() ;
return view('config/index',compact('configurations')) ;
    }
    public function create()
    {
        $configuration = new configuration();
return view('config/form' ,compact('configuration')) ;
    }
    public function edit(Configuration $configuration)
    {
        
            return view('config/form',compact('configuration')) ;
    }

    public function updated(Request $request ,Configuration $configuration)
    {
        // dd($request->all());

        $request->validate([

            'values' =>'required|string',
            'type' =>'required',

        ]) ;
        // $configuration->update($request->all()) ;
        $configuration->type = $request->type ;
        $configuration->value = $request->values ;
        $configuration->save() ;
        return redirect()->route('config.index')->with('success' ,'configuration mis à jour  avec success') ;


    }

    public function store( Request $request )
    {
        dd($request->all()) ; 
        $request->validate([
            'value' =>'required|string',
            "type" =>'required|unique:configurations,type',
        ]) ;
        $config = new Configuration() ;
        $config->type = $request->input('type') ;
        $config->value = $request->input('value') ;
        $config->save() ;
        return redirect()->route('config.index')->with('success' ,'configuration ajouter avec success') ;



    }
}
