<?=$params['status'] ?> register:
<form id="signup" method="post" action="/register">
<?=View::$content['email_label'] ?> <input id="email" name="email" />
<?=View::$content['passwd_label'] ?> <input type="password" id="password" name="password" />
<?=View::$content['name_label'] ?> <input id="name" name="name" />
<input type="checkbox" id="remember" name="remember" value="remember" /> <?=View::$content['remember_me'] ?>
<input type="submit" value="<?=View::$content['submit_btn'] ?>" />
</form>