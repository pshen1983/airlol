<?=$params['status'] ?> sign up:
<form id="signup" method="post" action="/register">
<input id="email" name="email" />
<input type="password" id="password" name="password" />
<input id="name" name="name" />
<input type="submit" value="<?=$params['submit'] ?>" />
</form>