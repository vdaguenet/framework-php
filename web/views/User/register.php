<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Register</h3>
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
      <div class="form-group">
        <label for="email" class="col-sm-2 control-label">E-mail</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" id="email" placeholder="email@example.com">
        </div>
      </div>
      
      <div class="form-group">
        <label for="gender" class="col-sm-2 control-label">Gender</label>
        <div class="col-sm-10">
          <select id="gender" name="gender" class="form-control">
            <option>Pick it</option>
            <option value="M">Homme</option>
            <option value="F">Femme</option>
            <option value="NA">NA</option>
          </select>
        </div>
      </div>
      
      <input type="submit" value="Register" class="btn btn-success btn-lg center-block"/>
    </form>
  </div>
</div>

