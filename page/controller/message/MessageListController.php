 <?php
 class MessageListController extends PageController {

    protected function handle($params) {

        $messageList = array();

        View::addJs('message.js');
        View::addCss('message.css');
        View::factory('message/list', array(
            'msg_list' => $messageList
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