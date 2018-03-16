<div style="width:90%;margin: 0 auto;">
	<div class="oval_btns">
		<div id="package_btn" class="oval_option" style="background-color: #ffca59;"><label class="oval_text">I have a package</div></button>
		<div id="travelling_btn" class="oval_option"><label class="oval_text">I am travelling</label></div>
	</div>
	<div class="oval_selects">
		<div id="oval_top"><label></label></div>
		<div id="package_div" class="oval_content" style="display:block">
		<form id="p_search_f">

		<table>
		<tr class="elem_p">
			<td class="div_t_cell">
				<label id="label_f">Package’s current location</label>
			</td>
			<td class="div_t_cell">
				<label id="label_t">Package destination</label>
			</td>
			<td class="div_t_cell">
				<label id="label_d">Send by date</label>
			</td>
		</tr>
		<tr class="elem_t">
			<td class="div_t_cell">
				<label id="label_f">Flying From</label>
			</td>
			<td class="div_t_cell">
				<label id="label_t">Flying To</label>
			</td>
			<td class="div_t_cell">
				<label id="label_d">Arrival Date</label>
			</td>
		</tr>
		<tr>
			<td class="div_t_cell">
				<label id="depart_input" class="droplist">(e.g. Beijing)</label>
				<input id="depart_value" type="hidden" />
				<?php $params['airports']['id']='depart'; View::addTemplate('cities', $params['airports']); ?>
			</td>
			<td class="div_t_cell">
				<label id="arrive_input" class="droplist">(e.g. New York)</label>
				<input id="arrive_value" type="hidden" />
				<?php $params['airports']['id']='arrive'; View::addTemplate('cities', $params['airports']); ?>
			</td>
			<td class="div_t_cell">
				<input id="package_date" type="text" />
			</td>
		</tr>
		</table>

		<table>
		<tr>
			<td>
				<label>Space available</label>
			</td>
			<td class="elem_p">
				<label>Weight</label>
			</td>
			<td>
				<label>Minimum Cairing Fee</label>
			</td>
		</tr>
		<tr>
			<td>
				<select>
					<option>Whole Check-in Luggage</option>
					<option>Partial Luggage</option>
				</select>
			</td>
			<td class="elem_p">
				<input id="package_weight" />
				<select>
					<option>lb</option>
					<option>kg</option>
				</select>
			</td>
			<td>
				<input id="package_fee" />
				<select>
					<option>Cash</option>
					<option>Other</option>
				</select>
			</td>
		</tr>
		</table>

		<table>
		<tr>
			<td>
				<button class="oval_submit" type="submit" form="p_search_f">
					<span class="elem_p">Find Cairiers for package</span>
					<span class="elem_t">Find packages to carry</span>
				</button>
			</td>
		</tr>
		</table>

		</form>
		</div>
	</div>
</div>