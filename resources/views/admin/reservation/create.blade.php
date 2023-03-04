@extends('base')

@section ('page_title', 'Admin - Création')

@section('content')
    <h2> Admin - Réservation - Création </h2>

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

    <form action="{{ route ('admin.reservation.store')}}" method="post">
        @csrf
        <div class ="corps_formulaire">
            <div>
                <label> Nom </label>
                <input class="@error('nom') form--input--error @enderror" type="text" name="nom" id="" value="{{old('nom', $reservation->nom) }}">
                @error('nom')
                    <div class=form-error--message> 
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label> Prénom </label>
                <input class="@error('prenom') form--input--error @enderror" type="text" name="prenom" id="" value="{{old('prenom', $reservation->prenom) }}">
                @error('prenom')
                    <div class=form-error--message> 
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label> Jour </label>
                <input class="@error('jour') form--input--error @enderror" type="date" name="jour" id="" value="{{old('jour', $reservation->jour) }}">
                @error('jour')
                    <div class=form-error--message> 
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label> Heure</label>
                <select name="heure" id="">
                    @foreach ($creneaux_horaires as $creneau_horaire)
                        <option value="{{ $creneau_horaire }}" @if (old('heure', $reservation->heure) == $creneau_horaire) selected @endif>{{ $creneau_horaire }}</option>
                    @endforeach
                </select>
                @error('heure')
                    <div class=form-error--message> 
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label> Couverts </label>
                <input class="@error('nombre_personnes') form--input--error @enderror" type="number" name="nombre_personnes" id="" value="{{old('nombre_personnes',$reservation->nombre_personnes) }}">
                @error('nombre_personnes')
                    <div class=form-error--message> 
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label> Tel </label>
                <input placeholder="06 12 34 56 78" class="@error('tel') form--input--error @enderror" type="tel" name="tel" id="" value="{{old('tel', $reservation->tel) }}">
                @error('tel')
                    <div class=form-error--message> 
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label> Email</label>
                <input placeholder="ocnamo@contact.net" class="@error('email') form--input--error @enderror" type="email" name="email" id="" value="{{old('email', $reservation->email) }}">
                @error('email')
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
