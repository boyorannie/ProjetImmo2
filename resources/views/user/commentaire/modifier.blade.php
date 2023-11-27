@extends('layouts.user')
@section('content')
<br>
<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <div class="row g-2">
            <form action="{{route('commenterModifier', [$commentaire->id])}}" method="post">
                @method('patch')
                @csrf
                <div class="col-md-12">
                    <div class="row g-2">
                        <textarea name="contenu" class="form-control border-0 py-3" id="" cols="30" rows="10">{{$commentaire->contenu}}</textarea>
                    </div>
                </div><br>
                <div class="col-md-2">
                    <button class="btn btn-dark border-0 w-100 py-3">commenter</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection