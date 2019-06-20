@extends('layouts.app')

@section('content')
<head>
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
		<a class="navbar-brand" href="/">ESII Coaching</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
			aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Produtos e Serviços</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="{{ url('/home') }}">VIP</a>
				</li>
			</ul>
			<form class="form-inline mt-2 mt-md-0">
				<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>
	<main role="main" class="container">
		<div class="row">
			<div class="col-md-8 blog-main">
				<h3 class="pb-4 mb-4 font-italic border-bottom">
					Produtos & Serviços
				</h3>
				@php
					$contador_div=0;
				@endphp
				<div class="card-deck" style="width: 70rem;">
				@foreach($produtoservicos as $produtoservico)
					<div class="card col-md-3 bg-dark">
							<img class="card-img-top"
								src="https://img.icons8.com/ios-glyphs/500/000000/shopping-bag-full.png"
								alt="Imagem de capa do card">
							<div class="card-body">
								<a href="{{ url("/produtoservico/$produtoservico->id") }}" > {{ $produtoservico->nome }} </a>
							</div>
					</div>
					@php
						$contador_div++;
					@endphp
					@if($contador_div == 4)
						</div>
						<br>
						<div class="card-deck" style="width: 70rem;">
						@php
						$contador_div=0;
						@endphp	
					@endif
				@endforeach
				
			</div>
		</div>
		</div>
	</main><!-- /.container -->
</body>
                             		                            
@endsection