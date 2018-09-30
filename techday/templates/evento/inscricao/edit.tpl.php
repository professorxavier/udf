<div class="row">
	<div class="col-md-6 col-sm-12">
		<h1>Editar Inscrição</h1>
	</div>
	<div class="col-md-6 col-sm-12 text-right">
		<a href="/evento/inscricao" class="btn btn-outline-primary">Voltar</a>
	</div>
</div>

<?php foreach ($data['inscrito'] as $inscrito): ?>
<div class="row mt-4">
	<div class="col-md-12 col-sm-12">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-row text-center">
				<!--<div class="col-md-6 col-sm-12 form-group">
					<input id="img" name="img" type="hidden" class="form-control" required />
					<video id="player" width=220 height=200 controls autoplay></video>
					<canvas id="snapshot" width=200 height=190></canvas>
				</div>-->
				<div class="col-md-12 col-sm-12 form-group text-center">
					<img src="/upload/<?=$inscrito['tag']?>.png" alt="<?=$inscrito['tag']?>.png" />
				</div>
			</div>

			<!--<div class="form-row mb-2 text-center">
				<div class="col-md-12 col-sm-12 form-group">
					<button id="capture" class="btn btn-outline-primary">Capture</button>
				</div>
			</div>-->

			<div class="form-row">
				<div class="col-md-12 col-sm-12 form-group">
					<label>Nome</label>
					<input type="text" name="nome" class="form-control" value="<?=$inscrito['nome'];?>" autofocus required />
				</div>
			</div>
 
			<div class="form-row">
				<div class="col-md-6 col-sm-12 form-group">
					<label>RGM: </label>
					<input type="text" name="rgm" id="txtrgm" class="form-control" value="<?=$inscrito['rgm']; ?>" required />
				</div>

				<div class="col-md-6 col-sm-12 form-group">
					<label>E-Mail: </label>
					<input type="email" name="email" id="txtemail" class="form-control" value="<?=$inscrito['email']; ?>" required />
				</div>
			</div>

			<div class="form-row">
				<div class="col-md-6 col-sm-12 form-group">
					<label>Curso</label>
					<select name="idcurso" class="form-control" required>
						<option value selected="true" disabled="true">Selecione o curso</option>
						<?php foreach ($data['cursos'] as $curso):?>
							<option value="<?=$curso['idcurso']?>"<?=$inscrito['idcurso']==$curso['idcurso']?'selected':'';?> ><?=$curso['curso'];?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="col-md-6 col-sm-12 form-group">
					 <label>Tag</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">#</span>
                        </div>
                        <input type="text" name="tag" class="form-control" value="<?=$inscrito['tag'];?>" required />
                    </div>
				</div>
			</div>

			<div class="form-row">
				<div class="col-md-12 col-sm-12 form-group">
					<button type="submit" class="btn btn-outline-success">Atualizar</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php endforeach; ?>