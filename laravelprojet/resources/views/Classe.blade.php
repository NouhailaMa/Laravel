@extends('voyager::master')
@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">


    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    
    <title>Administration</title>
</head>
<body>


    
<div class="content" style="margin-left:12%; width:100%;">
        <div class="row header-container justify-content-center">
           
            
        </div>
        <div class="container-fluid mt-4">
            <div class="container-fluid mt-4">
                <div class="row justify-content-center">
                    <section class="col-md-9">
                        <div class="form">
                            <hr>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">AFFICHER CLASSES PAR FILIERES</h5>
                                    <p class="card-text">Vous trouvez ici toutes les informations concernant les classes.</p>

                                    <table id="myTable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">id</th>
                                                <th scope="col">Code</th>
                                                <th scope="col">Filière</th>
                                                <th scope="col">Année Scolaire</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($classes as $classe)
                                        <tr>
                                            <th> {{$classe['id']}} </th>
                                            <td> {{$classe['code']}} </td>
                                            <td> {{$classe['filiere']}} </td>
                                            <td> {{$classe['anneescolaire']}} </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
    
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () { 
        $('#myTable').DataTable();
        });
    </script>


</body>
</html>

@stop
