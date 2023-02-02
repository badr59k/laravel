@extends('base')

@section ('page_title', 'Admin - Modification')

@section('content')
    <h2> Admin - Restaurant - Modification</h2>

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
    
    <form action="{{ route ('admin.restaurant.update', ['id' => $restaurant ->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class ="corps_formulaire">
            <div>
                <label> Clé </label>
                <input class="@error('cle') form--input--error @enderror" type="text" name="cle" id="" value="{{old('cle', $restaurant->cle) }}" readonly>
                @error('cle')
                    <div class=form-error--message> 
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label> Valeur </label>
                <input class="@error('valeur') form--input--error @enderror" type="text" name="valeur" id="" value="{{old('valeur', $restaurant->valeur) }}">
                @error('valeur')
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