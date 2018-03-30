$(function() {
	getSearchPage(1);
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
        
    });
}