</div>
<footer class="container-fluid">
<div id="footer" class="width">
<div id="footer-main" class="row row-condensed">
<div class="col-md-4 col-md-offset-1 col-height">
<h2 class="footer_label"><?=View::$content['lable_footer_language'] ?></h2>
<ul>
<li><?php if (View::$params['current_locale']!='en-us') { ?><a href="" id="lang_us">English</a> <?php } else { ?>English<?php } ?></li>
<li><?php if (View::$params['current_locale']!='zh-cn') { ?><a href="" id="lang_cn">中文（简体）</a> <?php } else { ?>中文（简体）<?php } ?></li>
<li><?php if (View::$params['current_locale']!='zh-tw') { ?><a href="" id="lang_tw">中文（繁体）</a> <?php } else { ?>中文（繁体）<?php } ?></li>
</ul>
</div>
<div class="col-md-2 hide-sm">
<h2 class=""><?=View::$content['lable_footer_company'] ?></h2>
<ul>
<li><a href="/about"><?=View::$content['a_footer_about'] ?></a></li>
<li><a href="/career"><?=View::$content['a_footer_career'] ?></a></li>
<li><a href="/feedback"><?=View::$content['a_footer_feedback'] ?></a></li>
<li><a href="/contact"><?=View::$content['a_footer_contact'] ?></a></li>
<li><a href="/terms"><?=View::$content['a_footer_terms'] ?></a></li>
</ul>
</div>
<div class="col-md-2 hide-sm">
<h2 class=""><?=View::$content['label_footer_traveller'] ?></h2>
<ul>
<li><a href="/why-share"><?=View::$content['a_footer_whyshare'] ?></a></li>
<li><a href="/carrying-tips"><?=View::$content['a_footer_carrying'] ?></a></li>
<li><a href="/responsible-share"><?=View::$content['a_footer_responsible'] ?></a></li>
<li><a href="/"><?=View::$content['a_footer_add'] ?></a></li>
</ul>
</div>
<div class="col-md-2 hide-sm">
<h2 class=""><?=View::$content['label_footer_sender'] ?></h2>
<ul>
<li><a href="/what2send"><?=View::$content['a_footer_what2send'] ?></a></li>
<li><a href="/sending-tips"><?=View::$content['a_footer_sending'] ?></a></li>
<li><a href="/receiving"><?=View::$content['a_footer_receiving'] ?></a></li>
<li><a href="/"><?=View::$content['a_footer_quicksearch'] ?></a></li>
</ul>
</div>
</div>
<hr class="hide-sm">
<div id="footer-bottom">
<div style="margin-bottom:20px;">&copy; <?=date('Y')?>, CairyMe Inc. All rights reserved.</div>
</div>
</div>
</footer>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="/page/js/common.js"></script>
<?php foreach (View::$javascripts as $js) { ?>
<script src="<?=$js ?>"></script>
<?php } ?>
</body>
</html>