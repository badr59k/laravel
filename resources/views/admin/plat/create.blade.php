@extends('base')

@section ('page_title', 'Admin - Plat - Création')

@section('content')
    <h2> Admin - Plat - Création </h2>

    <form action="{{ route('admin.plat.store') }}" method="post">
        @csrf
        <div class = corps_formulaire>
            <div>
                <input type="checkbox" name="epingle" id="plat_epingle">
                <label for="plat_epingle"> Epinglé </label>
            </div>
            <div>
                <label> Nom du plat</label>
                <input type="text" name="nom" id="" placeholder="Nom du plat" value="">
            </div>
            <div>
                <label> Prix (en Euro)</label>
                <input type="text" name="prix" id="" placeholder="Prix" value="">
            </div>
            <div>
                <label> Description</label>
                <textarea name="description" id="" cols="30" rows="10" placeholder="Description du plat"></textarea>
            </div>
            <div>
                <label>Catégorie</label>
                <select name="categorie_id" id="" >
                    <option value="">Catégorie du plat</option>
                    @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id}}">{{ $categorie->nom}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form--radio-buttons--scrollable">
                <label> Image du plat</label>
                @foreach ($photoPlats as $photoPlat)
                <div>
                    <input type="radio" name="photo_plat_id" id="photo_plat_id_{{ $photoPlat->id }}" value="{{ $photoPlat->id }}">
                    <label for = "photo_plat_id_{{ $photoPlat->id }}">
                        <img class="form--radio-buttons-image" src="{{ asset($photoPlat->chemin) }}" alt="photo {{ $photoPlat->id }}">
                        <span> photo {{ $photoPlat->id }}</span>
                    </label>
                </div>
                @endforeach
            </div>
            <div class="form--checkboxes--scrollable">
                <label>Etiquette(s)</label>
                @foreach ($etiquettes as $etiquette)
                <div>
                    <input type="checkbox" name="etiquette_id[]" id="etiquette_id_{{$etiquette->id}}" value="{{$etiquette->id}}">
                    <label for="etiquette_id_{{$etiquette->id}}">{{$etiquette->nom}}</label>
                </div>
                @endforeach
            </div>
        </div>
            <div>
                <button> Valider </button>
            </div>

    </form>
@endsection