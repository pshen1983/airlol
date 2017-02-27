<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=View::$title ?></title>
<link rel="shortcut icon" href="/page/img/favicon.png">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/page/css/common.css">
<link rel="stylesheet" type="text/css" href="/page/css/template.css">
<link rel='stylesheet' type='text/css' href='/page/css/google-poppins.css'>
<?php foreach (View::$stylesheets as $css) { ?>
<link rel="stylesheet" type="text/css" href="<?=$css ?>">
<?php } ?>
</head>
<body>
<header class="theme">
<div id="logo">
<a href="/"><img src="/page/img/logo-icon.png" /><h1>airlol</h1></a>
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
        <a class="menu" href="/logout"><?=View::$content['a_header_signout'] ?></a>
    </div>
<?php } else { ?>
    <a id="singin" class="head" href="/login"><?=View::$content['btn_header_signin'] ?></a>
    <a id="singup" class="head" href="/register"><?=View::$content['btn_header_signup'] ?></a>
<?php } ?>
</div>
</header>
<div id="body" class="width">