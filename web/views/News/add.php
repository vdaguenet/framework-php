<h2>Write a news</h2>

<?php if (null != $msg) : ?>
	<div class="alert alert-success">
		<?php echo $msg; ?>
	</div>
<?php endif; ?>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Write a news</h3>
	</div>
	<div class="panel-body">
		<form method="POST" class="form-horizontal">
			<div class="form-group">
				<label for="title" class="col-sm-2 control-label">Title</label>
				<div class="col-sm-10">
					<input type="text" name="title" class="form-control" placeholder="Title" />
				</div>
			</div>
			<div class="form-group">
				<label for="content" class="col-sm-2 control-label">Content</label>
				<div class="col-sm-10">
					<textarea name="content" class="form-control" placeholder="Content"></textarea>
				</div>
			</div>

			<input type="submit" value="Send" class="btn btn-success btn-lg center-block"/>
		</form>
	</div>
</div>