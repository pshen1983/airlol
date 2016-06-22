<?php
register('GET',  '/index',           new HomePageController());

// user
register('GET',  '/login',           new SignInController());
register('GET',  '/register',        new SignUpController());
register('GET',  '/logout',          new SignOutController());
register('GET',  '/profile',         new ProfileController());
register('GET',  '/forget_password', new ForgetPasswordController());
register('GET',  '/reset_password',  new ResetPasswordController());
register('POST', '/login',           new SignInController());
register('POST', '/register',        new SignUpController());
register('POST', '/profile',         new ProfileController());
register('POST', '/forget_password', new ForgetPasswordController());
register('POST', '/reset_password',  new ResetPasswordController());

// trip
register('GET', '/trip/:tripid', new TripDetailController());

// good
register('GET', '/package/:goodid', new GoodDetailController());

// message
register('GET', '/message/list', new MessageListController());

// help
register('GET', '/help', new HelpPageController());
?>