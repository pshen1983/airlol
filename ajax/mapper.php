<?php
// account
register('POST', '/account/signin/email', new SignInEmailController(), new SignInEmailValidator());
register('POST', '/account/signup/email', new SignUpEmailController(), new SignUpEmailValidator());

// trip
register('GET',  '/search/trips', new SearchTripController());
register('POST', '/trip/:tripid', new UpdateTripController());
register('POST', '/trip',         new CreateTripController(), new CreateTripValidator());

// good
register('GET',  '/search/goods', new SearchGoodController());
register('POST', '/good/:goodid', new UpdateGoodController());
register('POST', '/good',         new CreateGoodController(), new CreateGoodValidator());

// message
register('GET',  '/search/message', new SearchMessageController());
register('POST', '/message',        new CreateMessageController(), new CreateMessageValidator());

// user
register('POST', '/user/rating', new RateUserController(), new RateUserValidator());

// iterm
register('GET', '/iterm/cities', new GetCitiesListController(), new GetCitiesListValidator());


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