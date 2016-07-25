<div id="sign">
<?php if ($params['status']>0) { ?>
<div class="error"><?=View::$content['status_msg'][$params['status']] ?></div>
<?php } ?>
<h4><?=View::$content['login_label'] ?></h4>
<form id="signin" method="post" action="/login">
<input class="inputbox" tabindex="1" name="email" placeholder="<?=View::$content['email_label'] ?>" value="<?=(isset($params['email']) ? $params['email'] : '') ?>"/>
<input class="inputbox" tabindex="2" name="password" placeholder="<?=View::$content['passwd_label'] ?>" type="password" <?=(isset($params['email']) ? 'autofocus' : '') ?>/>
<?php if ($params['redirect_uri']) { ?>
<input type="hidden" name="redirect_uri" value="<?=$params['redirect_uri'] ?>" />
<?php } ?>
<div id="bottom_div">
<input id="remember" tabindex="3" name="remember" value="remember" type="checkbox" checked /> <?=View::$content['remember_me'] ?>
<input class="round_6 short_btn" tabindex="4" type="submit" value="<?=View::$content['submit_btn'] ?>" />
</div>
<div id="forget_div"><a tabindex="5" href="/forget-password"><?=View::$content['forget_link'] ?></a> | <a tabindex="6" href="/register"><?=View::$content['signup_link'] ?></a></div>
</form>
</div>