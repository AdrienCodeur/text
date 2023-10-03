<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    

    public function index(){

        $departements = Departement::latest()->paginate(10) ;

        return view('departement.index',compact('departements')) ;
    }

    public function create()

    {
        $departement= new  Departement() ;
       

        return view('departement.form',compact('departement'));


    }
    public function edit(Departement $departement){

        return view('departement.form',compact('departement'));
        

        
    }


    public function store(Request $request){
        $request->validate([
            'departement'=>'required|string|min:4|unique:departements,nom',
        ]);

        $departement = new Departement() ;
        $departement->nom = $request->input('departement') ;
        $departement->save() ;
        return redirect()->route('departement.index')->with('success' ,   "departement  .$request->name. créer  avec success") ;

    }

    public function updated(Request $request ,Departement $departement)
    {

        // dd($departement) ;
        // dd($request->all()) ;
        $departement->nom = $request->departement ;
        $departement->save() ;

        return redirect()->route('departement.index')->with('success' ,'departement mis à jour avec success') ;
        
    }

}
