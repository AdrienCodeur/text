<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('Auth/login');
    }


    public function tologin(UserRequest $request)
    {
        $credentials = $request->validated();
        if(Auth::attempt($credentials)){

            $request->session()->regenerate() ;

            return redirect()->intended(route('employer.index'));
        }else{

            return redirect()->back()->with('error' ,'parametre de connexion inconnu') ;
        }
        
    }

    public function logout(){
        Auth::logout() ;
        return to_route('login')->with('success' ,'vous etes maintenant deconnecter') ;
            
    }

   public function authenticate(Request $request){

        $user =User::where('email',$request->email) ;

        if(Hash::check($request->passord , $user->password)) {

            return response()->json([
                'token'=>$user->createToken(time())->plainTextToken ,
            ]);
        }else{
            return response()->json([
                'status_error'=>422,
                'status_message'=>'verifier vos entetes et réessayer'
            ]);
        }

   }
}
