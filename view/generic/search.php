<div style="width:90%;margin: 0 auto;">
	<div class="oval_btns">
		<div class="oval_option" style="<?=$params['btn1style'] ?>;cursor:default;"><label class="oval_text" style="cursor:default;">I have a package</div></button>
		<div class="oval_option" style="<?=$params['btn2style'] ?>;cursor:default;"><label class="oval_text" style="cursor:default;">I am travelling</label></div>
	</div>
	<div class="oval_selects">
		<div id="oval_top" style="<?=$params['labelstyle'] ?>;width:430px;margin-left:330px;text-align:center;">
			<?=$params['labeltext'] ?>
		</div>
		<div style="<?=$params['divstyle'] ?>;display:block;" class="oval_content">
			<div id="search_head">
				<span><?=$params['depart'] ?> <strong>&rarr;</strong> <?=$params['arrive'] ?></span>
				<strong>&#x7c;</strong>
				<span><?=$params['date'] ?></span>
				<strong>&#x7c;</strong>
				<span><?=$params['space'] ?><?=$params['weight'] ?></span>
				<a href="/" class="edit">Edit Search</a>
			</div>
			<div id="search_results">
				<div id="search_count"><?=$params['count'].$params['counttext'] ?></div>
				<input id="count_value" type="hidden" value="<?=$params['count'] ?>" />
				<?php if ($params['count']==0) { ?>
				<div id="zero_div">
					<span>
						<?=$params['zerotext'] ?><br>
						<?php if ($params['signedin']) { ?>
							<a>Create your Package <a> now.
						<?php } else { ?>
							<a>Login / Sign up</a> to create your <?=$params['type'] ?>.
						<?php } ?>
					</span>
				</div>
				<?php } else { ?>
				<div id="search_list">
					<img id="loading_img" src="/page/img/loading.gif" />
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>