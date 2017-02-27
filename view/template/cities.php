<div class="cities">
<select name="departure">
<?php foreach ($params as $area) { ?>
<option>--</option>
<option disabled><?=$area['description'] ?></option>
    <?php foreach ($area as $key=>$airport) { if ($key!='description') { ?>
    <option value="<?=$key ?>"><?=$airport ?></option>
    <?php } } ?>
<?php } ?>
</select>
</div>