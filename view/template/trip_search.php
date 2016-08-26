<div>
<form id="trip_form">
From: <select name="departure">
<?php foreach ($params as $area) { ?>
<option>--</option>
<option disabled><?=$area['description'] ?></option>
    <?php foreach ($area as $key=>$airport) { if ($key!='description') { ?>
    <option><?=$airport ?></option>
    <?php } } ?>
<?php } ?>
</select>
To: <select name="arrival">
<?php foreach ($params as $area) { ?>
<option>--</option>
<option disabled><?=$area['description'] ?></option>
    <?php foreach ($area as $key=>$airport) { if ($key!='description') { ?>
    <option><?=$airport ?></option>
    <?php } } ?>
<?php } ?>
</select>
Date: <input name="date" />
<input id="trip_next" type="button" value="Next" />
</form>
</div>