@extends('layouts.admin')
@section('contenueAdmin')

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Datatables</h5>

                    <!-- Table with stripped rows -->
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">image</th>
                                <th scope="col">nom</th>
                                <th scope="col">description</th>
                                <th scope="col">type</th>
                                <th scope="col">statut</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <img src="{{asset('storage/'. $article->image) }}" alt="" class="rounded-circle" width="40" height="40">
                                </td>
                                <td>{{ $article->nom }} </td>
                                <td>{{ $article->description }}</td>
                                <td>{{ $article->type }}</td>
                                <td>{{ $article->statut }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="/admin/article/{{$article->id}}" class="btn btn-warning m-1">Voir plus</a>
                                    <a href="/admin/modifier/{{$article->id}}" class="btn btn-warning m-1">Modifier</a>
                                    <form method="POST" action="/admin/articleSupprimer/{{ $article->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger m-1">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection