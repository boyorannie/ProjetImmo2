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
            <h5 class="card-header text-center bg-primary text-white">Ajout Article</h5>
            <div class="card-body">

                    <form action="/EnregistrementBaseDeDonne" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Nom</label><br>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nom">
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label class="col-sm-5 col-form-label">Description</label>
                                    <br>
                                    
                                    <textarea name="description" class="form-control" aria-label="With textarea"></textarea>

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
                                            <option value="maison">Maison</option>
                                            <option value="studio">Studio</option>
                                            <option value="duplex">Duplex</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-5 col-form-label">Statut</label>
                                    <div class="col-sm-10">
                                        <select name="statut" class="form-select">

                                            <option value="occupe">Occupé</option>
                                            <option value="libre">Libre</option>     
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Nombre de Toilette</label><br>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="nombreToilette">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Nombre de Balcon </label><br>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="nombreBalcon">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-5 col-form-label">Espace vert</label>
                                    <div class="col-sm-10">
                                        <select name="espaceVert" class="form-select">
                                            <option value="disponible">Disponible</option>
                                            <option value="indisponible">Indisponible</option>     
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Nombre de metre carrée</label><br>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="dimension">
                                    </div>
                                </div>
                                <div class="input-group">
                                    <button type="submit" class="btn btn-success">Ajouter Article</button>
                                    

                                </div>

                                </div>
                    </form>
            </div>
        <!-- </div> -->
    </div>
</div>
<!-- </body> -->
            