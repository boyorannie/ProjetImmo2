@extends('layouts.user')
@section('content')
<!-- Property List Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Nos biens Immobliers</h1>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    @foreach ($articles as $article)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href="{{route('voirArticle', [$article->id])}}"><img class="img-fluid" src="{{asset('storage/'. $article->image) }}" height="400px"></a>
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Property List End -->
    @endsection