 <?php
 class HelpPageController extends PageController {

    protected function handle($params) {

        $helps = array();

        View::setTitle('AirLOL Help');
        View::addJs('generic.js');
        View::addJs('help.js');
        View::addCss('generic.css');
        View::addCss('help.css');
        View::factory('help/index', array(
            'helps' => $helps
        ));
    }
 }
 ?>