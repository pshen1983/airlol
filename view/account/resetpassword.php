<?=$params['status'] ?>
<div id="outer">
<div id="sign">
<h4>Reset Password</h4>
<form id="forgetpasswd" method="post" action="/reset-password">
<input class="inputbox" id="email" type="password" name="passwd0" placeholder="New Password" />
<input class="inputbox" id="email" type="password" name="passwd1" placeholder="Re-Enter Passwd" />
<input type="submit" class="round_6 long_btn"  value="<?=$params['submit'] ?>" />
<input type="hidden" name="p" value="<?=$params['p'] ?>" />
<input type="hidden" name="token" value="<?=$params['token'] ?>" />
</form>
</div>
</div>