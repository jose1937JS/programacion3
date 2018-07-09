<div class="container mt-4">
	<div class="row">
		<div class="col-sm-4">
			<div class="card">
				<div class="card-content">
					<div class="card-body">
						<img src="asdsad" class="img-fluid img-thumbnail">
						<br><br>
						<p><?= $perfil[0]['about'] ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
		
			<div class="card mb-4">
				<div class="card-content">
					<div class="card-body">
						<div class="d-flex justify-content-between">
							<button class="btn btn-primary mb-4" data-toggle="modal" data-target="#editar"><i class="fa fa-edit"></i> Editar</button>
							
							<?php if ( isset($_GET['msgerr']) && $_GET['msgerr'] == "valpass" ): ?>
								<h2>Las contraseñas no coinciden.</h2>
							<?php endif ?>
						</div>
						<div class="row">
							<div class="col">
								<ul class="list-group">
									<li class="list-group-item"><h5 class="d-inline font-weight-bold">Cédula: </h5><?= $perfil[0]['cedula'] ?></li>
									<li class="list-group-item"><h5 class="d-inline font-weight-bold">Nombre: </h5><?= $perfil[0]['nombre'] ?></li>
									<li class="list-group-item"><h5 class="d-inline font-weight-bold">Apellido: </h5><?= $perfil[0]['apellido'] ?></li>
									<li class="list-group-item"><h5 class="d-inline font-weight-bold">Direción: </h5><?= $perfil[0]['direccion'] ?></li>
									<li class="list-group-item"><h5 class="d-inline font-weight-bold">Teléfono: </h5><?= $perfil[0]['telefono'] ?></li>
								</ul>
							</div>
							<div class="col">
								<li class="list-group-item"><h5 class="d-inline font-weight-bold">Email: </h5><?= $perfil[0]['email'] ?></li>
								<li class="list-group-item"><h5 class="d-inline font-weight-bold">Nacionalidad: </h5><?= $perfil[0]['nacionalidad'] ?></li>
								<li class="list-group-item"><h5 class="d-inline font-weight-bold">Profesión: </h5><?= $perfil[0]['profesion'] ?></li>
								<li class="list-group-item"><h5 class="d-inline font-weight-bold">Usuario: </h5><?= $perfil[0]['usuario'] ?></li>
								<li class="list-group-item"><h5 class="d-inline font-weight-bold">Clave: </h5><?= hash('md5',$perfil[0]['clave']) ?></li>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>


<!-- MODAL -->

<div class="modal fade" id="editar">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form method="post" action="<?= RUTA_HTTP ?>/?c=Inicio&a=editar&user=<?= $_GET['user'] ?>">
				<div class="modal-body">
					<h3>Editar información personal</h3>
					<div class="row mt-4">
						<div class="col">
							<label for="ced">Cédula</label>
							<input class="form-control" type="text" disabled value="<?= $perfil[0]['cedula'] ?>" id="ced">
						</div>
						<div class="col">
							<label for="name">Nombre</label>
							<input class="form-control" type="text" name="nombre" maxlength="50" value="<?= $perfil[0]['nombre'] ?>" id="name">
						</div>
						<div class="col">
							<label for="surname">Apellido</label>
							<input class="form-control" type="text" name="apellido" maxlength="50" value="<?= $perfil[0]['apellido'] ?>" id="surname">
						</div>
					</div>
					<div class="row mt-4">
						<div class="col">
							<label for="direccion">Dirección</label>
							<input class="form-control" type="text" name="direccion" maxlength="150" value="<?= $perfil[0]['direccion'] ?>" id="direccion">
						</div>
						<div class="col">
							<label for="telefono">Teléfono</label>
							<input class="form-control" type="text" name="telefono" maxlength="11" value="<?= $perfil[0]['telefono'] ?>" id="telefono">
						</div>
						<div class="col">
							<label for="email">Email</label>
							<input class="form-control" type="email" name="email" value="<?= $perfil[0]['email'] ?>" maxlength="60" id="email">
						</div>
					</div>
					<div class="row mt-4">
						<div class="col">
							<label for="pais">Nacionalidad</label>
							<select name="nacionalidad" class="custom-select">
								<?php foreach ($nacionalidad as $pais): ?>
									<option value="<?= $pais['id'] ?>"><?= $pais['nacionalidad'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="col">
							<label for="profesion">Profesión</label>
							<select name="profesion" class="custom-select">
								<?php foreach ($profesion as $work): ?>
									<option value="<?= $pais['id'] ?>"><?= $work['profesion'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="row mt-4">
						<div class="col">
							<label for="about">Agrega una descripción acerca de ti</label>
							<textarea id="about" name="about" placeholder="About you" maxlength="500" class="form-control"><?= $perfil[0]['about'] ?></textarea>	
						</div>
					</div>
					<div class="row mt-4">
						<div class="col">
							<label for="usuario">Usuario</label>
							<input class="form-control" type="text" disabled value="<?= $perfil[0]['usuario'] ?>">
						</div>
						<div class="col">
							<label for="clave">Contraseña</label>
							<input class="form-control" type="password" required name="clave" id="clave" maxlength="10" >
						</div>
						<div class="col">
							<label for="clave2">Repita la contraseña</label>
							<input class="form-control" type="password" required name="clave2" id="clave2" maxlength="10" >
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" name="editar" value="editar" class="btn btn-primary">
				</div>
			</form >
		</div>
	</div>
</div>