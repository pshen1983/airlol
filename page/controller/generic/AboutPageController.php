 <?php
 class AboutPageController extends PageController {

    protected function handle($params) {

        $helps = array();

        View::addJs('generic.js');
        View::addCss('generic.css');
        View::factory('generic/about', array(
            'helps' => $helps
        ));
    }

    protected function getTitle() {
        switch ($this->getLocale()) {
            case 'zh-cn':
                return "";
            case 'zh-tw':
                return "";
            default:
                return "AirLoL | About";
        }
    }

    protected function getContent() {
        $rv = array();

        switch ($this->getLocale()) {
            case 'zh-cn':
                $rv = array();
                break;
            case 'zh-tw':
                $rv = array();
                break;
            default:
                $rv = array();

        }

        return $rv;
    }
 }
 ?>