@extends('base')

@section ('page_title', 'Admin - Modification')

@section('content')
    <h2> Admin - actu - Modification</h2>

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
    
    <form action="{{ route ('admin.actu.update', ['id' => $actu ->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class ="corps_formulaire">
            <div>
                <label> Jour de publication </label>
                <input class="@error('jour_publication') form--input--error @enderror" type="date" name="jour_publication" id="" value="{{old('jour_publication', $actu->jour_publication) }}">
                @error('jour_publication')
                    <div class=form-error--message> 
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label> Heure de publication </label>
                <input class="@error('heure_publication') form--input--error @enderror" type="time" name="heure_publication" id="" value="{{old('heure_publication', $actu->heure_publication) }}">
                @error('heure_publication')
                <div class=form-error--message> 
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div>
                <label> Texte de la publication</label>
                <input class="@error('texte') form--input--error @enderror" type="text" name="texte" id="" value="{{old('texte', $actu->texte) }}">
                @error('texte')
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