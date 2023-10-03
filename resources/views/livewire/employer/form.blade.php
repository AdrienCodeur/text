@php
    $selected = 'selected';
@endphp
    <div class="row">
        <h1>
            @if ($employer->exists)
                Editer un  Employer
                @section('title', 'Editer un Employer')
            @else
                Créer un  Employer
            @section('title', 'Créer un Employer')
        @endif
    </h1>
    <form action="{{ route($employer->exists ? 'employer.update' : 'employer.create', $employer->id) }}" method="POST"
        class='mt-5' enctype="multipart/form-data">
        @csrf
        @if ($employer->exists)
            @method('put')
        @else
            @method('post')
        @endif
        <div class="row">
            <div class="col-md-6">
                <label for="nom">nom </label>
                <input type="text" name="nom" id="nom" class='form-control @error('nom') is-invalid @enderror'
                    value="{{ $employer->exists ? $employer->nom : old('nom') }}">
                @error('nom')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="">email </label>
                <input type="text" name="email" id=""
                    class='form-control @error('email') is-invalid @enderror'value="{{ $employer->exists ? $employer->email : old('email') }}">
                @error('employer')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="departemen_id">Choix de du Genre </label>
<select name="sexe" id="departement_id" class='form-select @error('sexe') is-invalid @enderror '>
    <option value=""> </option>
    <option value="H" {{ $employer->sexe === 'H' ? $selected : '' }}>Homme</option>
    <option value="F"@if ($employer->sexe == 'F') selected @endif>Femme</option>
</select>
            </div>

            <div class="col-md-6">
                <label for="">montant_journalier</label>
<input type="text" name="salaire" id="" class='form-control @error('salaire') is-invalid @enderror'
    value="{{ $employer->exists ? $employer->salaire : old('salaire') }}">
@error('employer')
    <p class="invalid-feedback">{{ $message }}</p>
@enderror
            </div>
            <div class="col-md-6"><label for="departemen_id">Choix de Departement </label>
                <select name="departement_id" id="departement_id" class='form-select'>
                    <option value=""> </option>
                    @foreach ($departements as $item)
                        @if ($employer->exists)
                            <option value="{{ $item->id }}"@if ($item->id === $employer->departement->id) selected @endif>{{ $item->nom }}
                            </option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->nom }}</option>
                        @endif
                    @endforeach
                </select></div>
                <div class="col-md-12">
                    <label for="image">Photos</label>
                    <input type="file"  class="form-control" name="image" id='image'>
                </div>
        </div>
</div>
<button type='submit' class='btn btn-primary mt-2'>

    @if ($employer->exists)

        Modifier

    @else

        Créer

    @endif
</button>
</div>
</form>
</div>



