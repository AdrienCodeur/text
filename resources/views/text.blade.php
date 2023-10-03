@extends('layouts.master')

@section('content')

    <form action="{{ route('text.store') }}" method="post">

        @csrf
        @method('post')
        <div class="form-group">

            <label for="nom">nom:</label>
            <input type="text" name='nom' class='form-control'>
            @error('nom')
                <span class=''>
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">

            <label for="nom">nom:</label>
            <input type="text" name='nom' class='form-control'>
            @error('nom')
                <span class='text text-danger'>
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">

            <label for="nom">email:</label>
            <input type="text" name='email' class='form-control'>
            @error('email')
                <span class='text text-danger'>
                    {{ $message }}
                </span>
            @enderror
        </div> <div class="form-group">

            <label for="nom">email:</label>
            <input type="text" name='email' class='form-control'>
            @error('email')
            <span class=' text text-danger'>
                {{ $message }}
            </span>@enderror
        </div>
        <button type="submit" class='btn btn-success'> enregistrer</button>
    </form>


@stop
