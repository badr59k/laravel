@extends('base')

@section ('page_title', 'Admin - Création')

@section('content')
    <h2> Admin - Etiquettes - Création </h2>

    @if (Session::has('confirmation'))
        <div class=form-confirmation--message>
            {{ Session::get('confirmation')}}
        </div>
    @endif

    @if ($errors->any())
        <div class=form-error--message>
            Attention, les données n'ont pas été enregistrées, il y a des erreurs dans le formulaire
        </div>
    @endif

    <form action="{{ route ('admin.etiquette.store')}}" method="post">
        @csrf
        <div class ="corps_formulaire">
            <div>
                <label> Nom </label>
                <input class="@error('nom') form--input--error @enderror" type="text" name="nom" id="" value="{{old('nom', $etiquette->nom) }}">
                @error('nom')
                    <div class=form-error--message> 
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label> Description </label>
                <input class="@error('description') form--input--error @enderror" type="text" name="description" id="" value="{{old('description', $etiquette->description) }}">
                @error('description')
                    <div class=form-error--message> 
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="pied_formulaire">
            <button>Valider</button>
        </div>
    </form>
@endsection