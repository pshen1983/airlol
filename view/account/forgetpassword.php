<div id="outer">
<div id="sign">
<?php if ($params['status']===0) { ?>
<div class="message"><?=View::$content['status_msg'][$params['status']] ?></div>
<?php } else if ($params['status']>0) { ?>
<div class="error"><?=View::$content['status_msg'][$params['status']] ?></div>
<?php } ?>
<h4><?=View::$content['title_label'] ?></h4>
<form id="forgetpasswd" method="post" action="/forget-password">
<input class="inputbox" tabindex="1" name="email" placeholder="<?=View::$content['email_label'] ?>" />
<div id="bottom_div">
<div id="captcha_div"><img class="captcha" src="<?=$params['captcha'] ?>"/><input class="captcha_input" tabindex="2" name="captcha" /> <span id="no_robot"><?=View::$content['value_label'] ?></span></div>
<input class="round_6 long_btn" tabindex="3" type="submit" value="<?=View::$content['submit'] ?>" />
</div>
<div id="forget_div"><?=View::$content['has_label'] ?><a tabindex="4" href="/login"><?=View::$content['signin_link'] ?></a></div>
</form>
</div>
</div>