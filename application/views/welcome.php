
<h1 id="logo">Pencil Notes</h1>

<p>
This is Pencil Notes. It keeps your notes.
That's about it.
</p>

<h2>Login</h2>

<form method="post" class="form-horizontal">
  <input type="hidden" name="login" value="1" />
  <div class="control-group">
    <label class="control-label" for="inputUser">Username</label>
    <div class="controls">
      <input type="text" name="user" id="inputUser" placeholder="">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
      <input type="password" name="pass" id="inputPassword" placeholder="">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <label class="checkbox">
        <input checked="checked" name="remember" type="checkbox"> Remember me
      </label>
      <button type="submit" class="btn">Enter</button>
    </div>
  </div>
</form>

<h2>Sign Up</h2>

<? if ($errors) {?>
	<div class="alert alert-error">
		<ul>
		<? foreach ($errors as $error) {?>
			<li><?=$error?></li>
		<?}?>
		</ul>
	</div>
<?}?>
<form method="post" class="form-horizontal">
  <input type="hidden" name="signup" value="1" />
  <div class="control-group">
	<label class="control-label" for="inputUsername">Username</label>
	<div class="controls">
	  <input type="text" name="username" id="inputUsername" placeholder="">
	</div>
  </div>
  <div class="control-group">
	<label class="control-label" for="inputEmail">Email</label>
	<div class="controls">
	  <input type="text" name="email" id="inputEmail" placeholder="">
	</div>
  </div>
  <div class="control-group">
	<label class="control-label" for="inputPassword">Password</label>
	<div class="controls">
	  <input type="password" name="password" id="inputPassword" placeholder="">
	</div>
  </div>
  <div class="control-group">
	<label class="control-label" for="inputPasswordConfirm">Confirm Password</label>
	<div class="controls">
	  <input type="password" name="password_confirm" id="inputPasswordConfirm" placeholder="">
	</div>
  </div>
  <div class="control-group">
	<div class="controls">
	  <button type="submit" class="btn">Sign up</button>
	</div>
  </div>
</form>
