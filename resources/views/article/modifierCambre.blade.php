@extends('layouts.admin')
@section('contenueAdmin')
<div class="row">
    <div class="col-md-12">
        <div class="card-body">
            <div class="card">
                <form class="row g-3 m-4" action="{{route('modifier_chambre', [$chambre->id])}}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <h5 class="card-title">Modifier la Chambre</h5>
                    <div class="col-md-5">
                        <label class="col-form-label">Dimension en m2</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="dimension" value="{{$chambre->dimension}}">
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
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </div>
                </form><br>
            </div>
        </div>
    </div>
</div>
@endsection