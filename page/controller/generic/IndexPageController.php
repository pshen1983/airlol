<?php
class IndexPageController extends PageController {

    protected function handle($params) {

        $locale = $this->getCmsLocale();
        $airports = CmsRelationDao::getTypeContents(CmsRelationDao::$AIRPORT, $locale);

        View::addJs('generic.js');
        View::addCss('generic.css');

        View::factory('generic/index', array('airports' => $airports));
    }

    protected function getTitle() {
        switch ($this->getLocale()) {
            case 'zh-cn':
                return "";
            case 'zh-tw':
                return "";
            default:
                return "CairyMe Home Page";
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