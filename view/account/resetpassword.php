<div id="outer">
<div id="sign">
<?php if ($params['status']>0) { ?>
<div class="error"><?=View::$content['status_msg'][$params['status']] ?></div>
<?php } ?>
<h4><?=View::$content['reset_label'] ?></h4>
<form id="forgetpasswd" method="post" action="/reset-password">
<input class="inputbox" tabindex="1" type="password" name="passwd0" placeholder="<?=View::$content['passwd0_label'] ?>" />
<input class="inputbox" tabindex="2" type="password" name="passwd1" placeholder="<?=View::$content['passwd1_label'] ?>" />
<input type="submit" tabindex="3" class="round_6 long_btn"  value="<?=View::$content['submit_label'] ?>" />
<input type="hidden" name="p" value="<?=$params['p'] ?>" />
<input type="hidden" name="token" value="<?=$params['token'] ?>" />
</form>
</div>
</div>