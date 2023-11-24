<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/lumen/bootstrap.css">
    <title>Document</title>
</head>
<!-- <body> -->


<!-- </html> -->



<div class="container">
    <div class="card">
        <!-- <div class="col-md-6 offset-3 mt-5"> -->
        <h5 class="card-header text-center bg-primary text-white">Modifier Article</h5>
        <div class="card-body">

            <form action="/misAjour/{{$articles->id}}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nom</label><br>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nom" value="{{$articles->nom}}">
                    </div>
                </div>
                <div class="input-group">
                    <label class="col-sm-5 col-form-label">Description</label>
                    <br>

                    <textarea name="description"  class="form-control" aria-label="With textarea">{{$articles->description}}</textarea>

                </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-5 col-form-label">Image</label><br>
            <div class="col-sm-10">
                <input type="file" name="image" class="form-control"><br>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-5 col-form-label">Type</label>
            <div class="col-sm-10">
                <select name="type" class="form-select">
                    <option value="terrain" {{$articles->type == 'terrain' ? 'selected' : ''}}>Terrain</option>
                    <option value="maison" {{$articles->type == 'maison' ? 'selected' : ''}}>Maison</option>
                    <option value="studio" {{$articles->type == 'studio' ? 'selected' : ''}}>Studio</option>
                    <option value="duplex" {{$articles->type == 'duplex' ? 'selected' : ''}}>Duplex</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-5 col-form-label">Statut</label>
            <div class="col-sm-10">
                <select name="statut" class="form-select">

                    <option value="occupe" {{$articles->statue == 'occupe' ? 'selected' : ''}}>Occupé</option>
                    <option value="libre" {{$articles->statue == 'libre' ? 'selected' : ''}}>Libre</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nombre de Toilette</label><br>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="nombreToilette" value="{{$articles->nombreToilette}}">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nombre de Balcon </label><br>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="nombreBalcon" value="{{$articles->nombreBalcon}}">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-5 col-form-label">Espace vert</label>
            <div class="col-sm-10">
                <select name="espaceVert" class="form-select">
                    <option value="disponible" {{$articles->espaceVert == 'disponible' ? 'selected' : ''}}>Disponible</option>
                    <option value="indisponible" {{$articles->espaceVert == 'indisponible' ? 'selected' : ''}}>Indisponible</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nombre de metre carrée</label><br>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="dimension" value="{{$articles->dimension}}">
            </div>
        </div>
        <div class="input-group">
            <button type="submit" class="btn btn-success">Modifier</button>


        </div>

    </div>
    </form>
</div>
<!-- </div> -->
</div>
</div>
<!-- </body> -->