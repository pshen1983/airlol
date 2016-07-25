<div id="profile_left">

</div>
<form id="signin" method="post" action="/profile">
<div class="table">
<div class="table-title"><h4>Edit Profile</h4></div>
<div class="row">
<div class="cell text-right">Email</div><div class="cell"><?=$params['email'] ?></div>
</div>
<div class="row">
<div class="cell text-right">Name</div><div class="cell"><input name="user[name]" value="<?=$params['name'] ?>" /></div>
</div>
<div class="row">
<div class="cell text-right">Password</div><div class="cell"><a href="" >reset password email</a></div>
</div>
<div class="row">
<div class="cell text-right">Birth Date</div><div class="cell"><select name="user[month]"></select> <input style="width:60px;padding:10px;" name="user[year]" value="" /></div>
</div>
<div class="row">
<div class="cell text-right">Phone</div><div class="cell"><input name="user[tel]" value="<?=$params['tel'] ?>" /></div>
</div>
<div class="row">
<div class="cell text-right">Wechat</div><div class="cell"><input name="user[wechat]" value="<?=$params['wechat'] ?>" /></div>
</div>
<div class="row">
<div class="cell text-right">Preferred Language</div><div class="cell"><select name="user[language]">
    <option value="en-us">English</option>
    <option value="zh-cn">中文（简体）</option>
    <option value="zh-tw">中文（繁体）</option>
</select></div>
</div>
<div class="row">
<div class="cell text-right">Preferred Currency</div><div class="cell"><select name="user[currency]">
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
<div class="cell text-right">Where do you live</div><div class="cell"><input name="user[city]" value="<?=$params['living_city'] ?>" /></div>
</div>
<div class="row">
<div class="cell text-right">Describe Yourself</div><div class="cell"><textarea name="user[description]"><?=$params['self_description'] ?></textarea></div>
</div>
</div>
</form>