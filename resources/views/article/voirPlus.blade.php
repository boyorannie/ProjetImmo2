@extends('layouts.admin')
@section('contenueAdmin')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <img src="{{asset('storage/'. $article->image) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $article->nom }}</h5>
                <p class="card-text">{{ $article->description }}</p>
                <p><b>Nombre de Toilette:</b> {{$article->nombreToilette}}</p>
                <p><b>Nombre de Balcon:</b> {{$article->nombreBalcon}}</p>
                <p><b>Dimension:</b> {{$article->dimension}}</p>
            </div>
        </div><!-- End Card with an image on top -->
    </div>
    <h5 class="card-title">Liste Chambres</h5>
    @forelse($chambres as $key => $chambre)
    @php
    $image = explode(',',$chambre->image)
    @endphp
    @foreach ($image as $key2 => $image)
    <div class="col-md-3">
        <div class="card">
            <img src="{{asset('storage/'. $article->image) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Chambre {{$key+1}}</h5>
                <p class="card-text"><b>Dimension:</b> {{ $chambre->dimension }}</p>
                <p class="card-text"><b>Vue:</b> {{ $key2+1}}</p>
                <a href="{{route('modifier_chambres', [$chambre->id])}}" class="btn btn-primary m-1">Modifier la chambre</a>
                <form action="{{route('supprmer_chambre', [$chambre->id])}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger m-1">Supprimer la chambre</button>
                </form>
            </div>
        </div><!-- End Card with an image on top -->
    </div>
    @endforeach
    @empty
    <h5 class="card-title text-center">Ajouter les chambres SVP</h5>
    @endforelse
    <div class="col-md-12">
        <div class="card-body">
            <div class="card">
                <form class="row g-3 m-4" action="{{route('ajouter_chambre', [$article->id])}}" method="post" enctype="multipart/form-data">
                    @method('post')
                    @csrf
                    <h5 class="card-title">Ajouter une chanbre Chambre</h5>
                    <div class="col-md-5">
                        <label class="col-form-label">Dimension en m2</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="dimension">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label class="col-form-label">Image</label>
                        <div class="col-md-12">
                            <input type="file" name="image[]" class="form-control" multiple="multiple">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="col-form-label">action</label>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </div>
                </form><br>
            </div>
        </div>
    </div>
</div>
@endsection