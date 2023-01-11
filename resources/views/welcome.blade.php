<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agenda de Contatos</title>
  <!-- BOOTSTRAP -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css"
    integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g=="
    crossorigin="anonymous" />
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />
  <!-- CSS -->
  <link rel="stylesheet" href="/css/styles.css">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="/">
        <img src="/img/logo.svg" alt="Agenda">
      </a>
      <div>
        <div class="navbar-nav">
          <a class="nav-link active" id="home-link" href="/">Agenda</a>
          <a class="nav-link active" href="/contacts/create">Adicionar Contato</a>
        </div>
      </div>
    </nav>
  </header>
  <div class="container">
    @if(session('msg'))
    <p class="msg">{{ session('msg') }}</p>
    @endif
    <h1 id="main-title">Minha Agenda</h1>

    <table class="table" id="contacts-table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Telefone</th>
          <th scope="col">Observações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($contacts as $contact)
        <tr>
          <td scope="row" class="col-id">{{ $contact->id }}</td>
          <td scope="row">{{ $contact->name }}</td>
          <td scope="row">{{ $contact->phone }}</td>
          <td class="actions">
            <a href="/contacts/{{$contact->id}}"><i class="fas fa-eye check-icon"></i></a>
            <a href="/contacts/edit/{{$contact->id}}"><i class="far fa-edit edit-icon"></i></a>
            <a type="button" data-toggle="modal" data-target="#modal-delete"><i class="fas fa-times delete-icon"></i></a>

            {{-- <form class="delete-form" action="/contacts/{{ $contact->id}}" method="POST">
            @csrf
            @method ('DELETE')
            <input type="hidden" name="type" value="delete">
            <input type="hidden" name="id" value="{{ $contact->id }}">
            <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
            </form> --}}


        <!-- Modal deletar -->
        <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Confirmar exclusão?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                        <form class="delete-form" action="/contacts/{{ $contact->id}}" method="POST">
                          @csrf
                          @method ('DELETE')
                          <input type="hidden" name="type" value="delete">
                          <input type="hidden" name="id" value="{{ $contact->id }}">
                          <button type="submit" class="btn btn-danger">Confirmar</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>


          </td>
        </tr>
        @endforeach
      </tbody>
    </table>