<div>
<form id="trip_form">
From: 
<?php View::addTemplate('cities', $params); ?>
To: 
<?php View::addTemplate('cities', $params); ?>
Date: <input name="date" />
<input id="trip_next" type="button" value="Next" />
</form>
</div>