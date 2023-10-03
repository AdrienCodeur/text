@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1> @if($departement->exists)
            @section('title' ,'Editer un departement')
            Editer un Département
            @else
            @section('title' ,'Créer un departement')

            Créer un Département
                
            
        @endif</h1>
   </div>
    <div class="col-md-6 mt-5">
        <form action="{{route($departement->exists ? 'departement.update' : 'departement.create' ,$departement->id)}}" method="POST"  class='mt-5'>
            @csrf 
            @if ($departement->exists)
                @method('put')
                @else
                @method('post')
            @endif
        <label for="">nom </label>
        <input type="text" name="departement" id="" class='form-control 
        @error('departement') is-invalid @enderror' value="{{$departement->exists ? $departement->nom : old('departement')}}">
        @error('departement')
        <p class="invalid-feedback">{{$message}}</p>@enderror
        <button type='submit' class='btn btn-primary mt-2'>@if ($departement->exists)
            Modifier
            
                
            @else
            Créer 
                
            
        @endif</button>
    </div>
</form>
</div>
    

@endsection