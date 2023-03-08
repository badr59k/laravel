@extends('base')

@section ('page_title', 'Admin - Création')

@section('content')
    <h2> Admin - PhotoPlat - Création </h2>

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

    <form action="{{ route ('admin.photoplat.store')}}" method="post">
        @csrf
        <div class ="corps_formulaire">
            <div>
                <label for="file-upload"> chemin </label>
                <input class="@error('chemin') form--input--error @enderror" type="file" name="chemin" id="" value="{{old('chemin', $photoPlat->chemin) }}">
                @error('nom')
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