<div class="jumbotron">
	<div class="row">
		<div class="col-sm-4">
			<form method="POST" action="<?= RUTA_HTTP ?>/?c=Login&a=login" class="login card p-4">
				<span class="text-danger">
					<?php if ( isset($_GET['msgerr']) && $_GET['msgerr'] == "user"): ?>
						Este usuario no se encuentra registrado.
					<?php elseif( isset($_GET['msgerr']) && $_GET['msgerr'] == "clave" ): ?>
						Contraseña Incorrecta.
					<?php endif ?>
				</span>
				<div class="row mt-4">
					<div class="col">
						<label for="user">Usuario</label>
						<input type="text" class="form-control" id="user" name="usuario" autofocus>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col">
						<label for="pass">Contraseña</label>
						<input type="password" class="form-control" id="pass" name="clave">
					</div>
				</div>
				<div class="mt-4">
					<button type="button" class="btn btn-primary p-2 l">registro</button>
					<input type="submit" name="login" value="entrar" class="btn btn-primary p-2 l">
					<button type="button" class="btn btn-primary p-2 l">invitado</button>
				</div>
			</form>
		</div>
		<div class="col">
			<h1>Lorem ipsum dolor sit amet</h1>
			<p class="lead">Lorem ips adipisicing elit. Vel iusto sed iste adipisci debitis, ducimus mollitia, eligendi optio suscipit recusandae nulla placeat nisi deserunt excepturi rem provident incidunt possimus quas.
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut nemo esse mollitia corporis? Facere vitae ipsum, ratione aliquam temporibus deserunt delectus ea ut reprehenderit quibusdam veritatis ipsam possimus aut perspiciatis.</p>
		</div>
	</div>
</div>
<div class="container">
	
	<div class="row mb-4">
		<div class="col">
			<h1 class="text-center">More content</h1>
			<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore deserunt fuga minima tenetur quisquam commodi voluptas distinctio, dolore ad, obcaecati animi. Voluptate autem facere facilis saepe inventore quas aliquid quam?</p>
		</div>
		<div class="col">
			<h1 class="text-center">More content</h1>
			<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore deserunt fuga minima tenetur quisquam commodi voluptas distinctio, dolore ad, obcaecati animi. Voluptate autem facere facilis saepe inventore quas aliquid quam?</p>
		</div>
		<div class="col">
			<h1 class="text-center">More content</h1>
			<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore deserunt fuga minima tenetur quisquam commodi voluptas distinctio, dolore ad, obcaecati animi. Voluptate autem facere facilis saepe inventore quas aliquid quam?</p>
		</div>
	</div>
</div>