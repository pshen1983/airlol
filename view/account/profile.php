<div id="profile_left">

</div>
<form id="signin" method="post" action="/profile">
<div class="table">
<div class="table-title"><h4><?=View::$content['edit'] ?></h4></div>
<div class="row">
<div class="cell text-right"><?=View::$content['email'] ?></div><div class="cell text-left"><?=$params['email'] ?></div>
</div>
<div class="row">
<div class="cell text-right"><?=View::$content['name'] ?></div><div class="cell"><input name="user[name]" value="<?=$params['name'] ?>" /></div>
</div>
<div class="row">
<div class="cell text-right"><?=View::$content['passwd'] ?></div><div class="cell text-left"><a href="" >Send Reset Password Email</a></div>
</div>
<div class="row">
<div class="cell text-right"><?=View::$content['bdate'] ?></div>
<div class="cell">
<select name="user[month]">
<option value=""></option>
<?php for ($ii=1; $ii<=12; $ii++) { ?>
<option value="<?=$ii ?>"><?=View::$content['month'][$ii] ?></option>
<?php } ?>
</select>
<select name="user[year]">
<option value=""></option>
<?php for ($ii=1950; $ii<=2010; $ii++) { ?>
<option value="<?=$ii ?>"><?=$ii ?></option>
<?php } ?>
</select>
</div>
</div>
<div class="row">
<div class="cell text-right"><?=View::$content['phone'] ?></div><div class="cell"><input name="user[tel]" value="<?=$params['tel'] ?>" /></div>
</div>
<div class="row">
<div class="cell text-right"><?=View::$content['wechat'] ?></div><div class="cell"><input name="user[wechat]" value="<?=$params['wechat'] ?>" /></div>
</div>
<div class="row">
<div class="cell text-right"><?=View::$content['prelang'] ?></div><div class="cell"><select name="user[language]">
    <option value=""></option>
    <option value="en-us">English</option>
    <option value="zh-cn">中文（简体）</option>
    <option value="zh-tw">中文（繁体）</option>
</select></div>
</div>
<div class="row">
<div class="cell text-right"><?=View::$content['precurr'] ?></div><div class="cell"><select name="user[currency]">
    <option value=""></option>
    <option value="RMB">RMB (¥)</option>
    <option value="USD">USD ($)</option>
    <option value="CAD">CAD（$)</option>
    <option value="AUD">AUD ($)</option>
    <option value="GBP">GBP（£)</option>
    <option value="EUR">EUR（€)</option>
    <option value="JPY">JPY (¥)</option>
</select></div>
</div>
<!-- div class="row">
<div class="cell text-right">Preferred Timezone</div><div class="cell"><select name="user[timezone]"></select></div>
</div -->
<div class="row">
<div class="cell text-right"><?=View::$content['live'] ?></div><div class="cell"><input name="user[city]" value="<?=$params['living_city'] ?>" placeholder="<?=View::$content['live_desc'] ?>"/></div>
</div>
<div class="row">
<div class="cell text-right"><?=View::$content['describe'] ?></div><div class="cell"><textarea name="user[description]"><?=$params['self_description'] ?></textarea></div>
</div>
<div class="row">
<div class="cell"></div><div class="cell text-right"><div style="width:400px;"><input id="sub_btn" type="submit" value="Submit"></div></div>
</div>
</div>
</form>