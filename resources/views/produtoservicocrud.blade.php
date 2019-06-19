@extends('layouts.app')

@section('content')

<style type="text/css">
	.table-wrapper {
		background: #fff;
		padding: 20px 25px;
		margin: 30px 0;
		border-radius: 3px;
		box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
	}

	.table-title .btn-group {
		float: right;
	}

	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}

	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}

	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}

	table.table tr th,
	table.table tr td {
		border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
	}

	table.table tr th:first-child {
		width: 60px;
	}

	table.table tr th:last-child {
		width: 100px;
	}

	table.table-striped tbody tr:nth-of-type(odd) {
		background-color: #fcfcfc;
	}

	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}

	table.table th i {
		font-size: 13px;
		margin: 0 5px;
		cursor: pointer;
	}

	table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
		margin: 0 5px;
	}

	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}

	table.table td a:hover {
		color: #2196F3;
	}

	table.table td a.edit {
		color: #FFC107;
	}

	table.table td a.delete {
		color: #F44336;
	}

	table.table td i {
		font-size: 19px;
	}

	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}

	.pagination {
		float: right;
		margin: 0 0 5px;
	}

	.pagination li a {
		border: none;
		font-size: 13px;
		min-width: 30px;
		min-height: 30px;
		color: #999;
		margin: 0 2px;
		line-height: 30px;
		border-radius: 2px !important;
		text-align: center;
		padding: 0 6px;
	}

	.pagination li a:hover {
		color: #666;
	}

	.pagination li.active a,
	.pagination li.active a.page-link {
		background: #03A9F4;
	}

	.pagination li.active a:hover {
		background: #0397d6;
	}

	.pagination li.disabled i {
		color: #ccc;
	}

	.pagination li i {
		font-size: 16px;
		padding-top: 6px
	}

	.hint-text {
		float: left;
		margin-top: 10px;
		font-size: 13px;
	}

	/* Custom checkbox */
	.custom-checkbox {
		position: relative;
	}

	.custom-checkbox input[type="checkbox"] {
		opacity: 0;
		position: absolute;
		margin: 5px 0 0 3px;
		z-index: 9;
	}

	.custom-checkbox label:before {
		width: 18px;
		height: 18px;
	}

	.custom-checkbox label:before {
		content: '';
		margin-right: 10px;
		display: inline-block;
		vertical-align: text-top;
		background: white;
		border: 1px solid #bbb;
		border-radius: 2px;
		box-sizing: border-box;
		z-index: 2;
	}

	.custom-checkbox input[type="checkbox"]:checked+label:after {
		content: '';
		position: absolute;
		left: 6px;
		top: 3px;
		width: 6px;
		height: 11px;
		border: solid #000;
		border-width: 0 3px 3px 0;
		transform: inherit;
		z-index: 3;
		transform: rotateZ(45deg);
	}

	.custom-checkbox input[type="checkbox"]:checked+label:before {
		border-color: #03A9F4;
		background: #03A9F4;
	}

	.custom-checkbox input[type="checkbox"]:checked+label:after {
		border-color: #fff;
	}

	.custom-checkbox input[type="checkbox"]:disabled+label:before {
		color: #b8b8b8;
		cursor: auto;
		box-shadow: none;
		background: #ddd;
	}

	/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}

	.modal .modal-header,
	.modal .modal-body,
	.modal .modal-footer {
		padding: 20px 30px;
	}

	.modal .modal-content {
		border-radius: 3px;
	}

	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}

	.modal .modal-title {
		display: inline-block;
	}

	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: #dddddd;
	}

	.modal textarea.form-control {
		resize: vertical;
	}

	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}

	.modal form label {
		font-weight: normal;
	}
</style>

<script type="text/javascript">

	$(document).ready(function() {
		// Activate tooltip
		$('[data-toggle="tooltip"]').tooltip();

		// Select/Deselect checkboxes
		var checkbox = $('table tbody input[type="checkbox"]');
		$("#selectAll").click(function() {
			if (this.checked) {
				checkbox.each(function() {
					this.checked = true;
				});
			} else {
				checkbox.each(function() {
					this.checked = false;
				});
			}
		});
		checkbox.click(function() {
			if (!this.checked) {
				$("#selectAll").prop("checked", false);
			}
		});
	});

	$('.dinheiro').mask('###0.00', {reverse: true});

</script>

<div class="container">
	<div class="table-wrapper">
		<div class="table-title">
			<div class="row">
				<div class="col-sm-6">
					<h2>Produtos e Serviços</h2>
				</div>
				<div class="col-sm-6">
					<a href="#incluirProdutoServico" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Incluir Produto ou Servico</span></a>
					<a href="#excluirProdutoServico" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
				</div>
			</div>
		</div>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>
						<span class="custom-checkbox">
							<input type="checkbox" id="selectAll">
							<label for="selectAll"></label>
						</span>
					</th>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Preço</th>
					<th>Tipo</th>
					<th>Opções</th>
				</tr>
			</thead>
			<tbody>
				@foreach($produtoservicos as $produtoservico)
				<tr>
					<td>
						<span class="custom-checkbox">
							<input type="checkbox" id="checkbox{{$produtoservico->id}}"  name="options[]" value="{{$produtoservico->id}}">
							<label for="checkbox{{$produtoservico->id}}"></label>
						</span>
					</td>
					<td>{{ $produtoservico->nome }}</td>
					<td>{{ $produtoservico->descricao }}</td>
					<td>{{ $produtoservico->preco }}</td>
					<td>{{ $produtoservico->tipo }}</td>
					<td>
						<a href="#editarProdutoServico" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
						<a href="#excluirProdutoServico" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>
</div>

<div id="incluirProdutoServico" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{route('produtoservicoincluir')}}" method="POST" class="form">
				@csrf
				<div class="modal-header">
					<h4 class="modal-title">Incluir Produto ou Serviço</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nome</label>
						<input type="text" name="nome" maxlength="100" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Descrição</label>
						<textarea maxlength="200" name="descricao" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label for="preco">Preço <b>R$</b></label>
						<input type="text" id="preco" maxlength="8" name="preco" class="dinheiro form-control" style="display:inline-block" />
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="tipo" id="produto" value="produto" checked>
						<label class="form-check-label" for="produto">
							Produto
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="tipo" id="servico" value="servico">
						<label class="form-check-label" for="servico">
							Serviço
						</label>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>

<div id="editarProdutoServico" class="modal fade">
	
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{url("/produtoservicocrud/$produtoservico->id/editar")}}" method="POST" class="form">
			@csrf
			<input type="hidden" name="_method" value="PUT" >
				<div class="modal-header">
					<h4 class="modal-title">Editar Produto ou Serviço</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nome</label>
						<input type="text" name="nome" maxlength="100" class="form-control" value="{{$produtoservico->nome}}" required>
					</div>
					<div class="form-group">
						<label>Descrição</label>
						<textarea maxlength="200" name="descricao" class="form-control" value="{{$produtoservico->descricao}}" required></textarea>
					</div>
					<div class="form-group">
						<label for="preco">Preço <b>R$</b></label>
						<input type="text" id="preco" maxlength="8" name="preco" class="dinheiro form-control" style="display:inline-block" value="{{$produtoservico->preco}}"  />
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="tipo" id="produto" value="produto" checked>
						<label class="form-check-label" for="produto">
							Produto
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="tipo" id="servico" value="servico">
						<label class="form-check-label" for="servico">
							Serviço
						</label>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>

<div id="excluirProdutoServico" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{url("/produtoservicocrud/$produtoservico->id")}}" method="POST" class="form">
				@csrf
				<input type="hidden" name="_method" value="DELETE" >
				<div class="modal-header">
					<h4 class="modal-title">Excluir Produto ou Serviço</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Tem certeza que deseja exluir este(s) itens?</p>
					<p class="text-warning"><small>Essa ação não pode ser desfeita.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>



@endsection