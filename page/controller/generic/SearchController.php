 <?php
 class SearchController extends PageController {

    protected function handle($params) {
    	$param = array();
        $param['signedin'] = ASession::isSignedIn();
        $param['type'] = $_GET['type'];

    	if ($param['type']=='package') {
    		$param['btn1style'] = 'background-color: #ffca59';
    		$param['btn2style'] = '';
    		$param['labelstyle'] = 'background-color: #ffca59';
    		$param['labeltext'] = 'Sending packages has never been so timely and affordable!';
    		$param['divstyle'] = 'border: solid 3px #ffca59';
    		$param['counttext'] = ' packages match your trip';
    		$param['zerotext'] = 'Hm... There are currently no Cairiers who are able to send your package.';
    	} else if ($param['type']=='trip') {
    		$param['btn1style'] = '';
    		$param['btn2style'] = 'background-color: #11859e';
    		$param['labelstyle'] = 'background-color: #11859e;color:white';
    		$param['labeltext'] = 'Earn money with your unused luggage space on your next travel!';
    		$param['divstyle'] = 'border: solid 3px #11859e';
    		$param['counttext'] = ' people travelling may Cairy your package';
    		$param['zerotext'] = 'Hm... There are currently no packages fit for your trip.';
    	} else {}

    	$locale = $this->getLocale(true);
    	$param['depart'] = CmsItemDao::getCodeContent($_GET['depart'], $locale);
    	$param['arrive'] = CmsItemDao::getCodeContent($_GET['arrive'], $locale);

        if ($_GET['space']=='whole') {
            $param['count'] = GoodDao::findGoodByLocationAndDayAndBagCount($_GET['depart'], $_GET['arrive'], $_GET['date']);
        } else {
            $param['count'] = GoodDao::findGoodByLocationAndDayCount($_GET['depart'], $_GET['arrive'], $_GET['date']);
        }

    	$param['date'] = $_GET['date'];
    	$param['space'] = $_GET['space']=='whole' ? 'Whole Luggage' : 'Space in a Luggage';
    	$param['weight'] = $_GET['weight'];

        View::addJs('search.js');
        View::addCss('generic.css');

        View::factory('generic/search', $param);
    }
}