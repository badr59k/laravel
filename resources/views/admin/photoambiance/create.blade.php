@extends('base')

@section ('page_title', 'Admin - Création')

@section('content')
    <h2> Admin - PhotoAmbiance - Création </h2>

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

    <form action="{{ route ('admin.photoambiance.store')}}" method="post">
        @csrf
        <div class ="corps_formulaire">
            <div>
                <label> Chemin </label>
                <input class="@error('chemin') form--input--error @enderror" type="file" name="chemin" id="" value="{{old('chemin', $photoAmbiance->chemin) }}">
                @error('chemin')
                    <div class=form-error--message> 
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label> Ordre </label>
                <input class="@error('ordre') form--input--error @enderror" type="number" name="ordre" id="" value="{{old('ordre', $photoAmbiance->ordre) }}">
                @error('ordre')
                    <div class=form-error--message> 
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label> Légende </label>
                <input class="@error('legende') form--input--error @enderror" type="text" name="legende" id="" value="{{old('legende', $photoAmbiance->legende) }}">
                @error('legende')
                    <div class=form-error--message> 
                        {{ $message }}
                    </div>
                @enderror
            </div>

        </div>
        <div>
            <button> Valider </button>
        </div>
    </form>
@endsection