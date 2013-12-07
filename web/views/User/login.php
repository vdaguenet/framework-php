<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Login</h3>
  </div>
  <div class="panel-body">

	<?php if (null != $error) : ?>
		<div class="alert alert-danger">
	  		<?php echo $error; ?>
	  	</div>
	<?php endif; ?>

	<form method="POST" class="form-horizontal">
	  <div class="form-group">
	    <label for="username" class="col-sm-2 control-label">Login</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="username" id="username" placeholder="Login">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="password" class="col-sm-2 control-label">Password</label>
	    <div class="col-sm-10">
	      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
	    </div>
	  </div>

      <input type="submit" value="Login" class="btn btn-success btn-lg center-block"/>
      <center>
      	<br />
      	or <a href="?/User/register">Register</a>.
      </center>
	</form>
  </div>
</div>