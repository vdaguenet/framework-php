<h2>News</h2>

<?php if (null != $msg) : ?>
	<div class="alert alert-success">
  		<?php echo $msg; ?>
  	</div>
<?php endif; ?>

<?php foreach ($newsList as $news) : ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">
				<span class="badge">#<?php echo $news->getId(); ?></span> <?php echo $news->getTitle(); ?> <small>by <?php echo $news->getAuthor(); ?></small>
			</h3>
		</div>
		<form method="POST">
			<input type="hidden" name="id" value="<?php echo $news->getId(); ?>">
			<div class="panel-body">
				<p><?php echo $news->getContent(); ?></p>	
			</div>
			<?php
				if(isset($_SESSION['current_user']) && $_SESSION['current_user'] === $news->getAuthor()) {
			?>
					<input type="submit" class="btn btn-link" value="Delete" />
			<?php
				}
			?>
			
		</form>
	</div>

<?php endforeach; ?>

<a href="?/News/add" class="btn btn-primary">Write a news</a>