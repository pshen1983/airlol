<?=$params['status'] ?> Reset Password:
<form id="forgetpasswd" method="post" action="/reset-password">
New Password: <input id="email" type="password" name="passwd0" />
Re-Enter Passwd: <input id="email" type="password" name="passwd1" />
<input type="hidden" name="p" value="<?=$params['p'] ?>" />
<input type="hidden" name="token" value="<?=$params['token'] ?>" />
<input type="submit" value="<?=$params['submit'] ?>" />
</form>