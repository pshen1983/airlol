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
<div>
</div>
<div id="right">
<?php if (View::$params['user_session']) { ?>
    <a id="history_a" class="head" href="/history"><?=View::$content['btn_header_history'] ?></a>
    <a id="message_a" class="head" href="/message/list"><?=View::$content['btn_header_message'] ?></a>
    <a id="profile_a" class="head"><?=View::$params['header_user_name'] ?><img id="pic" src="<?=View::$params['header_user_pic'] ?>"/></a>
    <div id="profile_div" class="dropdown">
        <a class="menu" href="/profile"><?=View::$content['a_header_profile'] ?></a>
        <a class="menu" href=""><?=View::$content['a_header_setting'] ?></a>
        <a class="menu" href=""><?=View::$content['a_header_guildbook'] ?></a>
        <a id="logout" class="menu"><?=View::$content['a_header_signout'] ?></a>
    </div>
<?php } else { ?>
    <a id="singinup" class="head"><?=View::$content['btn_header_signinup'] ?></a>
    <div id="mask" class="mask">
        <div id="signin_signup" class="animate">
        <div class="tab">
            <button class="tablinks active" onclick="openCity(event, 'signin_div')">Login</button>
            <button class="tablinks" onclick="openCity(event, 'signup_div')">Sign Up</button>
        </div>
        <div class="error"></div>
        <div id="signin_div" class="tabcontent" style="display: block;">
            <input class="inputbox" tabindex="1" id="l_email" placeholder="Email" />
            <input class="inputbox" tabindex="2" id="l_passwd" placeholder="Password" type="password" />
            <div id="bottom_div">
            <input tabindex="3" id="l_remember" value="remember" type="checkbox" checked /> Remember me
            <button id="sub_login" class="round_6 short_btn">Submit</button>
            </div>
            <div id="forget_div"><a tabindex="5" href="/forget-password">Forget Password</a></div>
        </div>
        <div id="signup_div" class="tabcontent">
            <input class="inputbox" tabindex="1" id="s_name" placeholder="Name" />
            <input class="inputbox" tabindex="1" id="s_email" placeholder="Email" />
            <input class="inputbox" tabindex="3" id="s_passwd" placeholder="Password" type="password" />
            <input class="inputbox" tabindex="4" id="s_passwd1" placeholder="Confirm Password" type="password" />
            <div id="bottom_div">
            <input tabindex="5" id="s_agree" value="agree" type="checkbox" checked/> I agree <a target="_blank" href="/terms">Terms and Privacy</a>
            <button id="sub_signup" class="round_6 short_btn">Submit</button>
            </div>
        </div>
        <div id="forget_div" class="tabcontent">
            <input class="inputbox" tabindex="1" id="f_email" placeholder="Email" />
            <button id="sub_forget" class="round_6 short_btn">Submit</button>
        </div>
        </div>
    </div>
<?php } ?>
</div>
</header>
<div id="body" class="width">