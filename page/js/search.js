var m_names = new Array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");

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

	if (space==='whole') {
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
				let object = null;
				if (type === 'package') {
					object = item.good;
				} else if (type === 'trip') {
					object = item.trip;
				}

	        	let result = '<div class="search_result">';
				result += '<img class="profile_img" src="/user/'+item.user.id+'/profile/image" />';
				result += '<div class="user_info">';
				result += '<button id="" class="contact_user" data-user="'+item.user.id+'" data-id="'+object.id+'">Contact User</button>';
				result += '<span class="user_name">'+item.user.name+' </span>';

				let rating = item.user.rating.value/2;
				for (let ii=0; ii<5; ii++) {
					if (rating>=1) {
						result += '<span class="fa fa-star checked"></span>';
					} else if (rating>=0.5) {
						result += '<span class="fa fa-star-half-o checked"></span>';
					} else {
						result += '<span class="fa fa-star unchecked"></span>';
					}
					rating--;
				}

				result += '<span class="rate_count"> ('+item.user.rating.total+')</span>';
				result += '<br>';

				let joinDate = new Date(item.user.join_time);
				result += '<span class="join_date">Joined: '+m_names[joinDate.getMonth()]+' '+joinDate.getFullYear()+'</span>';
				result += '</div>';
				result += '<div class="search_info">';
				result += '<table class="search_table">';
				result += '<tr>';
				result += '<td class="header desc">Description</td>';
				result += '<td class="header">Size</td>';
				result += '<td class="header">Weight</td>';
				result += '<td class="header">Date</td>';
				result += '</tr>';
				result += '<tr>';
				result += '<td class="desc">'+object.description+'</td>';

				let size = 'Part of Check-in bag';
				if (object.whole_bag) {
					size = 'Whole Check-in bag';
				}
				result += '<td>'+size+'</td>';
				result += '<td>'+object.weight+' '+object.weight_unit+'</td>';

				let date = new Date(object.date);
				result += '<td>'+m_names[date.getMonth()]+' '+date.getDate()+', '+date.getFullYear()+'</td>';
				result += '</tr>';
				result += '</table>';
				result += '</div>';
				result += '</div>';
	        	$("#search_list").append(result);
	        });
	    }
    });
}