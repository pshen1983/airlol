<?php
class GoodDetailController extends PageController {

    protected function handle($params) {

        $history = $this->loadMsgHistory($goodId);

        $messageTemplateParams = array(
            'msg_good' => '',
            'msg_trip' => '',
            'msg_to_type' => '',
            'msg_history' =>$history
        );

        View::addJs('good.js');
        View::addCss('good.css');
        View::factory('good/good', array(
            'msg_tmp_params' => $messageTemplateParams
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

    private function loadMsgHistory($goodId) {

    }
}
?>