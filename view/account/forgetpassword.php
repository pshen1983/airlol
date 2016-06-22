<?=$params['status'] ?> Forget Password:
<form id="forgetpasswd" method="post" action="/forget_password">
email: <input id="email" name="email" />
<input type="submit" value="<?=$params['submit'] ?>" />
</form>