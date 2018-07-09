<div class="mt-4 px-3">
	<div class="row">
		<div class="col-sm-3">
			<div class="card">
				<div class="card-content">
					<div class="card-body">
						<p class="font-weight-bold text-center">ZONA PUBLICITARIA</p>
						<img src="<?= RUTA_HTTP ?>/Views/Assets/13_336x280TC_2017_2_2.jpg" class="img-fluid">
					</div>
				</div>
			</div>
			<div class="card mt-3">
				<div class="card-content">
					<div class="card-body">
						<img class="img-fluid" src="<?= RUTA_HTTP ?>/Views/Assets/default-61d46db14d39694d91754b9505f2617fbe16b98fbed6d0330972e07a4094e13f.jpg" alt="">
					</div>
				</div>
			</div>
			<div class="card my-3">
				<div class="card-content">
					<div class="card-body">
						<b>Deep Web, a la venta las mejores blancas al precio mas bajo del mercado :v</b><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi quibusdam dolore deleniti officiis atque natus deserunt laborum itaque suscipit maiores architecto voluptate vel voluptatum eum ex eaque, nobis, ipsum doloribus.
					</div>
				</div>
			</div>
		</div>
		<div class="col">

			<?php if ( isset($_GET['a']) && $_GET['a'] == "misPublicaciones" ): ?>
				<h2 class="mb-4"> Mis Publicaciones</h2>
			<?php endif ?>

			<?php foreach ($pubs as $key => $v): ?>
	
				<div class="card mb-4">				
					<div class="card-content">
						<div class="card-body">
							<h4 class="card-title"><?= $v['Titulo'] ?></h4>
							
							<?php if( isset($v['Imagen']) ): ?>
								<div class="d-flex justify-content-center">
									<img src="<?= RUTA_HTTP ?>/uploads/<?= $v['Imagen'] ?>" class="img-fluid" >
								</div>
							<?php endif ?>
							
							<p class="mt-3"><?= $v['Cuerpo'] ?></p>
							
							<div class="d-flex justify-content-between mt-3 font-weight-bold">
								<span>Por <?= $v['nombre'].' '.$v['apellido'] ?> el <?= $v['Fecha'] ?></span>
							</div>
						</div>
					</div>
				</div>

			<?php endforeach ?>
		</div>
	</div>
</div>

<button class="btn btn-primary floating" data-toggle="modal" data-target="#pub" title="¿Qué estás pensando?"><span class="fa fa-plus"></span></button>

<!-- MODALS -->

<div class="modal fade" id="pub">
	<div class="modal-dialog modal-lg">
		<div class="modal-content p-3">

			<form action="<?= RUTA_HTTP ?>/?c=Inicio&a=publicar&user=<?= $_GET['user'] ?>" enctype="multipart/form-data" method="post">
				<div class="modal-body">
					<h4>Crear nueva publicación</h4>
					<hr>
					<br>
					<div class="row">
						<div class="col">
							<input type="text" placeholder="Titulo" class="form-control" name="titulo" required>
						</div>
						<div class="col">
							<label for="img">Subir imagen (opcional)</label>
							<input type="file" class="form-control-file" name="img" accept="image/*">
						</div>
					</div>
					<div class="row mt-3">
						<div class="col">
							<textarea class="form-control" placeholder="¿Qué estás pensando?" name="cuerpo" required></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" value="Publicar" class="btn btn-primary p-2">
				</div>
			</form>

		</div>
	</div>
</div>