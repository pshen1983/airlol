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

        View::setTitle('AirLOL Home Page');
        View::addJs('generic.js');
        View::addCss('generic.css');
        View::factory('generic/index', array(
            'msg_tmp_params' => $messageTemplateParams
        ));
    }

    private function loadMsgHistory($goodId) {

    }
}
?>