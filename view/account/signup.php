<?=$params['status'] ?> register:
<form id="signup" method="post" action="/register">
email: <input id="email" name="email" />
passwd: <input type="password" id="password" name="password" />
name: <input id="name" name="name" />
<input type="checkbox" id="remember" name="remember" value="remember" /> remember me
<input type="submit" value="<?=$params['submit'] ?>" />
</form>