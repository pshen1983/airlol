<?=$params['status'] ?> 
<div id="outer">
<div id="sign">
<h4><?=View::$content['login_label'] ?></h4>
<form id="signin" method="post" action="/login">
<input class="inputbox" name="email" placeholder="<?=View::$content['email_label'] ?>" />
<input class="inputbox" name="password" placeholder="<?=View::$content['passwd_label'] ?>" type="password" />
<div id="bottom_div">
<input id="remember" name="remember" value="remember" type="checkbox" /> <?=View::$content['remember_me'] ?>
<input class="round_6 short_btn" type="submit" value="<?=View::$content['submit_btn'] ?>" />
</div>
<div id="forget_div"><a href="/forget-password"><?=View::$content['forget_link'] ?></a> | <a href="/register"><?=View::$content['signup_link'] ?></a></div>
</form>
</div>
</div>