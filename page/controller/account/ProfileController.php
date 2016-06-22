<?php
class ProfileController extends PageController {
    protected function handle($params) {


        View::addJs('account.js');
        View::addCss('account.css');

        View::factory('account/profile');
    }
}
?>