<div id="outer">
<div id="sign">
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