<?php
class ProfileController extends PageController {
    protected function handle($params) {

        View::addJs('account.js');
        View::addJs('jquery.imgareaselect.js');
        View::addCss('account.css');
        View::addCss('imgareaselect-default.css');

        $uid = ASession::getSessionUserId();
        $userDao = new UserDao($uid);
        if ($userDao->isFromDB()) {
            $paramArr = $userDao->toArray(array('password'));

            global $profile_image_folder;
            $paramArr['profile_img'] = $profile_image_folder.'/'.$paramArr['profile_img'];

            if (isset($paramArr['birth_day'])) {
                $time = strtotime($paramArr['birth_day']);
                $paramArr['birth_year'] = date('Y', $time);
                $paramArr['birth_month'] = date('m', $time);
            }
            unset($paramArr['birth_day']);

        } else {
            $this->redirect('/error/500');
        }

        View::factory('account/profile', $paramArr);
    }

    protected function getTitle() {
        switch ($this->getLocale()) {
            case 'zh-cn':
                return "";
            case 'zh-tw':
                return "";
            default:
                return "AirLoL | Profile";
        }
    }

    protected function getContent() {
        $rv = array();

        switch ($this->getLocale()) {
            case 'zh-cn':
                $rv = array(
                    'edit' => '编辑个人信息',
                    'email' => '电子邮件',
                    'name' => '姓名',
                    'passwd' => '密码',
                    'bdate' => '生日',
                    'phone' => '电话号码',
                    'wechat' => '微信用户名',
                    'whatsapp' => 'Whatsapp 号码',
                    'prelang' => '常用语言',
                    'precurr' => '常用货币',
                    'live' => '常住地',
                    'live_desc' => '常住城市（如：上海、洛杉矶）',
                    'describe' => '自我介绍',
                    'month' => array(   1 => '1月',
                                        2 => '2月',
                                        3 => '3月',
                                        4 => '4月',
                                        5 => '5月',
                                        6 => '6月',
                                        7 => '7月',
                                        8 => '8月',
                                        9 => '9月',
                                        10 => '10月',
                                        11 => '11月',
                                        12 => '12月'));
                break;
            case 'zh-tw':
                $rv = array(
                    'edit' => '編輯個人信息',
                    'email' => '電子郵件',
                    'name' => '姓名',
                    'passwd' => '密碼',
                    'bdate' => '生日',
                    'phone' => '電話號碼',
                    'wechat' => '微信用戶名',
                    'whatsapp' => 'Whatsapp 號碼',
                    'prelang' => '常用語言',
                    'precurr' => '常用貨幣',
                    'live' => '常住地',
                    'live_desc' => '常住城市（如：上海、洛杉磯）',
                    'describe' => '自我介紹',
                    'month' => array(   1 => '1月',
                                        2 => '2月',
                                        3 => '3月',
                                        4 => '4月',
                                        5 => '5月',
                                        6 => '6月',
                                        7 => '7月',
                                        8 => '8月',
                                        9 => '9月',
                                        10 => '10月',
                                        11 => '11月',
                                        12 => '12月'));
                break;
            default:
                $rv = array(
                    'edit' => 'Edit Profile',
                    'email' => 'Email',
                    'name' => 'Name',
                    'passwd' => 'Password',
                    'bdate' => 'Birth Date',
                    'phone' => 'Phone',
                    'wechat' => 'Wechat',
                    'whatsapp' => 'Whatsapp',
                    'prelang' => 'Preferred Language',
                    'precurr' => 'Preferred Currency',
                    'live' => 'Where do you live',
                    'live_desc' => 'Living City (e.g. Shanghai, Los Angeles)',
                    'describe' => 'Describe Yourself',
                    'month' => array(   1 => 'January',
                                        2 => 'February',
                                        3 => 'March',
                                        4 => 'April',
                                        5 => 'May',
                                        6 => 'June',
                                        7 => 'July',
                                        8 => 'August',
                                        9 => 'September',
                                        10 => 'October',
                                        11 => 'November',
                                        12 => 'December'));

        }

        return $rv;
    }

    protected function isAuthenticatedPage() { return true; }
}
?>