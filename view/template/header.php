<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=View::$title ?></title>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="shortcut icon" href="/page/img/favicon.png">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/page/css/common.css">
<link rel="stylesheet" type="text/css" href="/page/css/template.css">
<link rel='stylesheet' type='text/css' href='/page/css/google-poppins.css'>
<?php foreach (View::$stylesheets as $css) { ?>
<link rel="stylesheet" type="text/css" href="<?=$css ?>">
<?php } ?>
</head>
<body>
<header class="width">
<div id="logo">
<a href="/"><img style="width: 144px;height: 28px;object-fit: contain;" src="/page/img/cairyme-logo.png" /></a>
</div>
<?php if (View::$params['user_session']) { ?>
<div id="right">
    <a id="profile_a" class="head"><img id="pic" src="<?=View::$params['header_user_pic'] ?>"/></a>
    <div id="profile_div" class="dropdown">
        <a class="menu" href="/profile"><?=View::$content['a_header_profile'] ?></a>
        <a class="menu" href=""><?=View::$content['a_header_setting'] ?></a>
        <a class="menu" href=""><?=View::$content['a_header_guildbook'] ?></a>
        <a id="logout" class="menu"><?=View::$content['a_header_signout'] ?></a>
    </div>
    <a id="message_a" class="head" href="/trips">My Trips</a>
    <a id="message_a" class="head" href="/packages">My Packages</a>
    <a id="history_a" class="head" href="/">Search</a>
</div>
<?php } else { ?>
<div id="right">
    <a id="singinup" class="head"><?=View::$content['btn_header_signinup'] ?></a>
</div>
<div id="mask" class="mask">
    <div id="signin_signup" class="animate">
        <img id="clost_btn" src=/page/img/close_btn.png />
        <div id="error"></div>
        <div id="signin_div" class="signtable">
        <div class="signrow"><h4>Log in to Continue!</h4></div>
        <div class="signrow"><label>Not a member yet?</label> <a id="signup_a">Sign up here</a></div>
        <div class="space"></div>
        <div class="signrow"><input class="inputbox" tabindex="1" id="l_email" placeholder="Email" /></div>
        <div class="signrow"><input class="inputbox" tabindex="2" id="l_passwd" placeholder="Password" type="password" /></div>
        <div class="signrow"><input tabindex="3" id="l_remember" type="checkbox" style="position:relative;top:8px;" checked /> Remember me</div>
        <div class="space"></div>
        <div class="signrow"><button id="sub_login" class="round_6 short_btn">Submit</button><a tabindex="5" href="/forget-password">Forget Password</a></div>
        </div>
        <div id="signup_div" class="signtable" style="display:none;">
        <div class="signrow"><h4>Sign up to Continue!</h4></div>
        <div class="signrow"><label>Already have an account?</label><a id="signin_a">Log in here</a></div>
        <div class="signrow"><input class="inputbox" tabindex="1" id="s_name" placeholder="Name" /></div>
        <div class="signrow"><input class="inputbox" tabindex="2" id="s_email" placeholder="Email" /></div>
        <div class="signrow"><input class="inputbox" tabindex="3" id="s_passwd" placeholder="Password" type="password" /></div>
        <div class="signrow"><input class="inputbox" tabindex="4" id="s_passwd1" placeholder="Confirm Password" type="password" /></div>
        <div class="signrow"><input tabindex="5" id="s_agree" type="checkbox" style="position:relative;top:8px;" /> I agree to the<a target="_blank" href="/terms">Terms and Privacy</a></div>
        <div class="space"></div>
        <div class="signrow"><button id="sub_signup" class="round_6 short_btn">Submit</button></div>
        </div>
    </div>
    </div>
</div>
<?php } ?>
</header>
<div id="body" class="width">