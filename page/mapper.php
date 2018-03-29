<?php
// generic
register('GET', '/index', new IndexPageController());

// good
register('POST', '/package/search', new SearchGoodController());
register('GET',  '/packages', new MyGoodsController());

// trip
register('POST', '/trip/search', new SearchTripController());
register('GET',  '/trips', new MyTripsController());

// user
register('GET', '/user/:userid/profile/image', new GetUserProfileImageController());
?>