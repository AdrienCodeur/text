@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1> @if($configuration->exists)
            Editer une Configuration
            @else
            Créer une Nouvelle Configuration
        @endif</h1>
   </div>
    <div class="col-md-6 mt-5">
        <form action="{{route($configuration->exists ? 'config.update' : 'config.store' ,$configuration->id)}}" method="POST"  class='mt-5'>
            @csrf 
            @if ($configuration->exists)
                @method('put')
                @else
                @method('post')
            @endif
            <label for="">Choix du Type</label>
            <select name="type" id="" class='form-control mb-1 @error('type') is-invalid @enderror' >
<option value=""></option>
                <option value="PAYMEND_DATE" @if($configuration->type === 'PAYMEND_DATE') selected @endif >Date de Payment</option>
                <option value="DEVELOPPEUR_NAME"@if($configuration->type === 'DEVELOPPEUR_NAME') selected @endif >Nom de la communauter de Dev</option>
                <option value="APP_NAME" @if($configuration->type === 'APP_NAME') selected @endif >Nom de l'application</option>
            </select>
        @error("type")
        <p class="text-danger">{{$message}}</p>@enderror
        <label for="">valeur</label>
        <input type="text" name="values" id="" class='form-control 
        @error('values') is-invalid @enderror' value="{{$configuration->exists ? $configuration->value : old('value')}}">
        @error('values')
        <p class="invalid-feedback">{{$message}}</p>@enderror
        <button type='submit' class='btn btn-primary mt-2'>@if ($configuration->exists)
            Modifier
            @else
            Créer 
        @endif</button>
    </div>
</form>
</div>
    

@endsection