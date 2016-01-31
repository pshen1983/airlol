<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?=View::$title ?></title>
<script src="/page/js/commom.js"></script>
<?php foreach (View::$javascripts as $js) { ?>
<script src="<?=$js ?>"></script>
<?php } ?>
<link rel="stylesheet" type="text/css" href="/page/css/commom.css">
<?php foreach (View::$stylesheets as $css) { ?>
<link rel="stylesheet" type="text/css" href="<?=$css ?>">
<?php } ?>
</head>
<body>
<div>
</div>