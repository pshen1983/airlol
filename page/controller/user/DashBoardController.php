 <?php
 class DashBoardController extends PageController {

    protected function handle($params) {

        $dashboard = array();

        View::addJs('user.js');
        View::addCss('user.css');
        View::factory('user/dashboard', array(
            'dashboard' => $dashboard
        ));
    }

    protected function getTitle() {
        switch ($this->getLocale()) {
            case 'zh-cn':
                return "";
            case 'zh-tw':
                return "";
            default:
                return "";
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