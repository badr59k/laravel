@extends('base')

@section ('page_title', 'Admin - Modification')

@section('content')
    <h2> Admin - Catégorie - Modification</h2>

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
    
    <form action="{{ route ('admin.photoplat.update', ['id' => $photoPlat ->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class ="corps_formulaire">
            <div>
                <label> chemin </label>
                <input class="@error('chemin') form--input--error @enderror" type="text" name="chemin" id="" value="{{old('chemin', $photoPlat->chemin) }}">
                @error('chemin')
                    <div class=form-error--message> 
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="pied_formulaire">
                <button>Modifier</button>
            </div>
    </form>
@endsection