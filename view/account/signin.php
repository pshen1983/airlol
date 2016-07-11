<?=$params['status'] ?> login:
<form id="signin" method="post" action="/login">
<?=View::$content['email_label'] ?> <input id="email" name="email" />
<?=View::$content['passwd_label'] ?> <input type="password" id="password" name="password" />
<input type="checkbox" id="remember" name="remember" value="remember" /> <?=View::$content['remember_me'] ?>
<input type="submit" value="<?=View::$content['submit_btn'] ?>" />
</form>