 <?php
 class MessageListController extends PageController {

    protected function handle($params) {

        $messageList = array();

        View::setTitle('AirLOL Message');
        View::addJs('generic.js');
        View::addJs('message.js');
        View::addCss('generic.css');
        View::addCss('message.css');
        View::factory('message/list', array(
            'msg_list' => $messageList
        ));
    }
 }
 ?>