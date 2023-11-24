<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/lumen/bootstrap.css">
    <title>Document</title>
</head>
<!-- <body>
    
</body> -->
<div class="container">
    <div class="card">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Type</th>
                        <th scope="col">Statut</th>
                        <th scope="col">Nombre de Toilette</th>
                        <th scope="col">Nombre de Balcon</th>
                        <th scope="col">Espace vert</th>
                        <th scope="col">Nombre de metre carrée</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    @foreach($articles as $articles)
                    <tbody>
                        <!-- <tr class="table-active"> -->
                        <tr class="table-default">
                        
                            <!-- <th scope="row">Active</th> -->
                            <td>{{$articles->nom}}</td>
                            <td>{{$articles->description}}</td>
                            <td>{{ $articles->image}}</td>
                            <td>{{ $articles->type}}</td>
                            <td>{{$articles->statut}}</td>
                            <td>{{$articles->nombreToilette}}</td>
                            <td>{{ $articles->nombreBalcon}}</td>
                            <td>{{$articles->espaceVert}}</td>
                            <td>{{ $articles->dimension }}</td>

                           <td class="d-flex justify-content-center align-items-center">
                                <div class="mt-4 mb-2">
                                </div>
                                <a href="/pageAcueille" class="btn btn-success px-4 pr-4">
                                    <i class="fas fa-info-circle"></i> Ajout
                                </a>
                                <a href="/modifier/{{$articles->id}}" class="btn btn-warning m-1 px-4 pr-4">
                                    <i class="fas fa-exclamation-triangle"></i> Modifier
                                </a>
                                <form action="/Supprimer/{{$articles->id}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
    </div>
</div>
</html>