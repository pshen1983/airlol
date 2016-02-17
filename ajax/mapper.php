<?php
// user
register('POST', '/user/signin', new UserSigninController());
register('POST', '/user/signup', new UserSignupController());

// trip
register('GET',  '/search/trips', new SearchTripController());
register('POST', '/trip',         new CreateTripController());

// good
register('GET',  '/search/packages', new SearchGoodController());
register('POST', '/package',         new CreateGoodController());
?>