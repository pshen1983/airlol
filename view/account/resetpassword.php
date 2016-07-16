<?=$params['status'] ?>
<div id="outer">
<div id="sign">
<h4><?=View::$content['reset_label'] ?></h4>
<form id="forgetpasswd" method="post" action="/reset-password">
<input class="inputbox" id="email" type="password" name="passwd0" placeholder="<?=View::$content['passwd0_label'] ?>" />
<input class="inputbox" id="email" type="password" name="passwd1" placeholder="<?=View::$content['passwd1_label'] ?>" />
<input type="submit" class="round_6 long_btn"  value="<?=View::$content['submit_label'] ?>" />
<input type="hidden" name="p" value="<?=$params['p'] ?>" />
<input type="hidden" name="token" value="<?=$params['token'] ?>" />
</form>
</div>
</div>