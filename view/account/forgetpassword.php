<div id="outer">
<div id="sign">
<?php if (isset($params['status'])) { ?>
<?=$params['status'] ?>
<?php } ?>
<h4><?=View::$content['title_label'] ?></h4>
<form id="forgetpasswd" method="post" action="/forget-password">
<input class="inputbox" id="email" name="email" placeholder="<?=View::$content['email_label'] ?>" />
<div id="bottom_div">
<div id="captcha_div"><img class="captcha" src="<?=$params['captcha'] ?>"/><input class="captcha_input" name="captcha" /> <span id="no_robot"><?=View::$content['value_label'] ?></span></div>
<input class="round_6 long_btn" type="submit" value="<?=View::$content['submit'] ?>" />
</div>
<div id="forget_div"><?=View::$content['has_label'] ?><a href="/login"><?=View::$content['signin_link'] ?></a></div>
</form>
</div>
</div>