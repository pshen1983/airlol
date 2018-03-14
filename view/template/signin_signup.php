<div id="signin_signup">
<ul>
<li><a href="#signin_div"><?=View::$content['signin'] ?></a></li>
<li><a href="#signup_div"><?=View::$content['signup'] ?></a></li>
</ul>
<div id="signin_div">
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
<div id="signup_div">
<?php if ($params['status']>0) { ?>
<div class="error"><?=View::$content['status_msg'][$params['status']] ?></div>
<?php } ?>
<h4><?=View::$content['regi_label'] ?></h4>
<form id="signup" method="post" action="/register">
<input class="inputbox" tabindex="1" name="name" placeholder="<?=View::$content['name_label'] ?>" />
<input class="inputbox" tabindex="2" name="email" placeholder="<?=View::$content['email_label'] ?>" />
<input class="inputbox" tabindex="3" name="password" placeholder="<?=View::$content['passwd_label'] ?>" type="password" />
<input class="inputbox" tabindex="4" name="password2" placeholder="<?=View::$content['passwd2_label'] ?>" type="password" />
<div id="bottom_div">
<input tabindex="5" name="agree" value="agree" type="checkbox" checked/> <?=View::$content['agree_label'] ?><a target="_blank" href="/terms"><?=View::$content['terms_link'] ?></a>
<input class="round_6 short_btn" tabindex="6" type="submit" value="<?=View::$content['submit_btn'] ?>" />
</div>
<div id="forget_div"><?=View::$content['has_label'] ?><a tabindex="7" href="/login"><?=View::$content['signin_link'] ?></a></div>
</form>
</div>
</div>