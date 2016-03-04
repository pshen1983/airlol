<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=View::$title ?></title>
<link rel="shortcut icon" href="/page/img/favicon.ico">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/page/css/common.css">
<?php foreach (View::$stylesheets as $css) { ?>
<link rel="stylesheet" type="text/css" href="<?=$css ?>">
<?php } ?>
</head>
<body>
<header>
<?php if (View::$parameters['user_session']) { ?>
    <?=View::$parameters['header_user_name'] ?>
<?php } else { ?>
    <a id="header_signin_link" href="#"><?=View::$parameters['btn_header_signin'] ?></a>
    <a id="header_signup_link" href="#"><?=View::$parameters['btn_header_signup'] ?></a>
<?php } ?>
</header>
<?php if (!View::$parameters['user_session']) { ?>
<div id="header_login">
<form id="header_login_form">
email: <input id="email" name="email" />
passwd: <input type="password" id="password" name="password" />
<button id="header_signin" type="button"><?=View::$parameters['btn_signin_submit'] ?></button>
</form>
</div>
<?php } ?>