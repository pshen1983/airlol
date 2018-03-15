<?php $localId= $params['id']; unset($params['id']); ?>
<div id="<?=$localId ?>" class="cities">
<?php foreach ($params as $area) { ?>
<div class="dropdown_area">
<label><?=$area['description'] ?></label>
<ul class="dropdown">
    <?php foreach ($area as $key=>$airport) { if ($key!='description') { ?>
    <li class="<?=$localId ?>_li" id="<?=$key ?>"><?=$airport ?></li>
    <?php } } ?>
</ul>
</div>
<?php } ?>
</div>