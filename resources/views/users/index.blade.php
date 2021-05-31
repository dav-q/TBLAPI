
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Front</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->

    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              {{-- <h4 class="text-white">About</h4> --}}
              {{-- <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p> --}}
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Módulos</h4>
              <ul class="list-unstyled">
                <li><a href="/get_users" class="text-white">Usuarios</a></li>
                <li><a href="/get_type_docs" class="text-white">Tipos de documento</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="/" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                <strong>Api laika</strong>
              </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <main role="main">

        <div class="col-md-12 mt-5 mb-3 text-right">
            <a href="/get_users/create" class="btn btn-primary">Nuevo usuario</a>
        </div>

        @if ($array_data && count($array_data)>0)

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Tipo de documento</th>
                    <th scope="col">N° documento</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Email</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($array_data as $key=> $item)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $item["names"] }}</td>
                        <td>{{ $item["last_names"] }}</td>
                        <td>{{ $item["has_type_doc"]["name"] }}</td>
                        <td>{{ $item["number_document"] }}</td>
                        <td>{{ $item["birthday"] }}</td>
                        <td>{{ $item["email"]  }}</td>
                        <td>
                            <a href="{{ route('edit_user',$item["id"]) }}" class="btn btn-warning">Editar</a>
                            {!! Form::open(['route'=>['delete_user',$item["id"],'METHOD'=>'POST']]) !!}
                                {!! Form::submit('Eliminar', ['class'=>"btn btn-danger",'onclick'=>'return confirm("Seguro de eliminar el registro?")']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            @else
            <div class="text-center">
                <h3>No hay usuarios aún</h3>
            </div>
        @endif


    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>
