<?php
// user
register('POST', '/user/signin', new UserSigninController());

// trip
register('GET',  '/search/trips', new SearchTripController());
register('POST', '/trip/:tripid', new UpdateTripController());
register('POST', '/trip',         new CreateTripController());

// good
register('GET',  '/search/packages', new SearchGoodController());
register('POST', '/package/:goodid', new UpdateGoodController());
register('POST', '/package',         new CreateGoodController());

// message
register('POST', '/message/email', new SendEmailController());
?>