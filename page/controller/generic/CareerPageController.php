 <?php
 class CareerPageController extends PageController {

    protected function handle($params) {

        $helps = array();

        View::setTitle('AirLOL Help');
        View::addJs('generic.js');
        View::addCss('generic.css');
        View::factory('generic/career', array(
            'helps' => $helps
        ));
    }
 }
 ?>