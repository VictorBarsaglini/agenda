<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agenda de Contatos</title>
  <!-- BOOTSTRAP -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" />
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
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
          @auth
          <a class="nav-link active" href="/dashboard">Meus contatos</a>
          <form action="/logout" method="POST">
            @csrf
            <a href="/logout" 
                class="nav-link" 
                onclick="event.preventDefault();
                this.closest('form').submit();">
                Sair
              </a>    
          </form>
          @endauth
          @guest
          <a class="nav-link active" href="/login">Entrar</a>
          <a class="nav-link active" href="/register">Cadastrar</a>
          @endguest
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
                <form class="delete-form" action="/contacts/{{ $contact->id}}" method="POST">
                @csrf
                @method ('DELETE')
                  <input type="hidden" name="type" value="delete">
                  <input type="hidden" name="id" value="{{ $contact->id }}">
                  <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                </form>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>