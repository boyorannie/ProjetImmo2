@extends('layouts.user')
@section('content')
<!-- Property List Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href="{{route('voirArticle', [$article->id])}}"><img class="img-fluid" src="{{asset('storage/'. $article->image) }}" width="100%"></a>
                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">{{$article->nom}}</div>
                            </div>
                            <div class="p-4 pb-0">
                                <a class="d-block h5 mb-2" href="">{{$article->nom}}</a>
                                <p><b class="text-primary">Description:</b> {{$article->description}}</p>
                                <p><b class="text-primary">EspaceVert:</b> {{$article->espaceVert}}</p>
                                <p><b class="text-primary">Type:</b> {{$article->type}}</p>
                                <p><b class="text-primary">Statut:</b> {{$article->statut}}</p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>{{$article->dimension}} m2</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>{{count($article->chambres()->get())}}</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>{{$article->nom}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br>
<!-- Property List End -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="mb-3">Les chambres</h1>

        <div class="row g-0 gx-5 align-items-end">
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
                    </div>
                </div><!-- End Card with an image on top -->
            </div>
            @endforeach
        </div>
    </div>
</div>
@empty
@endforelse
<div class="container-xxl py-5">
    <div class="row g-0 gx-5 align-items-end">
        <div class="container">
            <h1 class="mb-3">Les commentaires</h1>
            <div class="col-lg-12">
                @forelse($article->commentaires()->get() as $commentaire)
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-8">
                        <p class="card-text">{{ $commentaire->contenu }}</p>
                    </div>
                    @auth
                    @if ($commentaire->user_id == Auth::user()->id)
                    <div class="col-lg-2">
                        <a href="{{route('commenterVoir', $commentaire->id)}}" class="btn btn-warning m-1">Modifier</a>
                    </div>
                    <div class="col-lg-2">
                        <form method="POST" action="{{route('commenterSupprimer', $commentaire->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger m-1">Supprimer</button>
                        </form>
                    </div>
                    @endif
                    @endauth
                </div>
                @empty
                <h3 class="mb-3">Ce bien na pas encore de commentaire</h3>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Search Start -->
<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <div class="row g-2">
            <form action="{{route('commenter', [$article->id])}}" method="post">
                @method('post')
                @csrf
                <div class="col-md-12">
                    <div class="row g-2">
                        <textarea name="contenue" class="form-control border-0 py-3" id="" cols="30" rows="10"></textarea>
                    </div>
                </div><br>
                <div class="col-md-2">
                    <button class="btn btn-dark border-0 w-100 py-3">commenter</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Search End -->
@endsection