<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployerController extends Controller
{
    private function AdminImage( $employer,  $request):void
    {
    
        $image = $request->image;
        if($request->hasFile('photos')->isValid()) {
            if($employer->photos){
                Storage::disk('public')->delete($employer->photos) ;
            }
            $imagePath = $image->store('bloc', 'public');
            $employer->photos = $imagePath;
            
        }
    }

    public function index(Request $request)
    {
        $this->authorize('ListEmployer');
        if ($request->search) {
            $employers = Employer::where('nom', 'like', '%' . $request->search . '%')
                ->orWhere('salaire', "like", "%".$request->search."%")
                ->orWhere('email', "like", "%".$request->search."%")
                ->paginate(3);
            // dd('%'.$request->search.'%') ;
        } else {
            $employers = Employer::latest()
                ->with('departement')
                ->paginate(3);
        }
        $InputSearch = $request->all();
        // dd($InputSearch) ;
        return view('employer.index', compact('employers', 'InputSearch'));
    }
    public function store(Request $request)
    { $request->validate([
        'nom' => 'required|string|min:4',
        'email' => 'required|string ',
        'salaire' => 'integer|',
        'image' => 'image|max:20000',
        'departement_id' => 'integer|',
    ]);
        // dd($request->all()) ;
        $employer = new Employer() ;
        $image = $request->image;

    if($request->File('image')->isValid()) {
        if($employer->photos){
            Storage::disk('public')->delete($employer->photos) ;
        }
        $imagePath = $image->store('bloc', 'public');
        $employer->photos = $imagePath;
        

}
        Employer::create($request->all());
        return redirect()
            ->route('employer.index')
            ->with('success', 'employer créer avec success avec success');
    }

    public function edit(Employer $employer)
    {
        // dd($employer->photos) ;
        $departements = Departement::latest()->get();
        return view('employer.form', compact('employer', 'departements'));
    }

    public function create()
    {
        $departements = Departement::latest()->get();
        $employer = new Employer();
        return view('employer.form', compact('employer', 'departements'));
    }

    public function updated(Request $request, Employer $employer)

    {
        $this->authorize('update',$employer) ;
        $request->validate([
            'nom' => 'required|string|min:4',
            'email' => 'required|string ',
            'salaire' => 'integer|',
            'image' => 'image|max:20000',
            'departement_id' => 'integer|',
        ]);
        /**  @var UploadedFile|null $photos*/
        // dd($request->photos) ;
        // dd($employer->) ;
       $this->AdminImage($employer ,$request) ;
        $employer->nom = $request->input('nom');
        $employer->email = $request->input('email');
        $employer->salaire = $request->salaire;
        $employer->sexe = $request->sexe;
        $employer->departement_id = $request->departement_id;
        $employer->update();

        return redirect()
            ->route('employer.index')
            ->with('success', 'Employer   ' . $request->nom . '     mis à jour avec success');
    }
}
