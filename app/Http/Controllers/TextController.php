<?php

namespace App\Http\Controllers;

use App\Models\Text;
use Illuminate\Http\Request;

class TextController extends Controller
{
    //


    public function text(){
        
            return view('text') ;

            
    }

    public function store(Request $request)
    {

        // dd($request->nom) ;
        $request->validate([
            'nom'=>['required','string'] ,
            'email'=>['string','required']
        ]);
        $text = new Text() ;

        // foreach($request->nom as $requestt)
        // {
        //     $text->nom=$requestt->nom;
        // }
        // foreach($request->email as $requestt)
        // {
        //     $text->email=$requestt->email ;
        // }

        // Text::create($request->all()) ;

        $text->nom =$request->input('nom') ;
        $text->email =$request->input('email') ;
        $text->save() ;

        dd($text) ;
        return to_route('employer.index');
    }
}
