<div class="row mb-5">
	<div class="col-md-6 col-sm-12">
		Ficha Técnica
	</div>

	<div class="col-md-6 col-sm-12 text-right">
		<a href="/evento/inscricao" class="btn btn-outline-primary">Voltar</a>
	</div>
</div>

<?php foreach ($data['inscrito'] as $inscrito): ?>
<div class="row justify-content-center">
	<div class="col-md-6 col-sm-12">
		<div class="card mb-3">
			<div class="card-body">
				<ul class="list-group list-group-flush">
					<li class="list-group-item text-center">
						<img src="/upload/<?=$inscrito['tag']?>.png" class="img-thumbnail rounded" alt="<?=$inscrito['tag']?>.png" />
					</li>
					<li class="list-group-item">
						<strong>Nome: </strong> <?=$inscrito['nome'];?>
					</li>
					<li class="list-group-item">
						<strong>RGM: </strong> <?=$inscrito['rgm']; ?>
					</li>
					<li class="list-group-item">
						<strong>E-Mail: </strong> <?=$inscrito['email']; ?>
					</li>
					<li class="list-group-item">
						<strong>Curso: </strong> <?=$inscrito['curso']; ?>
					</li>
					<li class="list-group-item">
						<strong>Status: </strong> <?=$inscrito['ativo']==1?'Ativo':'Inativo';?>
					</li>
					<li class="list-group-item">
						<strong>Cadastrado em: </strong> <?=date('d/m/Y H:i:s', strtotime($inscrito['created']));?>
					</li>
					<li class="list-group-item">
						<strong>Atualizado em: </strong> <?=date('d/m/Y H:i:s', strtotime($inscrito['modified']));?>
					</li>
				</ul>
			</div>
		</div>
		<a href="/evento/inscricao/<?=$inscrito['inscrito_id']?>/edit" class="btn btn-outline-primary"><i class="fa fa-edit"></i> Editar</a>
		<a href="/evento/inscricao/<?=$inscrito['inscrito_id']?>/delete" class="btn btn-outline-danger confirm"><i class="fas fa-trash-alt"></i> Excluir</a>
	</div>
</div>
<?php endforeach; ?>
