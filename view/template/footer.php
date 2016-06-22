<footer class="container-fluid">
<div id="footer" >
<div id="footer-mail">
</div>
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