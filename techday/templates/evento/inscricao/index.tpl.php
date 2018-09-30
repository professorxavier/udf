<div class="row">
		<div class="col-md-6 col-sm-12">
			<h1>Inscirções</h1>
		</div>

		<div class="col-md-6 col-sm-12 text-right">
			<a href="/evento/inscricao/create" class="btn btn-outline-my-color-1">Nova Inscrição</a>
		</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12">
		<table class="table table-hover table-striped" id="evento">
			<thead>
				<tr>
					<th>#</th>
					<th>Nome</th>
					<th>RGM</th>
					<th>E-Mail</th>
					<th>Curso</th>
					<th>Status</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($data['aluno'] as $aluno): ?>				
				<tr>
					<td><?=$aluno['inscrito_id']; ?></td>
					<td><?=$aluno['nome']; ?></td>
					<td><?=$aluno['rgm']; ?></td>
					<td><?=$aluno['email']; ?></td>
					<td><?=$aluno['curso']; ?></td>
					<td><?=$aluno['ativo']==1?'Ativo':''; ?></td>
					<td class="text-right">
                        <a href="/evento/inscricao/<?=$aluno['inscrito_id'];?>" class="btn btn-outline-my-color-1 btn-sm"><i class="fas fa-eye"></i></a>
                    </td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr>
					<th>#</th>
					<th>Nome</th>
					<th>RGM</th>
					<th>E-Mail</th>
					<th>Curso</th>
					<th>Status</th>
					<th>Ação</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>