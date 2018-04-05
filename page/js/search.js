$(function() {
	let count = $("#count_value").val();

	if (count>0) {
		getSearchPage(1);
	}
});

function getSearchPage(page) {
	let type = getParam('type');
	let depart = getParam('depart');
	let arrive = getParam('arrive');
	let date = getParam('date');
	let space = getParam('space');
	let weight = getParam('weight');
	let fee = getParam('fee');

	let obj = {};
	obj['departure'] = depart;
	obj['arrival'] = arrive;
	obj['before'] = date;
	obj['page'] = page;

	if (weight==='whole') {
		obj['whole_bag'] = 'Y';
	} else if (weight==='part') {
		obj['whole_bag'] = 'N';
	}

	let url = '';
	if (type === 'package') {
		url = '/ajax/search/goods';
	} else if (type === 'trip') {
		url = '/ajax/search/trips';
	}

	$.get(url, obj, function(data) {
        let res = jQuery.parseJSON(data);

        if (res.result==-1) {

        } else {
        	$("#loading_img").hide();
	        $.each(res, function(key, item) {
	        	let result = '<div class="search_result">';

	        	result += '</div>'
	        	$("#search_list").append(result);
	        });
	    }
    });
}