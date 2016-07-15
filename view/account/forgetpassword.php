<div id="outer">
<?php if (isset($params['status'])) { ?>
<?=$params['status'] ?>
<?php } ?>
<?=View::$content['title_label'] ?>
<form id="forgetpasswd" method="post" action="/forget-password">
email: <input id="email" name="email" />
<div id="captcha_div"><img class="captcha" src="<?=$params['captcha'] ?>"/><input class="captcha_input" name="captcha" />
<input type="submit" value="<?=View::$content['submit'] ?>" />
</div>
</form>
</div>