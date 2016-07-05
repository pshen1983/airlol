<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=View::$title ?></title>
<link rel="shortcut icon" href="/page/img/favicon.png">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/page/css/common.css">
<link rel='stylesheet' type='text/css' href='/page/css/google-poppins.css'>
<?php foreach (View::$stylesheets as $css) { ?>
<link rel="stylesheet" type="text/css" href="<?=$css ?>">
<?php } ?>
</head>
<body>
<header class="theme">
<div id="logo">
<a href="/"><img style="width: 35px;vertical-align: text-bottom;margin-right:2px;" src="/page/img/logo-icon.png" />
<span style="font-size:24px;font-weight:bold;color:#ffa64d;font-family:'Poppins',sans-serif;">airlol</span></a>
</div>
<div>
</div>
<div id="right">
<?php if (View::$params['user_session']) { ?>
    <a id="history_a" class="head" href="/history"><?=View::$content['btn_header_history'] ?></a>
    <a id="message_a" class="head" href="/message/list"><?=View::$content['btn_header_message'] ?></a>
    <a id="profile_a" class="head"><?=View::$params['header_user_name'] ?><img id="pic" src="<?=View::$params['header_user_pic'] ?>"/></a>
    <div id="profile_div" class="dropdown">
        <a class="menu" href="/profile">Edit Profile</a>
        <a class="menu" href="">Account Settings</a>
        <a class="menu" href="">My Guidebook</a>
        <a class="menu" href="/logout">Sign Out</a>
    </div>
<?php } else { ?>
    <a id="singin" class="head" type="button" class="hbtn" data-toggle="modal" data-target="#header_login"><?=View::$content['btn_header_signin'] ?></a>
    <a id="singup" class="head" type="button" class="hbtn" data-toggle="modal" data-target="#header_login"><?=View::$content['btn_header_signup'] ?></a>
<?php } ?>
</div>
</header>
<?php if (!View::$params['user_session']) { ?>
<div class="modal fade" role="dialog" id="header_login">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?=View::$content['btn_header_signin'] ?></h4>
            </div>
            <div class="modal-body">
                <form id="header_login_form">
                email: <input id="email" name="email" />
                passwd: <input type="password" id="password" name="password" />
                <button id="header_signin" type="button"><?=View::$content['btn_signin_submit'] ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<div id="body" class="width">