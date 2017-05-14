<?php
class SearchGoodController extends AjaxController {

    protected function handle($params) {
        $status = 0;
        $message = '';

        $goods = array();

        if (!empty($_GET['departure']) && !empty($_GET['arrival']) && !empty($_GET['page']) && Format::isValidMySQLDate($_GET['date'], true) ) {

            $departure = $_GET['departure'];
            $arrival = $_GET['arrival'];
            global $page_size;
            $start = $page_size*($_GET['page']-1);
            $date = $_GET['date'];

            if (isset($_GET['whole_bag']) && $_GET['whole_bag']=='Y') {
                $goodDaos = GoodDao::findGoodByLocationAndDayAndBag($departure, $arrival, $date, $start, $page_size);
            } else {
                $goodDaos = GoodDao::findGoodByLocationAndDay($departure, $arrival, $date, $start, $page_size);
            }

            if (!empty($goodDaos)) {
                $userIds = array();
                foreach ($goodDaos as $goodDao) {
                    $good = array();

                    $good['id'] = $goodDao->getId();
                    $good['weight'] = $goodDao->getWeight();
                    $good['weight_unit'] = $goodDao->getWeightUnit();
                    $good['items'] = $goodDao->getDescription();
                    $good['value'] = $goodDao->getDisplayValue();
                    $good['before'] = $goodDao->getEndDate();

                    $userId = $goodDao->getUserId();

                    $goods[$userId] = array();
                    $goods[$userId]['good'] = $good;

                    $userIds[] = $userId;
                }

                $userDaos = UserDao::getRange($userIds);
                foreach ($userDaos as $userDao) {
                    $user = array();

                    $user['name'] = $userDao->getName();
                    $user['rating'] = array();
                    $user['rating']['value'] = $userDao->getRateGoodValue();
                    $user['rating']['total'] = $userDao->getRateGoodCount();
                    $user['join_time'] = $userDao->getCreateTime();
                    $user['join_time'] = substr($user['join_time'], 0, 10);
                    $user['response_time'] = $userDao->getResponseTime();

                    $goods[$userDao->getId()]['user'] = $user;
                }

                $goods = array_values($goods);
            }
        }

        return $goods;
    }
}
?>