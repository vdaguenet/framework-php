<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Profile informations</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" role="form">
			<div class="form-group">
				<label class="col-sm-2 control-label">Login</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php echo $user->getUsername(); ?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php echo $user->getEmail(); ?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Avatar</label>
				<div class="col-sm-10">
					<p class="form-control-static"><img src="<?php echo __DIR__ . '/web/assets/img/avatars/' . $user->getAvatar(); ?>" class="img-circle"></p>
				</div>
			</div>
		</form>
	</div>
	<div class="panel-footer">
		<a href="?/User/disconnect">Disconnect</a> - <a href="?/User/update">Update profile</a>
	</div>
</div>


