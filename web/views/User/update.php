<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Update profile</h3>
	</div>
	<div class="panel-body">

		<?php if (null != $error) : ?>
			<div class="alert alert-danger">
				<?php echo $error; ?>
			</div>
		<?php endif; ?>

		<form method="POST" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">Login</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php echo $user->getUsername(); ?></p>
				</div>
			</div>
			
			<div class="form-group">
				<label for="email" class="col-sm-2 control-label">New password</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" name="password" id="password" placeholder="new password">
				</div>
			</div>

			<div class="form-group">
				<label for="email" class="col-sm-2 control-label">E-mail</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" name="email" id="email" placeholder="<?php echo $user->getEmail(); ?>">
				</div>
			</div>

			<div class="form-group">
				<label for="avatar" class="col-sm-2 control-label">Avatar</label>
				<div class="col-sm-10">
					<p class="form-control-static"><img src="<?php echo './web/assets/img/avatars/' . $user->getAvatar(); ?>" class="img-circle" width="140px"></p>
					<input type="file" class="form-control" name="avatar" id="avatar">
				</div>
			</div>

			<input type="submit" value="Save changes" class="btn btn-success btn-lg center-block"/>
		</form>
	</div>
</div>