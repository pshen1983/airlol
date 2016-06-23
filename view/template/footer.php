<footer class="container-fluid">
<div id="footer" >
<div id="footer-main" class="row row-condensed">
<div class="col-md-3 col-height">
<h2 class="">Language</h2>
<ul>
<li>English</li>
<li>中文（简体）</li>
<li>中文（繁体）</li>
</ul>
</div>
<div class="col-md-3 hide-sm">
<h2 class="">Company</h2>
<ul>
<li>About</li>
<li>Career</li>
<li>Feedback</li>
<li>Contact</li>
<li>Terms & Privacy</li>
</ul>
</div>
<div class="col-md-3 hide-sm">
<h2 class="">Traveller</h2>
<ul>
<li>About</li>
<li>Career</li>
<li>Feedback</li>
<li>Contact</li>
<li>Terms & Privacy</li>
</ul>
</div>
<div class="col-md-3 hide-sm">
<h2 class="">Sender</h2>
<ul>
<li>About</li>
<li>Career</li>
<li>Feedback</li>
<li>Contact</li>
<li>Terms & Privacy</li>
</ul>
</div>
</div>
<hr class="hide-sm">
<div id="footer-bottom">
&copy; <?=date('Y')?>, AirLOL Inc. All rights reserved.
</div>
</div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="/page/js/common.js"></script>
<?php foreach (View::$javascripts as $js) { ?>
<script src="<?=$js ?>"></script>
<?php } ?>
</body>
</html>