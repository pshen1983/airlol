<?php
class SearchGoodController extends AjaxController {

    protected function handle($params) {
        $status = 0;
        $message = '';

        $goods = array();

        if ($_GET['debug']==1) {
            global $test_search_goods;
            return $test_search_goods;
        }

        if (!empty($_GET['departure']) && !empty($_GET['arrival']) && !empty($_GET['page']) && 
            Format::isValidMySQLDate($_GET['date'], true) ) {

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

            foreach ($goodDaos as $goodDao) {
                $good = $goodDao->toArray();
                $good['suggest_price'] = Utility::getSuggestedPriceByGood();
                $goods[] = $good;
            }
        }

        return $goods;
    }
}
?>