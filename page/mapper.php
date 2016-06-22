<?php
// generic
register('GET',  '/index',    new HomePageController());
register('GET',  '/help',     new HelpPageController());
register('GET',  '/about',    new AboutPageController());
register('GET',  '/career',   new CareerPageController());
register('GET',  '/feedback', new FeedbackPageController());
register('POST', '/feedback', new FeedbackPageController());
register('GET',  '/terms',    new TermsPageController());
register('GET',  '/contact',  new ContactPageController());

// account
register('GET',  '/login',           new SignInController());
register('POST', '/login',           new SignInController());
register('GET',  '/register',        new SignUpController());
register('POST', '/register',        new SignUpController());
register('GET',  '/logout',          new SignOutController());
register('GET',  '/profile',         new ProfileController());
register('POST', '/profile',         new ProfileController());
register('GET',  '/forget_password', new ForgetPasswordController());
register('POST', '/forget_password', new ForgetPasswordController());
register('GET',  '/reset_password',  new ResetPasswordController());
register('POST', '/reset_password',  new ResetPasswordController());

// trip
register('GET', '/trip/:tripid', new TripDetailController());

// good
register('GET', '/package/:goodid', new GoodDetailController());

// message
register('GET', '/message/list', new MessageListController());

?>