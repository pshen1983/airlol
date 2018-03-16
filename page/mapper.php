<?php
// generic
register('GET', '/index', new IndexPageController());

// good
register('GET', '/packages', new MyGoodsController());

// trip
register('GET', '/trips', new MyTripsController());

// user
register('GET', '/user/:userid/profile/image', new GetUserProfileImageController());
?>