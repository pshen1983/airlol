<?php
register('GET',  '/index',           new HomePageController());
register('GET',  '/login',           new SignInController());
register('GET',  '/register',        new SignUpController());
register('GET',  '/logout',          new SignOutController());
register('GET',  '/profile',         new ProfileController());
register('GET',  '/forget_password', new ForgetPasswordController());
register('GET',  '/reset_password',  new ResetPasswordController());

// Post
register('POST', '/register',        new SignUpController());
?>