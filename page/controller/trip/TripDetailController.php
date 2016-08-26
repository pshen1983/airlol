<?php
class TripDetailController extends PageController {

    protected function handle($params) {

        $tripDao = new TripDao($params['tripid']);
        $locale = $this->getCmsLocale();

        View::setTitle('AirLoL Home Page');
        View::addJs('trip.js');
        View::addCss('trip.css');

        if (isset($tripDao)) {
            $userDao = new UserDao($tripDao->getUserId());
            $from = CmsItemDao::getCodeContent($tripDao->getDepartureCode(), $locale);
            $to = CmsItemDao::getCodeContent($tripDao->getArrivalCode(), $locale);
            $tripArr = $tripDao->toArray(array('departure_code', 'arrival_code'));
            $tripArr['user_name'] = $userDao->getName();
            $tripArr['from'] = $from;
            $tripArr['to'] = $to;
        } else {
            // Trip NOT Found
        }

        View::factory('trip/trip', array('trip'=>$tripArr));
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