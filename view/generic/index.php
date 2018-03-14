<div style="width:90%;margin: 0 auto;">
	<div class="oval_btns">
		<button id="package_btn" class="oval_option" style="background-color: #ffca59;"><label class="oval_text">I have a package</label></button>
		<button id="travelling_btn" class="oval_option"><label class="oval_text">I am travelling</label></button>
	</div>
	<div class="oval_selects">
		<div id="oval_top"><label></label></div>
		<div id="package_div" class="oval_content" style="display:block">
		Package
		<?php View::addTemplate('trip_search', $params['airports']); ?>
		<br>
		<?php View::addTemplate('good_search', $params['airports']); ?>
		</div>
		<div id="travelling_div" class="oval_content">
		Travelling
		<?php View::addTemplate('trip_search', $params['airports']); ?>
		<br>
		<?php View::addTemplate('good_search', $params['airports']); ?>
		</div>
	</div>
</div>