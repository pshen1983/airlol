<?=$params['status'] ?> login:
<form id="signin" method="post" action="/login">
email: <input id="email" name="email" />
passwd: <input type="password" id="password" name="password" />
<input type="checkbox" id="remember" name="remember" value="remember" /> remember me
<input type="submit" value="<?=$params['submit'] ?>" />
</form>