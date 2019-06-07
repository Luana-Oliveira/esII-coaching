<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <title>Coaching</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">

  <!-- Styles -->
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">ESII Coaching</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      @if (Route::has('login'))
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Produtos e Serviços</a>
        </li>
        <li class="nav-item active">
          @auth
          <a class="nav-link" href="{{ url('/home') }}">VIP</a>
          @else
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item active">
          @if (Route::has('register'))
          <a class="nav-link" href="{{ route('register') }}">Registrar</a>
          @endif
          @endauth
        </li>
      </ul>
      @endif
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <div class="jumbotron p-10 p-md-10 text-white rounded bg-dark">
    <div class="col-md-10 px-0">
      <h1 class="display-4 font-italic">Exemplo aleatório de post, para instigar a pessoa a logar</h1>
      <p class="lead my-3">Para continuar lendo, por favor faça login no site sz</p>
      @if (Route::has('login'))
      @auth
      <p class="lead mb-0"><a href="{{ url('/home') }}" class="text-white font-weight-bold">Continuar lendo...</a></p>
      @else
      <p class="lead mb-0"><a href="{{ route('login') }}" class="text-white font-weight-bold">Continuar lendo...</a></p>
      @endauth
      @endif
    </div>
  </div>

  <div class="row mb-2">
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <h3 class="mb-0">Anúncio de Produto</h3>
          <div class="mb-1 text-muted">7 de Junho</div>
          <p class="card-text mb-auto">Produto que vai revolucionar sua vida psicológica, e te animar xD</p>
          <a href="#" class="stretched-link">É AQUI ONDE VC COLOCA O ACESSO A PAG PRODUTOS E SERVIÇOS...</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Produto incrivel</text>
          </svg>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <h3 class="mb-0">Anúncio de Serviço</h3>
          <div class="mb-1 text-muted">8 de Junho</div>
          <p class="mb-auto">Serviço é importante blá blá blá blá.</p>
          <a href="#" class="stretched-link">É AQUI ONDE VC COLOCA O ACESSO A PAG PRODUTOS E SERVIÇOS...</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Serviço incrivel</text>
          </svg>
        </div>
      </div>
    </div>
  </div>
  <main role="main" class="container">
    <div class="row">
      <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
          Sobre mim
        </h3>
        <p>sou um cara legal. Lindo e maravilhoso, também sou inteligente xD</p>
      </div>

      <aside class="col-md-4 blog-sidebar">
        <div class="p-4 mb-3 bg-light rounded">
          <h4 class="font-italic">Contato</h4>
          <p>Email: coaching@gmail.com</p>
          <p>Telefone: 40028922</p>
          <a href="https://www.facebook.com">Facebook</a>
          <a href="https://www.instagram.com/?hl=pt-br">Instagram</a>
          <a href="https://br.linkedin.com">Linkedin</a>
        </div>
      </aside><!-- /.blog-sidebar -->
    </div>
  </main><!-- /.container -->
</body>
</html>
