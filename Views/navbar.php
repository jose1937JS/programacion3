<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<a class="navbar-brand" href="#">Bienvenido <span class="font-italic font-weight-bold"><?= $_GET['user'] ?></span></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item active">
				<a class="nav-link" href="<?= RUTA_HTTP ?>/?c=Inicio&user=<?= $_GET['user'] ?>"><i class="fa fa-home"></i> Inicio <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= RUTA_HTTP ?>/?c=Inicio&a=perfil&user=<?= $_GET['user'] ?>"><i class="fa fa-user"></i> Perfil</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-cogs"></i> Opciones
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="<?= RUTA_HTTP ?>/?c=Inicio&a=misPublicaciones&user=<?= $_GET['user'] ?>"><i class="fa fa-comments"></i>&nbsp; Mis publicaciones</a>
					<div class="dropdown-divider"></div>
					<form action="<?= RUTA_HTTP ?>/?c=Login&a=logout" method="post">
						<input type="hidden" name="sesion" value="<?= $_GET['user'] ?>">
						<button type="submit" class="dropdown-item btn-link" href="#"><i class="fa fa-sign-out"></i>&nbsp; Cerrar Sesión</button>
					</form>
				</div>
			</li>
		</ul>
	</div>
</nav>