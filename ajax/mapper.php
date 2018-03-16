<?php
// account
register('POST', '/account/signin/email', new SignInEmailController(), new SignInEmailValidator());
register('POST', '/account/signup/email', new SignUpEmailController(), new SignUpEmailValidator());
register('POST', '/account/signout',      new SignOutController());
register('POST', '/account/email/passwd', new ChangeEmailPasswordController(), new ChangeEmailPasswordValidator());
register('POST', '/account/email/forget', new ForgetPasswordController(), new ForgetPasswordValidator());


// trip
register('GET',  '/search/trips',       new SearchTripController());
register('POST', '/trip/:tripid',       new UpdateTripController(),   new UpdateTripValidator());
register('POST', '/trip',               new CreateTripController(),   new CreateTripValidator());
register('GET',  '/trip/user/list',     new GetUserTripsController(), new GetUserTripsValidator());
register('GET',  '/trip/:tripid/goods', new GetTripGoodsController(), new GetTripGoodsValidator());

// good
register('GET',  '/search/goods',       new SearchGoodController());
register('POST', '/good/:goodid',       new UpdateGoodController(),   new UpdateGoodValidator());
register('POST', '/good',               new CreateGoodController(),   new CreateGoodValidator());
register('GET',  '/good/user/list',     new GetUserGoodsController(), new GetUserGoodsValidator());
register('GET',  '/good/:goodid/trips', new GetGoodTripsController(), new GetGoodTripsValidator());

// message
register('POST', '/message',                 new CreateMessageController(),        new CreateMessageValidator());
register('GET',  '/message/:tripid/:goodid', new GetTripGoodMessagesCountroller(), new GetTripGoodMessagesValidator());

// user
register('GET',  '/user/tobe/rate',             new GetTobeRatedController(),        new GetTobeRatedValidator());
register('GET',  '/user/profile',               new GetSessionUserController(),      new GetSessionUserValidator());
register('GET',  '/user/:userid/profile',       new GetUserProfileController(),      new GetUserProfileValidator());
register('POST', '/user/profile/image',         new UpdateUserImageController());
register('POST', '/user/profile',               new UpdateUserProfileController(),   new UpdateUserProfileValidator());
register('POST', '/user/rate',	 			  	new RateUserController(),            new RateUserValidator());

// iterm
register('GET', '/iterm/cities',      new GetCitiesListController(),  new GetCitiesListValidator());
register('GET', '/iterm/city/lookup', new CityNameLookupController(), new CityNameLookupValidator());
?>