<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=View::$title ?></title>
<link rel="shortcut icon" href="/page/img/favicon.png">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/page/css/common.css">
<?php foreach (View::$stylesheets as $css) { ?>
<link rel="stylesheet" type="text/css" href="<?=$css ?>">
<?php } ?>
</head>
<body>
<header class="container-fluid theme">
<div id="header" class="width">
<div id="logo">
<a href="/"><img src="/page/img/logo.png" /></a>
</div>
<div>
</div>
<div id="right">
<?php if (View::$params['user_session']) { ?>
    <button type="button" class="btn" data-toggle="modal" data-target="#header_login"><?=View::$content['btn_header_message'] ?></button>
    <?=View::$params['header_user_name'] ?>
<?php } else { ?>
    <button id="singin" type="button" class="hbtn" data-toggle="modal" data-target="#header_login"><?=View::$content['btn_header_signin'] ?></button>
    <button id="singup" type="button" class="hbtn" data-toggle="modal" data-target="#header_login"><?=View::$content['btn_header_signup'] ?></button>
<?php } ?>
</div>
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