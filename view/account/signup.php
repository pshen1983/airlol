<?=$params['status'] ?>
<div id="outer">
<div id="sign">
<h4><?=View::$content['regi_label'] ?></h4>
<form id="signup" method="post" action="/register">
<input class="inputbox" name="name" placeholder="<?=View::$content['name_label'] ?>" />
<input class="inputbox" name="email" placeholder="<?=View::$content['email_label'] ?>" />
<input class="inputbox" name="password" placeholder="<?=View::$content['passwd_label'] ?>" type="password" />
<input class="inputbox" name="password2" placeholder="<?=View::$content['passwd2_label'] ?>" type="password" />
<div id="bottom_div">
<input id="remember" name="remember" value="remember" type="checkbox" /> <?=View::$content['agree_label'] ?><a target="_blank" href="/terms"><?=View::$content['terms_link'] ?></a>
<input class="round_6 short_btn" type="submit" value="<?=View::$content['submit_btn'] ?>" />
</div>
<div id="forget_div"><?=View::$content['has_label'] ?><a href="/login"><?=View::$content['signin_link'] ?></a></div>
</form>
</div>
</div>