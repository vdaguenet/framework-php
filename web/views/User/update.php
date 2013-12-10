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

		<div class="well">
			<p>Votre e-mail actuel : <?php echo $user->getEmail(); ?></p>
		</div>

		<form method="POST" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group">
				<label for="email" class="col-sm-2 control-label">E-mail</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" name="email" id="email" placeholder="example@mail.com">
				</div>
			</div>

			<input type="submit" value="Save changes" class="btn btn-success btn-lg center-block"/>
		</form>
	</div>
</div>