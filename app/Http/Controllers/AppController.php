<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Departement;
use App\Models\Employer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public $notificationMessage =null; 
    public $defaultPaymentDate =null;
    
    public function index()
    {
        $currentDate = Carbon::now()->day;
        $paymentDate = Configuration::where('type','PAYMEND_DATE')->first() ;
        
        // dd($currentDate);

if($paymentDate){

    $this->defaultPaymentDate=intval($paymentDate->value); 

}        // dd($paymmentDate);
        
       if($this->defaultPaymentDate){

            // dd($this->defaultPaymentDate) ; 
                  if( $currentDate <  $this->defaultPaymentDate ){
            $notificationMessage =" le  Payement est prevue pour le $paymentDate->value de ce mois   " ;
        }else{
            $nextMonth = Carbon::now()->addMonth() ;
// dd($nextMonth) ;
$nextMonthName = $nextMonth->format('F') ;
            $notificationMessage =" le    Payement est prevue pour le $paymentDate->value  du  mois  de $nextMonthName   " ;

        }
       }
       $notificationMessage='il ya un probleme avec les payments plus tard' ;
        $employers = Employer::all()->count() ;
        $administrateurs = User::all()->count() ;
        $departements = Departement::all()->count() ;
        return view('index' ,compact('departements','employers','administrateurs','notificationMessage')) ;
    }
}
