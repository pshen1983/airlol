<footer class="container-fluid">
<div id="footer" >
<div id="footer-main" class="row row-condensed">
<div class="col-md-3 col-height">
<h2 class="">Language</h2>
<ul>
<li><?php if (View::$parameters['current_locale']!='en-us') { ?><a href="" id="lang_us">English</a> <?php } else { ?>English<?php } ?></li>
<li><?php if (View::$parameters['current_locale']!='zh-cn') { ?><a href="" id="lang_cn">中文（简体）</a> <?php } else { ?>中文（简体）<?php } ?></li>
<li><?php if (View::$parameters['current_locale']!='zh-tw') { ?><a href="" id="lang_tw">中文（繁体）</a> <?php } else { ?>中文（繁体）<?php } ?></li>
</ul>
</div>
<div class="col-md-3 hide-sm">
<h2 class="">Company</h2>
<ul>
<li><a href="/about">About</a></li>
<li><a href="/career">Career</a></li>
<li><a href="/feedback">Feedback</a></li>
<li><a href="/contact">Contact</a></li>
<li><a href="/terms">Terms & Privacy</a></li>
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