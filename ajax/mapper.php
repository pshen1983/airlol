<?php
// account
register('POST', '/account/signin/email', new SignInEmailController(), new SignInEmailValidator());
register('POST', '/account/signup/email', new SignUpEmailController(), new SignUpEmailValidator());

// trip
register('GET',  '/search/trips',       new SearchTripController());
register('POST', '/trip/:tripid',       new UpdateTripController());
register('POST', '/trip',               new CreateTripController(),   new CreateTripValidator());
register('GET',  '/trip/user/list',     new GetUserTripsController(), new GetUserTripsValidator());
register('GET',  '/trip/:tripid/goods', new GetTripGoodsController(), new GetTripGoodsValidator());

// good
register('GET',  '/search/goods',       new SearchGoodController());
register('POST', '/good/:goodid',       new UpdateGoodController());
register('POST', '/good',               new CreateGoodController(),   new CreateGoodValidator());
register('GET',  '/good/user/list',     new GetUserGoodsController(), new GetUserGoodsValidator());
register('GET',  '/good/:goodid/trips', new GetGoodTripsController(), new GetGoodTripsValidator());

// message
register('GET',  '/message/search',          new SearchMessageController());
register('POST', '/message',                 new CreateMessageController(),        new CreateMessageValidator());
register('GET',  '/message/:tripid/:goodid', new GetTripGoodMessagesCountroller(), new GetTripGoodMessagesValidator());

// user
register('POST', '/user/rate',	 				 new RateUserController(),     new RateUserValidator());
register('GET',  '/user/tobe/rate',              new GetTobeRatedController(), new GetTobeRatedValidator());
register('GET',  '/user/profile/image/:imageid', new GetUserProfileImageController());

// iterm
register('GET', '/iterm/cities',      new GetCitiesListController(),  new GetCitiesListValidator());
register('GET', '/iterm/city/lookup', new CityNameLookupController(), new CityNameLookupValidator());


/*
// generic
register('GET',  '/index',             new HomePageController());
register('GET',  '/help',              new HelpPageController());
register('GET',  '/about',             new AboutPageController());
register('GET',  '/career',            new CareerPageController());
register('GET',  '/feedback',          new FeedbackPageController());
register('POST', '/feedback',          new FeedbackPageController());
register('GET',  '/terms',             new TermsPageController());
register('GET',  '/contact',           new ContactPageController());
register('GET',  '/carrying-tips',     new CarryingTipsController());
register('GET',  '/receiving',         new ReceivingController());
register('GET',  '/responsible-share', new ResponsibleShareController());
register('GET',  '/sending-tips',      new SendingTipsController());
register('GET',  '/what2send',         new WhatToSendController());
register('GET',  '/why-share',         new WhyShareController());
register('GET',  '/error/:errorid',    new ErrorPageController());

// account
register('GET',  '/login',           new SignInController());
register('POST', '/login',           new SignInController());
register('GET',  '/register',        new SignUpController());
register('POST', '/register',        new SignUpController());
register('GET',  '/logout',          new SignOutController());
register('GET',  '/profile',         new ProfileController());
register('POST', '/profile',         new ProfileController());
register('GET',  '/forget-password', new ForgetPasswordController());
register('POST', '/forget-password', new ForgetPasswordController());
register('GET',  '/reset-password',  new ResetPasswordController());
register('POST', '/reset-password',  new ResetPasswordController());

// trip
register('GET', '/trip/:tripid', new TripDetailController());

// good
register('GET', '/package/:goodid', new GoodDetailController());

// user
register('GET', '/history',      new HistoryController());
register('GET', '/message/list', new MessageListController());
register('GET', '/dashboard',    new DashBoardController());
*/
?>