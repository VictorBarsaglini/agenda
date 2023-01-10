
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar Contato</title>
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
        </div>
      </div>
    </nav>
  </header>
<div class="container">
  <div class="container" id="view-contact-container"> 
    <div id="back-link-container">
        <a href="/" id="back-link">Voltar</a>
      </div>
    <h1 id="main-title">{{ $contact->name }}</h1>
    <p class="bold">Telefone:</p>
    <p>{{ $contact->phone }}</p>
    <p class="bold">Observações:</p>
    <p>{{ $contact->observations }}</p>
  </div>
