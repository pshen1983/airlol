<div style="width:90%;margin: 0 auto;">
	<div class="oval_btns">
		<div id="package_btn" class="oval_option" style="background-color: #ffca59;"><label class="oval_text">I have a package</div></button>
		<div id="travelling_btn" class="oval_option"><label class="oval_text">I am travelling</label></div>
	</div>
	<div class="oval_selects">
		<div id="oval_top"><label></label></div>
		<div id="package_div" class="oval_content" style="display:block">
		<form id="p_search_f">
		<div class="div_t">
		<div class="div_t_row">
			<div class="div_t_cell">
				<label>Package’s current location</label>
			</div>
			<div class="div_t_cell">
				<label>Package destination</label>
			</div>
			<div class="div_t_cell">
				<label>Send by date</label>
			</div>
		</div>
		<div class="div_t_row">
			<div class="div_t_cell">
				<label id="depart_input" class="droplist">(e.g. Beijing)</label>
				<input id="depart_value" type="hidden" />
				<?php $params['airports']['id']='depart'; View::addTemplate('cities', $params['airports']); ?>
			</div>
			<div class="div_t_cell">
				<label id="arrive_input" class="droplist">(e.g. New York)</label>
				<input id="arrive_value" type="hidden" />
				<?php $params['airports']['id']='arrive'; View::addTemplate('cities', $params['airports']); ?>
			</div>
			<div class="div_t_cell">
				<input id="package_date" type="text" />
			</div>
		</div>
		</div>

		<div class="div_t">
		<div class="div_t_row">
			<div class="div_t_cell">
				<label>Space available</label>
			</div>
			<div class="div_t_cell">
				<label>Weight</label>
			</div>
			<div class="div_t_cell">
				<label>Minimum Cairing Fee</label>
			</div>
		</div>
		<div class="div_t_row">
			<div class="div_t_cell">
				<select>
					<option>Whole Check-in Luggage</option>
					<option>Partial Luggage</option>
				</select>
			</div>
			<div class="div_t_cell">
				<input id="package_weight" />
				<select>
					<option>lb</option>
					<option>kg</option>
				</select>
			</div>
			<div class="div_t_cell">
				<input id="package_fee" />
				<select>
					<option>Cash</option>
					<option>Other</option>
				</select>
			</div>
		</div>
		</div>

		<div class="div_t">
		<div class="div_t_row">
			<div class="div_t_cell">
				<button type="submit" form="p_search_f">Find Cairiers for package</button>
			</div>
		</div>
		</div>

		</form>
		</div>

		<div id="travelling_div" class="oval_content">
		Travelling
		<?php View::addTemplate('trip_search', $params['airports']); ?>
		<br>
		<?php View::addTemplate('good_search', $params['airports']); ?>
		</div>
	</div>
</div>